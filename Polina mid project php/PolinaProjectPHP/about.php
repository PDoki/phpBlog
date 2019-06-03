<?php

require_once 'app/helpers.php';
start_session('motivate');

$title = 'About us';
?>


<?php
include 'tmpls/header.php';
?>

<main>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6">
        <h1 class="display-3 font-italic text-center" style="font-family: sense-serif; color:green;">About this blog
        </h1>
        <p class="font-italic" style="font-size: 1.6em; font-family: sense-serif;">The aim of this blog is to help you
          to stay focused on a bright side and gain the power to achieve your
          goals. Write your aim and describe all the benefits you'll get when you bring your idea to life. Now, every
          time you feel like to give up, read again what you are suffering for and move forward! <br>Beleive in
          yourself as we do!</p>
      </div>

      <div class="col-md-6">
        <div class="col-12">
          <img class="img-thumbnail" src="images/site_images/do-not-give-up.jpg" alt="Do not give up">
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-5 mb-5 text-center">
      <div class="col-md-6">
        <a href="blog.php" class="btn btn-outline-success text-dark col-4">Get insperation</a>

        <?php if (user_verify()): ?>
        <a class="btn btn-outline-success text-dark" href="add_post.php"><i class="fas fa-plus-circle"></i>Add your
          aim</a>
        <?php else: ?>
        <a href="login.php" class="btn btn-outline-success text-dark col-3">Log in</a>
        <a href="create_acc.php" class="btn btn-outline-success text-dark col-4">Create
          account</a>

        <?php endif;?>
        <div class="col-12 mt-3">
          <img class="img-thumbnail" src="images/site_images/road-to-success.jpg"
            alt="A road to success through the wood">
        </div>
      </div>
      <div class="col-md-6">
        <p class="font-italic" style="font-size: 1.6em; font-family: sense-serif;"><b>How often</b> did you
          give up on a great
          idea? Maybe, you lost
          your
          faith in yourself or
          simply got so
          exhausted, that even the last few steps seemed impossible...<br>
          However, there are people who achieve their aims despite the odds! Where do they find power? The answer is
          simple, they always remember about the ultimate goal. In other words, they have the right motivation.<br>
          Now, you have a chance to establish your own motivation and focus on all the benefits of fulfilling your
          desires.</p>
      </div>
    </div>
  </div>
</main>
<a class="btn btn-outline-success rounded float-right upBtn mb-5" type="button" href=""><i
    class="fas fa-arrow-circle-up"></i></a>

<?php
include 'tmpls/footer.php';
?>