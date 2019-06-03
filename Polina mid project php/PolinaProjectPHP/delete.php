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
    $sql = "DELETE FROM posts WHERE id = $pid AND user_id = $userId";
    $sm = db_delete($sql) ? '?sm=Goal deleted' : '';
    header('location: blog.php' . $sm);

}