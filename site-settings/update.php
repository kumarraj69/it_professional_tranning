<?php
include '../db.php';
$userId = $_POST['id'];
$title = $_POST['title'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$image = $_FILES["image1"]["name"];
$favicon = $_FILES["image2"]["name"];

$sqlquery = "UPDATE sitesetting SET title='$title', email='$email', phone='$phone', address='$address', logoimage='$image', faviconimage='$favicon' WHERE id='$userId'";

if (mysqli_query($conn, $sqlquery)) {
    // Move uploaded files to the desired location
    move_uploaded_file($_FILES["image1"]["tmp_name"], "images/settingimage/" . $image);
    move_uploaded_file($_FILES["image2"]["tmp_name"], "images/settingfavicon/" . $favicon);
    echo 1;
} else {
    echo 0;
}
?>
