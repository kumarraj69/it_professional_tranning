<?php
include '../db.php'; 
$id= $_POST['id'];
$sql= "SELECT id, image, title,	description FROM banner WHERE  id = '$id'";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>