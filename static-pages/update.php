<?php
include '../db.php';
$userId = $_POST['userId'];
///$pagetype = $_POST['page'];
$title = $_POST['title'];
$description = $_POST['description'];

$sqlquery = "UPDATE static_pages SET title='$title', description='$description' WHERE id='$userId'";

if(mysqli_query($conn, $sqlquery)){
    echo 1;
}
else{
    echo 0;
}
?>