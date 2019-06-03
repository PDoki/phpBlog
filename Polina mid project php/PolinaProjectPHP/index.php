<?php
require_once 'app/helpers.php';
start_session('motivate');

$title = 'Home page';
?>


<?php
include 'tmpls/header.php';
?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/site_images/motivate-yourself.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="images/site_images/map-trip2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="images/site_images/enjoy-trip2.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span style="color:red;" class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 pt-3 mt-3 text-center">

        <a href="blog.php" class="btn btn-outline-success text-dark col-md-4">Get insperation</a>

        <?php if (user_verify()): ?>
        <a class="btn btn-outline-success text-dark" href="add_post.php"><i class="fas fa-plus-circle"></i>Add your
          aim</a>
        <?php else: ?>

        <a href="login.php" class="btn btn-outline-success text-dark col-md-3">Log in</a>

        <a href="create_acc.php" class="btn btn-outline-success text-dark col-md-4">Create
          account</a>
        <?php endif;?>
      </div>
    </div>
  </div>
  </div>



</main>

<?php
include 'tmpls/footer.php';
?>