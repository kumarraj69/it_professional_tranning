<?php
include '../db.php';

$userId = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$categoryid = $_POST['category_id'];
$clientid = $_POST['client_id'];
$hour = $_POST['hour'];

// Check if the image file was uploaded successfully
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image = $_FILES['image']['name'];  
    
} else {
    // Handle the case where no new image was uploaded (or an error occurred during upload)
    $image = ''; // Set to an empty string if no new image is provided
}

// Prepare the update query
if (empty($image)) {
    $query = "UPDATE project SET name='$name', description='$description', category_id='$categoryid', client_id='$clientid', hour='$hour' WHERE id='$userId'";
} else {
    $query = "UPDATE project SET name='$name', description='$description', category_id='$categoryid', client_id='$clientid', hour='$hour', image='$image' WHERE id='$userId'";
}
// Execute the update query
if(mysqli_query($conn, $query)){
    echo 1;
} else {
    echo 0;
}
?>
