<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Simple - Muse Documentation | Muse - Responsive Website Template</title>
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
<body class="login-simple-template bg-gray-100">  
<!-- Muse Login -->
<div class="container">
  <div class="row align-items-center vh-100">
    <div class="col-md-10 col-lg-6 m-auto py-4 py-md-5">
      <div class="text-center pb-4 mb-3">
        <!--<img src="../assets/img/pages/logo.svg" alt="Muse">-->
      </div>
      
      <?php if(isset($_SESSION['error1'])){ ?>
          <div class="alert alert-danger" ><?=$_SESSION['error1']?></div>
          <?php }unset($_SESSION['error1'])?>

      <div class="bg-white rounded-12 shadow-dark-80 py-4 py-md-5 px-md-4 px-3">
        <h1 class="mb-md-3 mb-0 text-center">Sign up as Seller</h1>
        <div class="d-flex flex-wrap justify-content-center align-items-center my-md-3 my-2 pt-md-2 pt-sm-1 px-xl-4 social-login">
        </div>
        <form class="p-2" action="post_signup.php" method="POST">
          <div class="mb-4">
            <label class="form-label form-label-lg">Email</label>
            <input type="email" class="form-control form-control-lg" name ="email">
          </div>
          <div class="mb-4">
            <label class="form-label form-label-lg">Password</label>
            <input type="password" class="form-control form-control-lg" name="password">
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-xl btn-primary">Sign up</button>
        </form>
        <div class="text-center pt-2 pt-md-5 pb-md-2">
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Muse Javascript Plugins -->
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>