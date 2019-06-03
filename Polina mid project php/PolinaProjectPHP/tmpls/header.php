<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">




  <title>
    <?=$title;?>
  </title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
      <a class="navbar-brand text-dark" href="./">Motiv<i class="fas fa-road"></i>te!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-dark"><i class="fas fa-chevron-circle-down fa-lg"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-dark" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="blog.php">Blog</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <?php if (!isset($_SESSION['user_id'])): ?>
          <li class="nav-item">

            <a class="nav-link text-dark" href="login.php">Log in</a>

          </li>

          <li class="nav-item">
            <a class="nav-link text-dark" href="create_acc.php">Create new account</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="user.php">
              <?=htmlspecialchars($_SESSION['user_name']);?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="logout.php">Logout</a>
          </li>
          <?php endif;?>
        </ul>
      </div>
    </nav>
  </header>