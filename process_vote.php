<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $groupName = $_POST['groupName'];
    $votes = $_POST['votes'];

    // Process the uploaded photo
    $photoFileName = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $targetDir = 'uploads/';
        $photoFileName = $targetDir . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoFileName);
    }

    //
