<?php
include '../db.php';

$title = $_POST['title'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Upload the logo
$image = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$uploadDir = "images/settingimage/";
$targetPath = $uploadDir . $image;

// Upload the favicon
$favicon = $_FILES["favicon"]["name"];
$tempname = $_FILES["favicon"]["tmp_name"];
$uploaddir = "images/settingfavicon/";
$targetpath = $uploaddir . $favicon;

// Check if the directories exist, create them if not
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}
if (!is_dir($uploaddir)) {
    mkdir($uploaddir, 0755, true);
}

// Move uploaded files to their respective directories
if (move_uploaded_file($tempName, $targetPath) && move_uploaded_file($tempname, $targetpath)) {
    $sql = "INSERT INTO sitesetting (logoimage, faviconimage, title, email, phone, address)
            VALUES ('$image', '$favicon', '$title', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo 1; // Successful insertion
    } else {
        echo 0; // Failed to insert into the database
    }
} else {
    echo -1; // Failed to move uploaded files to their directories
}
?>
