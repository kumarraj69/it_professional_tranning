<?php
include '../db.php';
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT id, name, email, password FROM user WHERE email='$email' && password='$password'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    if($row > 0){ 
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        ?>
        <script>
          window.addEventListener('load', function() {
            swal({
              title: "Welcome <?php echo $_SESSION['name'] ?>",
              text: "Successfully Login",
              icon: "success",
              button: "OK"
            }).then(function() {
              window.location.href = "../dashbord.php";
            });
          });
        </script>
      <?php

    }else{
        ?>
        <script>
          alert("Invalid Email & Password");
          //die();
          window.location.href = "../login.php";
        </script>
       <?php
    }
}
?>
<!-- Sweet alert  -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- sweet alert end -->