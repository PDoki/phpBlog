<?php

require_once 'app/helpers.php';
start_session('motivate');

$title = 'Blog Page';

$sql = "SELECT u.name, p.id, p.user_id, p.title, p.benefits, up.avatar, DATE_FORMAT(p.date, '%d/%m/%Y %H:%i:%s') pdate FROM posts p
        JOIN users u ON u.id = p.user_id
        JOIN user_profile up ON u.id = up.user_id
        ORDER BY pdate DESC";

$posts = db_query_all($sql);
$userId = $_SESSION['user_id'] ?? false;

?>

<?php
include 'tmpls/header.php';
?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12 pt-3 text-center">
        <h2 class="display-3">Get inspired!</h2>
        <p>Get inspired by other users. You are not along!</p>
        <?php if (user_verify()): ?>
        <p><a class="btn btn-success" href="add_post.php"><i class="fas fa-plus-circle"></i>Add your aim</a></p>
        <?php else: ?>
        <p><a class="btn btn-success" href="create_acc.php">Join for free now!</a></p>
        <?php endif;?>
      </div>
    </div>

    <div class="row">
      <?php foreach ($posts as $post): ?>
      <div class="col-12 mt-3">
        <div class="card">
          <div class="card-header">
            <span>
              <img class="img-thumbnail" width="40" src="images/<?=$post['avatar'];?>">
              <?=$post['name'];?></span>
            <span class="float-right">
              <?=$post['pdate'];?></span>
          </div>

          <div class="card-body">
            <h4>
              <?=display_output($post['title']);?>
            </h4>
            <p>
              <?=display_output($post['benefits']);?>
            </p>
            <?php if ($userId == $post['user_id']): ?>
            <p>

              <div class="btn-group float-right">
                <button class="ebtn btn btn-light btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-quidditch"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="edit.php?pid=<?=$post['id'];?>"><i class="fas fa-pencil-alt"></i>
                    Edit</a>
                  <a class="dropdown-item confirm-ms-link" href="delete.php?pid=<?=$post['id'];?>"><i
                      class="fas fa-eraser"></i>
                    Delete</a>
                </div>
              </div>
            </p>
            <?php endif;?>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</main>
<a class="btn btn-outline-success rounded float-right upBtn mb-5" type="button" href=""><i
    class="fas fa-arrow-circle-up"></i></a>

<?php
include 'tmpls/footer.php';
?>