<?php 
include '../db.php';
$userId = $_POST['id'];
$status = $_POST['status'];

$sqlquery = "UPDATE sitesetting SET status='$status' WHERE id='$userId'";

if(mysqli_query($conn, $sqlquery)){
    echo 1;
}
else{
    echo 0;
}
?>