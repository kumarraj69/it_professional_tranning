<?php
include 'Admin/connection.php';
include 'header.php';
?>

<?php
    $sql = "SELECT `description` FROM `about`";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo ' <main id="main">'.' <section id="about" class="about">
    '.'<div style="text-align: center; class="container">' . $row['description'] . '</div>'.'</div>'.'</div>';
?>

<?php
include 'footer.php';
?>