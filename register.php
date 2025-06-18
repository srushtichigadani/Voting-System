<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? 'default_username';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : 'default_mobile';
    $password = $_POST['password'] ?? 'default_password';
    $cpassword = $_POST['cpassword'] ?? 'default_cpassword';
    $aadhar = isset($_POST['aadhar']) ? $_POST['aadhar'] : 'default_aadhar';
    $voterid = isset($_POST['voterid']) ? $_POST['voterid'] : 'default_voterid';
    $age = $_POST['age'] ?? 0;

    if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
        $image = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
    } else {
        $image = '';
        $tmp_name = '';
    }

    $std = $_POST['std'] ?? 'default_std';

    // Check if the registration is for a group
    if ($std === 'group') {
        // Check if the number of groups is less than three
        $sqlCountGroups = "SELECT COUNT(*) as total FROM userdata WHERE standard='group'";
        $resultCountGroups = mysqli_query($con, $sqlCountGroups);
        $row = mysqli_fetch_assoc($resultCountGroups);
        $totalGroups = $row['total'];

        if ($totalGroups >= 3) {
            echo '<script>
                alert("You are not eligible to register as a group. you are the voter you must register as voter");
                window.location="./registration.php";
            </script>';
            exit; // Stop execution if more than 3 groups are registered
        }
    }

    if (!preg_match('/^\d{12}$/', $aadhar)) {
        echo '<script>
            alert("Invalid Aadhar number. Please enter a valid 12-digit Aadhar number.");
            window.location="./registration.php";
        </script>';
        exit;
    }

    if (!preg_match('/^[A-Z]{3}\d{7}$/', $voterid)) {
        echo '<script>
            alert("Invalid Voter ID. Please enter a valid Voter ID (e.g., ABC1234567).");
            window.location="./registration.php";
        </script>';
        exit;
    }

    if ($password != $cpassword) {
        echo '<script>
            alert("Passwords do not match");
            window.location="./registration.php";
        </script>';
    } else {
        // Create 'uploads' directory if it doesn't exist
        if (!is_dir("../uploads")) {
            mkdir("../uploads");
        }

        // Move uploaded file to the 'uploads' directory
        if (!empty($image) && move_uploaded_file($tmp_name, "../uploads/$image")) {
            $sql = "INSERT INTO userdata (username, mobile, password, photo, standard, status, votes, aadhar, voterid, age) 
                    VALUES ('$username', '$mobile', '$password', '$image', '$std', 0, 0, '$aadhar', '$voterid', $age)";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo '<script>
                    alert("Registration successful");
                    window.location="./index.php";
                </script>';
            } else {
                echo '<script>
                    alert("Error in database query: '.mysqli_error($con).'");
                    window.location="./registration.php";
                </script>';
            }
        } else {
            echo '<script>
                alert("Error moving uploaded file");
                window.location="./registration.php";
            </script>';
        }
    }
}
?>
