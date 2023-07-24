<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- validation cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>

<body class="hold-transition login-page">
    <?php
    $error = "";

    include('../db.php');
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
        $emailkey = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");

        $sql = "SELECT * FROM `pass_recovery` WHERE `email_key`='" . $emailkey . "' and `email`='" . $email . "';";

        $result = $conn->query($sql);
        if ($result === FALSE) {
            echo "Error executing the query: " . $conn->error;
        } elseif ($result->num_rows === 0) {
            $error .= '<h2>Invalid Link</h2>';
        } else {
            $row = $result->fetch_assoc();
            $expdate = $row['expdate'];
            if ($expdate >= $curDate) {
    ?>
                <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            <a href="#" class="h1"><b>W3</b>care</a>
                        </div>
                        <div class="card-body">
                            <h3 class="login-box-msg">Reset Password</h3>
                            <form action="" name="update" method="POST">
                                <input type="hidden" name="action" value="update" class="form-control" />
                                <div class="input-group mb-3">
                                    <input type="password" name="pass1" required class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="pass2" required class="form-control" placeholder="Confirm Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.login-box -->
            <?php
            } else {
                $error .= "<h2>Link Expired</h2>";
            }
        }
        if (!empty($error)) {
            echo "<div class='error'>" . $error . "</div><br />";
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
        $error = "";
        $pass1 = mysqli_real_escape_string($conn, $_POST["pass1"]);
        $pass2 = mysqli_real_escape_string($conn, $_POST["pass2"]);
        $email = $_POST["email"];
        $curDate = date("Y-m-d H:i:s");
        if ($pass1 != $pass2) {
            $error .= "<p>Passwords do not match. Both passwords must be the same.<br /><br /></p>";
        }
        if (empty($error)) {
            $pass1 = md5($pass1);
            $sqlupdate = "UPDATE `user` SET `password` = '" . $pass1 . "' WHERE `email` = '" . $email . "'";
            if ($conn->query($sqlupdate) === TRUE) {
            ?>
                <script>
                    window.addEventListener('load', function() {
                        swal({
                            title: "Congratulation",
                            text: "Password Has Been Changed",
                            icon: "success",
                            button: "OK"
                        }).then(function() {
                            window.location.href = "../login.php";
                        });
                    });
                </script>
            <?php
                $sqldelete = "DELETE FROM `pass_recovery` WHERE `email` = '$email'";
                $conn->query($sqldelete);
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "<script>
                    window.addEventListener('DOMContentLoaded', function() {
                        swal({
                            title: 'Error',
                            text: 'Passwords do not match. Both passwords should be the same.',
                            icon: 'error',
                            button: 'OK'
                        });
                    });
                 </script>";
        }
    }
    ?>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Sweet alert end -->
</body>

</html>
