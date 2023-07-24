<?php
include '../db.php';
//session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];

$sql = "INSERT INTO user (name, email, password, phone, dob, address, city, state, country, pin_code)
     VALUES('$name', '$email', '$password', '$phone', '$dob', '$address', '$city', '$state', '$country', '$pincode')";

if ($conn->query($sql) === TRUE) {

  $last_id = mysqli_insert_id($conn);
  $query = "SELECT * FROM user WHERE id='$last_id'";
  $result = $conn->query($query);
  $row = mysqli_fetch_assoc($result);
  
  $_SESSION['id'] = $row['id'];
  $_SESSION['name'] = $row['name'];
  
  ?>
  <script>
    window.addEventListener('load', function() {
      swal({
        title: "Welcome <?php echo $_SESSION['name'] ?>",
        text: "Registeration Successfull",
        icon: "success",
        button: "OK"
      }).then(function() {
        window.location.href = "../dashbord.php";
      });
    });
  </script>
<?php

} else {
  echo "Error: ";
}

?>
<!-- Sweet alert  -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- sweet alert end -->