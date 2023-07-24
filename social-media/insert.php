<?php
include '../db.php';

$name = $_POST['name'];
$description = $_POST['description'];

// Upload the image
$image = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/it_professional_tranning/admin/images/social/";
$targetPath = $uploadDir . $image;
move_uploaded_file($tempName, $targetPath);
    
    $sql = "INSERT INTO social_media_settings (name, description, icon)
             VALUES ('$name', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
       echo 1;
    } else {
       echo 0;
    }
?>
