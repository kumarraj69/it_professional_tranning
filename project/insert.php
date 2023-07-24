<?php
include '../db.php';

$name = $_POST['name'];
$description = $_POST['description'];
$categoryid = $_POST['categoryid'];
$clientid = $_POST['clientid'];
$hour = $_POST['hour'];

// Upload the image
$image = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/it_professional_tranning/admin/images/project/";
$targetPath = $uploadDir . $image;
move_uploaded_file($tempName, $targetPath);

$sql = "INSERT INTO project (name, description, category_id, client_id, hour, image)
         VALUES('$name', '$description', $categoryid, $clientid, $hour, '$image')";

if ($conn->query($sql) === TRUE) {
   echo 1;
} else {
   echo 0;
}
?>
