<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location:../');
}

$data = $_SESSION['data'];
$status = ($_SESSION['status'] == 1) ? '<div class="status-box bg-success">Voted</div>' : '<div class="status-box bg-danger">Not Voted</div>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-18mE4kWBq781YhF1dvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqy12QvZ6JIW3" crossorigin="anonymous">
    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
   <style>
    /* Add your custom styles here */
    .group-image,
    .user-details img {
        width: 110px;
        height: 110px;
        border-radius: 80%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .user-details-container {
        text-align: left;
        position: absolute;
        top: 50%;
        left: 45%;
        transform: translate(-50%, -50%);
        color: black;
    }

    .user-details-heading {
        text-align: left;
        color: black;
    }

    .status-box {
        display: inline-block;
        padding: 3px 8px;
        margin-left: 10px;
        color: white;
        font-size: 12px;
    }

    .bg-success {
        background-color: green;
    }

    .bg-danger {
        background-color: red;
    }

    .group-details {
        margin-bottom: 20px;
    }

    .group-status-box {
        display: inline-block;
        padding: 3px 8px;
        margin-left: 10px;
        font-size: 12px;
    }

    /* Additional Styles for User Details */
    .user-details {
        text-align: left;
    }

    .text-dark {
        color: black;
    }

    .h5 {
        font-size: 1.25rem;
    }

    /* Adjusted Background Image Style */
    body {
        background-image: url('https://media.istockphoto.com/id/1364257502/photo/vote-social-media-speech-bubbles.jpg?s=612x612&w=0&k=20&c=RYEY-64l8gUfuysidm2xqCqscNKGqN3IiaojG6QOZqc=');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
    }

    /* Additional Styles for Logout Button */
    .logout-button {
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .logout-button button {
        background-color: red;
        border-color: red;
        color: white;
    }

    /* Additional Styles for Back Button */
    .back-button {
        margin-right: 10px;
    }

    .back-button button {
        background-color: black;
        color: white;
        border-color: black;
    }

    /* Additional Styles for Voting System Heading */
    .voting-system-heading {
        text-align: center;
        font-size: 3rem;
        margin-top: -30px; /* Adjust the margin as needed */
    
    }
    
</style>

</head>

<body class="bg-secondary text-light">
    <div class="container my-5">
        <a href="index.php" class="back-button"><button class="btn btn-dark text-light px-3">Back</button></a>
        <a href="logout.php" class="logout-button"><button class="btn btn-danger text-light px-3">Logout</button></a>
        <h1 class="my-3 voting-system-heading">Voting System</h1>
        <div class="row my-5">
            <div class="col-md-6">
                <h2>Group Details</h2>
                <?php
                if (isset($_SESSION['groups'])) {
                    $groups = $_SESSION['groups'];
                    foreach ($groups as $group) {
                ?>
                        <div class="group-details">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="../uploads/<?php echo $group['photo'] ?>" alt="Group image" class="group-image">
                                </div>
                                <div class="col-md-8">
                                    <strong class="text-dark h5">Candidate name:</strong>
                                    <?php echo $group['username'] ?><br>
                                    <form action="voting.php" method="post">
                                        <input type="hidden" name="groupvotes" value="<?php echo $group['votes'] ?>">
                                        <input type="hidden" name="groupid" value="<?php echo $group['id'] ?>">
                                        <?php if ($_SESSION['status'] == 1) : ?>
                                            <button class="group-details-button" disabled>Voted</button>
                                        <?php else : ?>
                                            <button class="group-details-button" type="submit">Vote</button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                ?>
                    <div class="container">
                        <p>No groups to display</p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-5">
                <div class="user-details-container">
                    <div class="user-details-heading">
                        <h2>User Details</h2>
                    </div>
                    <div class="user-details">
                        <img src="../uploads/<?php echo $data['photo'] ?>" alt="User image" class="group-image">
                        <div>
                            <strong class="text-dark h5">Name:</strong>
                            <?php echo $data['username']; ?>
                        </div>
                        <div>
                            <strong class="text-dark h5">Voter ID:</strong>
                            <?php echo $data['voterid']; ?>
                        </div>
                        <div>
                            <strong class="text-dark h5">Aadhar number:</strong>
                            <?php echo $data['aadhar']; ?>
                        </div>
                        <div>
                            <strong class="text-dark h5">Age:</strong>
                            <?php echo $data['age']; ?>
                        </div>
                        <div>
                            <strong class="text-dark h5">Status:</strong>
                            <?php echo $status; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
