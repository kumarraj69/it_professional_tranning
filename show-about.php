<!-- Navbar -->
<?php include 'includes/header.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include 'includes/sidebar.php' ?>
<!-- Content Wrapper. Contains page content -->

<?php
$sql = "SELECT id, description FROM `about`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CKEditor</title>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <form method="POST">
                    <textarea id="editor1" name="editor1">
                      <?php echo $row['description'] ?>
                    </textarea><br>
                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        $textarea = $_POST["editor1"];
                        $sql = "UPDATE `about` SET description ='$textarea' WHERE `id`= 2 ";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                          ?>
                            <script>
                                alert("Data Updated successfully");  
                                window.location.href = "show-about.php";  
                            </script>
                          <?php
                        } else {
                            echo "We could not update the record successfully";
                        }
                    } 
                ?>
            </div>
        </section>
    </div>
</body>

</html>

<!-- Main footer Container -->
<?php include 'includes/footer.php'; ?>
<!-- Main footer Container end -->