<?php
include '../db.php'; 
$id= $_POST['id'];
$sql= "SELECT id, name, description, category_id, client_id, hour, image FROM project WHERE  id = '$id'";
$result= mysqli_query($conn ,  $sql);
$fetch= mysqli_fetch_assoc($result) ;
print_r(json_encode($fetch));
?>