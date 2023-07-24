<?php
include '../db.php'; 
$id = $_POST['id'];
$sql = "SELECT id, name, description, icon FROM social_media_settings WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($result);

// Create a new array to include the image name
$response = array(
    'id' => $fetch['id'],
    'name' => $fetch['name'],
    'description' => $fetch['description'],
    'imageName' => $fetch['icon'] // Assuming the "icon" column contains the image name
);

// Convert the array to JSON and send the response
echo json_encode($response);
?>
