<?php
include '../db.php'; 
$id= $_POST['id'];
$sql= "SELECT * FROM sitesetting WHERE  id = '$id'";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>