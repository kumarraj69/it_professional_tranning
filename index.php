<!-- ======= Header ======= -->
<?php include 'header.php'?>
<!-- ======= Header End ======= -->

<?php
$sql = mysqli_query($conn, "SELECT id, image, title, description FROM banner");
$row = mysqli_fetch_array($sql) ;
?>

<style>
  #hero { 
  width: 100%;
  height: 100vh;
  background: url("<?Php echo 'admin/images/banner/'.$row ['image']; ?>") top right;
  background-size: cover;
}
</style>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="10">
      <h1><?Php echo $row['title']; ?></h1>
      <h2 style="color:mediumaquamarine;"> <?Php echo $row['description']; ?></h2>
      <a href="about.php" class="btn-about">About Me</a>
    </div>
  </section><!-- End Hero -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php' ?>
  <!-- ======= Footer End ======= -->