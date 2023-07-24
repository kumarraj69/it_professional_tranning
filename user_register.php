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
  <style>
    label.error {
      color: red;
      display: block;
      width: 100%;
      margin-top: 10px;
    }
  </style>
  <script>
$(document).ready(function() {
  // Initialize form validation on the myForm element
  $("#frm").validate({
    // Specify validation rules
    rules: {
      name: "required",
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      }, 
      dob: {
        required: true,
        date: true,
        customDateValidation: true
      },
      phone: {
        required: true,
        mobileNumber: true
      },
      address: "required",
      phone: "required",
      city: "required",
      state: "required",
      country: "required",
      pincode: "required"
    },
    // Specify validation error messages
    messages: {
      name: "Please enter your name",
      email: {
        required: "Please enter your email address",
        email: "Please enter a valid email address"
      },
      password: {
            required: "Please enter a password",
            minlength: "Password must be at least 6 characters long"
          },
      dob: {
        required: "Please enter your date of birth",
        date: "Please enter a valid date",
        customDateValidation: "Age must be greater than 18"
      },
      phone: {
        required: "Please enter your phone number",
        mobileNumber: "Please enter a valid mobile number"
      },
      address: "Please enter your address",
      phone: "Please enter your phone number",
      city: "Please enter your city",
      state: "Please enter your state",
      country: "Please enter your country",
      pincode: "Please enter your pin code"
    },
    // Submit the form if it is valid
    submitHandler: function(form) {
      form.submit();
    }
  });

  // Custom validation method to check age
  $.validator.addMethod("customDateValidation", function(value, element) {
    var dob = new Date(value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var monthDiff = today.getMonth() - dob.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
      age--;
    }
    return age > 18;
  }, "");
});
</script>
</head>
<body class="hold-transition register-page">
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
     <div class="container"> 
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form id="frm" action="process_files/process.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Full name">
          </div>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="input-group mb-3">
            <input type="date" name="dob" class="form-control" placeholder="DOB">
          </div>
          <div class="input-group mb-3">
            <input type="text" name="phone" class="form-control" placeholder="phone">
          </div>
          <div class="input-group mb-3">
            <input type="text" name="address" class="form-control" placeholder="address">
          </div>
          <div class="input-group mb-3">
            <input type="text" name="city" class="form-control" placeholder="city">
          </div>
          <div class="input-group mb-3">
            <input type="text" name="state" class="form-control" placeholder="State">
          </div>
          <div class="input-group mb-3">
            <input type="text" name="country" class="form-control" placeholder="country">
          </div>
          <div class="input-group mb-3">
            <input type="text" name="pincode" class="form-control" placeholder="pincode">
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 text-center">
              <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary btn-center">Register</button>
            </div>
            </br>
            <!-- /.col -->
          </div>
        </form>
        <div class="text-center">
          <a href="login.php" class="text-center">Have an already account? Login here</a>
        </div>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>

</body>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
