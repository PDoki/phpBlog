<?php

require_once 'app/helpers.php';
start_session('motivate');

if (!user_verify()) {

    header('location: blog.php');
    die;

}

$title = 'Add post';
$error = '';

if (isset($_POST['submit'])) {

    db_connect();
    $user_title = trim(filter_input(INPUT_POST, 'user_title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $user_title = mysqli_real_escape_string($mysql_link, $user_title);

    $benefits = trim(filter_input(INPUT_POST, 'benefits', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $benefits = mysqli_real_escape_string($mysql_link, $benefits);

    if (!$user_title || mb_strlen($user_title) < 3) {
        $error = '* Write your aim! At least 3 chars';
    } else if (!$benefits || mb_strlen($benefits) < 3) {
        $error = '* The more benefits you describe, the more motivated you will be!';
    } else {

        $userId = $_SESSION['user_id'];
        $sql = "INSERT INTO posts VALUES(null, $userId, '$user_title', '$benefits', NOW())";
        $result = db_insert($sql);

        if ($result) {

            header('location: blog.php?sm=Good luck with this aim!');
            die;

        } else {

            $error = '* There seemed to be a problem with saving your post';

        }

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
        <h1 class="display-3">Set your aim!</h1>
        <p>Remember, the better the benefits, the more motivation you'll get.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <form action="" method="POST" novalidate="novalidate" autocomplete="off">
          <div class="form-group">
            <label for="user_title"><span class="text-danger">*</span> The aim: </label>
            <input class="form-control" type="text" name="user_title" id="user_title" value="<?=old('user_title');?>">
          </div>
          <div class="form-group">
            <label for="benefits"><span class="text-danger">*</span> Benefits: </label>
            <textarea rows="10" class="form-control" name="benefits" id="benefits"><?=old('benefits');?></textarea>
          </div>
          <input name="submit" class="btn btn-success btn-block" type="submit" value="Set a goal">
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