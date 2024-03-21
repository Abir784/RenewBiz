<?php
include '../db.php';
$id=$_SESSION['login_user_id'];
$user_select_query="SELECT * FROM user WHERE id='$id'";
$user_select_query_result=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_select_query_result);
$role=$user['role'];

?>
<html lang="en">
<head>
<title>Dashboard - Muse Documentation | Muse - Responsive Website Template</title>
<meta charset="UTF-8">
<meta name="description" content="Muse">
<meta name="keywords" content="Muse">
<meta name="author" content="Muse">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Muse Favicon -->
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- Muse Plugins CSS -->
<link href="../assets/vendor/simplebar/dist/simplebar.min.css" rel="stylesheet" type="text/css" media="all">
<!-- Muse Theme CSS -->
<link href="../assets/css/theme.min.css" rel="stylesheet" type="text/css" media="all">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 
</head>
<body class="bg-gray-100 dashboard-template" id="mainBox">

<!-- Navbar, Navbar Vertical, Navbar Expand Md, Navbar Light -->
<nav class="navbar navbar-vertical navbar-expand-md navbar-light">
  <a href="#" class="back-arrow d-block d-md-none">
    <img src="../assets/svg/icons/hamburger1.svg" alt="img">
    <img src="../assets/svg/icons/close1.svg" style="width:20px;" class="menu-close" alt="img">
  </a>
  <a class="navbar-brand mx-auto d-block my-0 my-md-4" href="../index.php">
    <img src="../assets/svg/brand/logo.svg" alt="Muse">
    <img src="../assets/svg/brand/muse-icon.svg" class="muse-icon" alt="Muse">
  </a>
  <div class="navbar-user d-md-none">
    <div class="dropdown">
      <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-sm avatar-circle">
          <img src="../assets/img/templates/avatar1.svg" class="avatar-img rounded-circle" alt="img">
          <span class="avatar-status avatar-sm-status avatar-success"></span>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarIcon">
        <a href="#" class="dropdown-item">Profile</a>
        <a href="#" class="dropdown-item">Settings</a>
        <hr class="dropdown-divider">
        <a href="#" class="dropdown-item">Logout</a>
      </div>
    </div>
  </div>
  <div class="navbar-collapse">
    <ul class="navbar-nav mb-2" id="accordionExample" data-simplebar>
      <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==1) {?>
        
      <li class="nav-item">
        <a class="nav-link collapsed" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
          <img src="../assets/svg/icons/power-outline.svg" alt="Power" class="me-2"> &nbsp;Product
        </a>
        <div class="collapse collapse-box" id="sidebarLanding" data-parent="#accordionExample">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a href="../product/add_product.php" class="nav-link active">
                Add Product
              </a>
            </li>
            <li class="nav-item">
              <a href="../product/show_product.php" class="nav-link active">
                Show Product
              </a>
            </li>
          </ul>
        </div>
      </li>

        <?php } ?>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
          <img src="../assets/svg/icons/chart.svg" alt="Chart" class="me-2"> &nbsp;Dashboards
        </a>
        <div class="collapse collapse-box" id="sidebarDashboards" data-parent="#accordionExample">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a href="../cart/cart.php" class="nav-link">My Cart</a>
            </li>
            <li class="nav-item">
              <a href="../cart/wishlist.php" class="nav-link">My Wishlist</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <img src="../assets/svg/icons/docs.svg" alt="Paperclip" class="me-2"> &nbsp;Docs
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <img src="../assets/svg/icons/paperclip.svg" alt="Paperclip" class="me-2"> &nbsp;Snippets
        </a>
      </li>
    </ul>
    
    <!--<div class="mt-3 mt-md-auto mb-3 signout d-grid">-->
    <div class="col-md-12 py-2">
      <a href="#" class="btn btn-primary btn-lg"><img src="../assets/img/dashboard/cart-outline.svg" alt="Cart"><span>Buy Now</span></a>
    </div>
    
  </div>
</nav>
<!-- Main Content -->
<div class="main-content">
  <div class="header p-0 p-md-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center">
          <div class="col d-flex align-items-center">
            <a href="#" class="back-arrow bg-white circle circle-sm shadow-dark-80 rounded mb-0"><img src="../assets/svg/icons/chevrons-left1.svg" alt="Chevrons"></a>
            <div class="ps-0 ps-md-3">
              <h1 class="h4 mb-0">
                <?=$page?>
              </h1>
            </div>
          </div>
          <div class="col-auto d-flex flex-wrap align-items-center">
            <a href="#" class="text-dark h5 mb-0 notification dnd"><img src="../assets/svg/icons/notification.svg" style="width:20px;" alt="Notification"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/setting1.svg" alt="Setting"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/hamburger1.svg" alt="Hamburger"></a>
            <div class="dropdown d-none d-md-inline-block ps-2">
              <a href="#" class="avatar avatar-sm avatar-circle avatar-border-sm ms-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                <img class="avatar-img" src="../images/user/<?=$user['image']?>" alt="Avatar">
                <span class="avatar-status avatar-sm-status avatar-danger">&nbsp;</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="../individual_profile/account-profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-3 bg-gray-200">
  </section>
