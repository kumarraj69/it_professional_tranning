<?php
include '../db.php';

$name = $_POST['name'];
$description = $_POST['description'];

$sql = "INSERT INTO category (name, description)
     VALUES('$name', '$description')";

if ($conn->query($sql) === TRUE) {
   echo 1;
   // header("location: ../client.php");
} else {
   echo 0;
}

?>
