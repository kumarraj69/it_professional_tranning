<?php
include '../db.php';

$page = $_POST['page'];
$title = $_POST['title'];
$description = $_POST['description'];

$sql = "INSERT INTO static_pages (page_type, title, description)
     VALUES('$page', '$title', '$description')";

if ($conn->query($sql) === TRUE) {
   echo 1;
   // header("location: ../client.php");
} else {
   echo 0;
}

?>
