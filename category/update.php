<?php
include '../db.php';
$userId = $_POST['userId'];
$name = $_POST['name'];
$description = $_POST['description'];

$sqlquery = "UPDATE category SET name='$name', description='$description' WHERE id='$userId'";

if(mysqli_query($conn, $sqlquery)){
    echo 1;
}
else{
    echo 0;
}
?>