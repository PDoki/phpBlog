<?php

require_once 'app/helpers.php';
start_session('motivate');

if (!user_verify()) {

    header('location: blog.php');
    die;

}

$userId = $_SESSION['user_id'];

if (isset($_GET['pid']) && is_numeric($_GET['pid'])) {

    db_connect();
    $pid = mysqli_real_escape_string($mysql_link, $_GET['pid']);
    $sql = "SELECT * FROM posts WHERE id = $pid AND user_id = $userId";
    $post = db_query($sql);

    if (!$post) {
        header('location: blog.php');
    }

}
$title = 'Edit Post';
$error = '';

if (isset($_POST['submit'])) {

    db_connect();
    $user_title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $user_title = mysqli_real_escape_string($mysql_link, $user_title);

    $benefits = trim(filter_input(INPUT_POST, 'benefits', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $benefits = mysqli_real_escape_string($mysql_link, $benefits);

    if (!$user_title || mb_strlen($user_title) < 3) {
        $error = '* Write your aim! At least 3 chars';
    } else if (!$benefits || mb_strlen($benefits) < 3) {
        $error = '* The more benefits you describe, the more motivated you will be!';
    } else {

        $sql = "UPDATE posts SET title = '$user_title', benefits = '$benefits' WHERE id = $pid AND user_id = $userId";
        db_update($sql);
        header('location: blog.php?sm=Your aim is updated');
        die;

    }

}

?>

<?php
include 'tmpls/header.php';
?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12 pt-3">
        <h1 class="display-2">Edit your aim</h1>
        <a class="btn btn-outline-success rounded btn-sm mt-2 mb-2" href="blog.php"><i
            class="fas fa-chevron-circle-left">Back
            to Blog</i></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <form action="" method="POST" novalidate="novalidate" autocomplete="off">
          <div class="form-group">
            <label for="title"><span class="text-danger">*</span> Your aim: </label>
            <input class="form-control" type="text" name="title" id="title" value="<?=$post['title'];?>">
          </div>
          <div class="form-group">
            <label for="benefits"><span class="text-danger">*</span> Benefits: </label>
            <textarea rows="10" class="form-control" name="benefits" id="benefits"><?=$post['benefits'];?></textarea>
          </div>
          <input name="submit" class="btn btn-success btn-block" type="submit" value="Update">
          <?php if ($error): ?>
          <div class="alert alert-danger mt-3" role="alert">
            <?=$error;?>
          </div>
          <?php endif;?>

        </form>
      </div>
    </div>
  </div>
</main>
<?php
include 'tmpls/footer.php';
?>