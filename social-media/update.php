<?php
include '../db.php';
$userId = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
// $image = $_FILES["image"]["name"];

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image']['name'];  
    
} else {
    // Handle the case where no new image was uploaded (or an error occurred during upload)
    $image = ''; // Set to an empty string if no new image is provided
}
  
if(empty($image)){
$sqlquery = "UPDATE social_media_settings SET name='$name', description='$description' WHERE id='$userId'";
}else{
$sqlquery = "UPDATE social_media_settings SET name='$name', description='$description', icon='$image' WHERE id='$userId'";  
}
if(mysqli_query($conn, $sqlquery)){
    echo 1;
}
else{
    echo 0;
}
?>