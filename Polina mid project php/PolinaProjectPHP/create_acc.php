<?php

require_once 'app/helpers.php';
start_session('motivate');

if (isset($_SESSION['user_id'])) {
    header('location: blog.php');
    die;
}

$title = 'Create new account';
$error = ['name' => '', 'email' => '', 'password' => ''];

if (isset($_POST['submit'])) {

    if (isset($_POST['token']) && isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {

        db_connect();
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $name = mysqli_real_escape_string($mysql_link, $name);

        $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $email = mysqli_real_escape_string($mysql_link, $email);

        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $password = mysqli_real_escape_string($mysql_link, $password);

        $form_valid = true;
        $query_email = "SELECT email FROM users WHERE email = '$email'";

        if (!$name || mb_strlen($name) < 2) {
            $error['name'] = '* Name is required, min 2 chars';
            $form_valid = false;
        }

        if (!$email) {
            $error['email'] = '* A valid email is required';
            $form_valid = false;

        } elseif (db_query($query_email)) {
            $error['email'] = '* There is a user with this email';
            $form_valid = false;
        }

        if (!$password || mb_strlen($password) < 6 || mb_strlen($password) > 15) {
            $error['password'] = '* Password should consist of 6 - 15 chars';
            $form_valid = false;
        }

        if ($form_valid) {

            $image_name = 'default.png';
            $max_size = 1024 * 1024 * 5;
            $ext = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];

            if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {

                if (isset($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])) {

                    if (isset($_FILES['image']['size']) && $_FILES['image']['size'] <= $max_size) {

                        $file_info = pathinfo($_FILES['image']['name']);

                        if (in_array(strtolower($file_info['extension']), $ext)) {

                            $image_name = date('Y.m.d.H.i.s') . '-' . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image_name);

                        }

                    }

                }

            }

            $password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users VALUES(null, '$name', '$email', '$password', NOW())";
            $userId = db_insert($sql, true);
            db_insert("INSERT INTO user_profile VALUES(null, '$userId', '$image_name')");
            $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $name;
            header('location: blog.php?sm=Welcome to the blog' . $name);
            die;

        }

    }

    $token = csrf_token();

} else {

    $token = csrf_token();

}

?>

<?php
include 'tmpls/header.php';
?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12 pt-3">
        <h1 class="display-2">Create your account now!</h1>
        <p>There is one tiny step between you and your motivation power.</p>
      </div>
    </div>
    <div class="row">

      <div class="col-md-6 mt-5 m-auto">
        <div class="col-12">
          <img class="img-thumbnail" src="images/site_images/grass.jpg" alt="grass growing through asphalt">
        </div>
      </div>

      <div class="col-md-6 my-5">
        <div class="card">
          <div class="card-header">
            <span class="h5">Create a new account</span>
          </div>
          <div class="card-body">
            <form action="" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
              <input type="hidden" name="token" value="<?=$token;?>">
              <div class="form-group">
                <label for="name"><span class="text-danger">*</span> Name:</label>
                <input value="<?=old('name');?>" class="form-control" type="text" name="name" id="name">
                <span class="text-danger mt-1">
                  <?=$error['name'];?>
                </span>
              </div>
              <div class="form-group">
                <label for="email"><span class="text-danger">*</span> Email:</label>
                <input value="<?=old('email');?>" class="form-control" type="email" name="email" id="email">
                <span class="text-danger mt-1">
                  <?=$error['email'];?>
                </span>
              </div>
              <div class="form-group">
                <label for="password"><span class="text-danger">*</span> Password:</label>
                <input class="form-control" type="password" name="password" id="password">
                <span class="text-danger mt-1">
                  <?=$error['password'];?>
                </span>
              </div>
              <div class="form-group">
                <label for="image">Profile Image:</label>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="image">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
              <input class="btn btn-success my-3" name="submit" type="submit" value="Sign up">
            </form>
          </div>
        </div>
      </div>

    </div>
</main>
<?php
include 'tmpls/footer.php';
?>