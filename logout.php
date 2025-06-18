<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- You can include any necessary styles or libraries for the pop-up here -->
</head>

<body>
    <script>
        // Add a pop-up message using JavaScript
        alert("You have been successfully logged out.");

        // Redirect to the login page
        window.location.href = 'index.php';
    </script>
</body>

</html>
