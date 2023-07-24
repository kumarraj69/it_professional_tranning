<?php
include 'db.php';
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
              window.location.href = "dashbord.php";
            });
          });
        </script>
      <?php
    }else{
        ?>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Error',
                    text: 'Invalid Email & Password',
                    icon: 'error',
                    button: 'OK'
                }).then(function() {
              window.location.href = "login.php";
            });
            });
        </script>
        <!-- <script>
          alert("Invalid Email & Password");
          //die;
          window.location.href = "login.php";
        </script> -->
       <?php
    }
}
?>
<!-- Sweet alert  -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- sweet alert end -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- validation cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>W3</b>care</a>
    </div>
    <div class="card-body">
      <h3 class="login-box-msg">Sign in with w3 care</h3>
      <form action="#" method="POST">
        <div class="input-group mb-3">
          <input type="email" name="email" required class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" required class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
       <!-- <br> -->
      </form>
      <!-- /.social-auth-links -->
      <!-- <hr> -->
      <div class="text-center">
      <p class="mb-1">
        <a href="set-password/forget-pass.php">I forgot my password</a>
      </p>
     </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
