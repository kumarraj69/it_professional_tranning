<?php
include '../db.php';

$userId = $_POST['id'];

$sql = "DELETE FROM banner WHERE id = '$userId' ";

if(mysqli_query($conn, $sql)){
    echo 1;
}
else{
    echo 0;
}
?>