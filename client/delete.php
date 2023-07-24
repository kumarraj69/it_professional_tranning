<?php
include '../db.php';

$userId = $_POST['id'];

$sql = "DELETE FROM client WHERE id = '$userId' ";

if(mysqli_query($conn, $sql)){
    echo 1;
}
else{
    echo 0;
}
?>