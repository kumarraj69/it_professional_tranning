<?php
include '../db.php';

$title = $_POST['title'];
$description = $_POST['description'];

// Upload the image
$image = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$uploadDir = "../images/banner/";
$targetPath = $uploadDir . $image;
move_uploaded_file($tempName, $targetPath);

$sql = "INSERT INTO banner (title, description, Image)
     VALUES('$title', '$description', '$image')";

if ($conn->query($sql) === TRUE) {
   echo 1;
   // header("location: ../client.php");
} else {
   echo 0;
}

?>
