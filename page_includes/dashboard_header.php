<html lang="en">
<head>
<title>Dashboard - Muse Documentation | Muse - Responsive Website Template</title>
<meta charset="UTF-8">
<meta name="description" content="Muse">
<meta name="keywords" content="Muse">
<meta name="author" content="Muse">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Muse Favicon -->
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- Muse Plugins CSS -->
<link href="../assets/vendor/simplebar/dist/simplebar.min.css" rel="stylesheet" type="text/css" media="all">
<!-- Muse Theme CSS -->
<link href="../assets/css/theme.min.css" rel="stylesheet" type="text/css" media="all">
</head>
<body class="bg-gray-100 dashboard-template" id="mainBox">

<!-- Navbar, Navbar Vertical, Navbar Expand Md, Navbar Light -->
<nav class="navbar navbar-vertical navbar-expand-md navbar-light">
  <a href="#" class="back-arrow d-block d-md-none">
    <img src="../assets/svg/icons/hamburger1.svg" alt="img">
    <img src="../assets/svg/icons/close1.svg" style="width:20px;" class="menu-close" alt="img">
  </a>
  <a class="navbar-brand mx-auto d-block my-0 my-md-4" href="#">
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
      <?php if(isset($_SESSION['login_done'])  and $_SESSION['login_done']==1) {?>
        
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
              <a href="#" class="nav-link">Light Mode</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Dark Mode</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
          <img src="../assets/svg/icons/page.svg" alt="Chart" class="me-2"> &nbsp;Pages
        </a>
        <div class="collapse collapse-box" id="sidebarPages" data-parent="#accordionExample">
          <ul class="nav nav-sm flex-column">
            <li class="nav-item">
              <a href="#" class="nav-link">Light Mode</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Dark Mode</a>
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