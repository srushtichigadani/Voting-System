<?php
session_start();
include('connect.php');

$votes = $_POST['groupvotes'];
$totalvotes = $votes + 1;
$gid = $_POST['groupid'];
$uid = $_SESSION['id'];

// Assuming voterid, age, and aadharnumber are fields in your userdata table
$voterid = $_SESSION['data']['voterid'];
$age = $_SESSION['data']['age'];
$aadharnumber = $_SESSION['data']['aadharnumber'];

$updatevotes = mysqli_query($con, "UPDATE userdata SET votes='$totalvotes' WHERE id='$gid'");
$updatestatus = mysqli_query($con, "UPDATE userdata SET status=1 WHERE id='$uid'");

if ($updatevotes and $updatestatus) {
    $getgroups = mysqli_query($con, "SELECT username, photo, votes, id FROM userdata WHERE standard='group'");
    $groups = mysqli_fetch_all($getgroups, MYSQLI_ASSOC);
    $_SESSION['groups'] = $groups;
    $_SESSION['status'] = 1;
    
    echo '<script>
    alert("Voting successful");
    window.location="dashboard.php";
    </script>';
} else {
    echo '<script>
    alert("Technical error !! Vote after sometime");
    window.location="dashboard.php";
    </script>';
}
?>
