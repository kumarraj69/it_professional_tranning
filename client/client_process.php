<?php
include '../db.php';

$name = $_POST['name'];
$address = $_POST['address'];
$mobile = $_POST['phone'];

$sql = "INSERT INTO client (name, address, mobile)
     VALUES('$name', '$address', '$mobile')";

if ($conn->query($sql) === TRUE) {
   echo 1;
   // header("location: ../client.php");
} else {
   echo 0;
}

?>
