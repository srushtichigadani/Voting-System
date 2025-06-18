<?php
session_start();
include('connect.php');

$voterid = $_POST['voterid'];
$aadharnumber = $_POST['aadharnumber'];
$password = $_POST['password'];
$std = $_POST['std'];

// Modify the SQL query to use the correct column names
$sql = "SELECT * FROM userdata WHERE voterid='$voterid' AND aadhar='$aadharnumber' AND password='$password' AND standard='$std'";
$result = mysqli_query($con, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $sql = "SELECT username, photo, votes, id, voterid FROM `userdata` WHERE standard='group'";
        $resultgroup = mysqli_query($con, $sql);

        if ($resultgroup) {
            $groups = mysqli_fetch_all($resultgroup, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        } else {
            echo '<script>alert("Error fetching group data.");</script>';
        }

        $data = mysqli_fetch_array($result);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        echo '<script>
            alert("Login successful. Welcome to the voting system");
            window.location="dashboard.php";
        </script>';
    } else {
        echo '<script>
            alert("Invalid credentials");
            window.location="index.php";
        </script>';
    }
} else {
    echo '<script>alert("Error in the query.");</script>';
}
?>
