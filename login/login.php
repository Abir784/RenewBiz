<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login / Registration to RenewBiz</title>
<meta charset="UTF-8">
<meta name="description" content="Muse">
<meta name="keywords" content="Muse">
<meta name="author" content="Muse">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Muse Favicon -->
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- Muse Plugins CSS -->
<link href="../assets/vendor/aos/dist/aos.css" rel="stylesheet" type="text/css" media="all">
<!-- Muse Theme CSS -->
<link href="../assets/css/theme.min.css" rel="stylesheet" type="text/css" media="all">
</head>
<body class="login-template">
<!-- Muse Login -->
<div class="position-absolute p-4 p-md-5">
  <a href="#"><img src="../assets/svg/brand/logo-white.svg" alt="Muse"></a>
</div>
<div class="row g-0 align-items-center">
  <div class="col-md-6 col-lg-7">
    <img src="../assets/img/pages/login-cover.jpg" class="cover-fit" alt="Login Cover">
  </div>
  <div class="col-md-6 col-lg-5">
    <div class="p-3 p-sm-5">
      <div class="login-form ms-lg-4">
        <h1 class="mb-3">Sign in</h1>

        <?php if(isset($_SESSION['error'])){ ?>
          <div class="alert alert-danger" ><?=$_SESSION['error']?></div>
          <?php }unset($_SESSION['error'])?>
          <?php if(isset($_SESSION['success'])){ ?>
          <div class="alert alert-success" ><?=$_SESSION['success']?></div>
          <?php }unset($_SESSION['success'])?>
        <form class="pt-2"  action="post.php" method="post">
          <div class="mb-4">
            <label class="form-label form-label-lg">Email</label>
            <input 
            me="email" type="text" class="form-control form-control-lg" value="">
          </div>
          <div class="mb-4">
            <label class="form-label form-label-lg">Password</label>
            <input name="password" type="password" class="form-control form-control-lg" value="">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-xl btn-primary">Sign in</button>
          </div>
          <div class="mt-3">
          <p>Don't have an account? <a href="signup.php">Sign Up as Seller</a></p>

            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  
<!-- Muse Javascript Plugins -->
</body>
</html>
