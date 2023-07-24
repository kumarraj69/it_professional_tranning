<?php

include 'include/header.php';
include 'include/sidebar.php';

include 'connection.php';
?>
<script src="ckeditor/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            // CKEditor configuration options
            autoParagraph: false, // Disable autoformatting of paragraphs
            removeFormatAttributes: '' // Prevent removal of style attributes
        })
        .catch(error => {
            console.error(error);
        });
</script>
<style>
    .container {
        margin-left: 250px;
        width: 1090px;
        height: 1000px;
        margin-top: 50px;
    }

    .btn {
        width: 100px;
        margin: 10px 0px 10px 10px;
    }

    .card {
        height: 800px;
    }
</style>


<form action="about.php" method="post" id="update-form">
    <textarea name="editor1" id="textarea">
              <?php
                $sql = "SELECT id,description FROM `about`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['description'];
             ?>  
            </textarea>
    <button type="submit" name="submit" class="btn btn-outline-info">CONFIRM</button>
</form>


<script>
    CKEDITOR.replace('editor1');
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {

        $textareaa = $_POST["editor1"];
        $sql = "UPDATE `about` SET `description`='$textareaa' WHERE `id`= 1 ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script>
                  alert("Record Updated Successfully")
                </script>';
        } else {
            echo "We could not update the record successfully";
        }
    }
}
?>

<?php
include 'include/footer.php';
?>