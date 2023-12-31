<!-- ======= Header ======= -->
<?php include 'header.php' ?>
<!-- End Header -->

<main id="main">

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
          consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
          fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <?php
      $sql = mysqli_query($conn, "SELECT id, name, description, image, status FROM project");
      while ($result = mysqli_fetch_array($sql)) {
        $status = $result['status']; // Retrieve the status value from the database
      ?>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <?php
              if ($status == 1) { // Check if the status is active
              ?>
                <img src="admin/images/project/<?php echo $result['image']; ?>" class="img-fluid" alt="">
              <?php
              }
              ?>
              <div class="portfolio-info">
                <h4><?php echo $result['name']; ?></h4>
                <p><?php echo $result['description']; ?></p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>
        </div>
    </div>
  </section><!-- End Portfolio Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php include 'footer.php' ?>
<!-- ======= Footer End ======= -->

