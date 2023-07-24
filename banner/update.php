<?php
include '../db.php';
$userId = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
// $image = $_FILES["image"]["name"];
    
// Check if the image file was uploaded successfully
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image']['name'];  
} else {
    // Handle the case where no new image was uploaded (or an error occurred during upload)
    $image = ''; // Set to an empty string if no new image is provided
}
// Prepare the update query
if (empty($image)) {
    $sqlquery = "UPDATE banner SET title='$title', description='$description' WHERE id='$userId'";
}else{
    $sqlquery = "UPDATE banner SET title='$title', description='$description', image='$image' WHERE id='$userId'";
}
if(mysqli_query($conn, $sqlquery)){
    echo 1;
}
else{
    echo 0;
}   
?>

