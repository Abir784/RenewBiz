<?php
include 'db.php';
if(isset($_SESSION['login_user_id'])){
  $id=$_SESSION['login_user_id'];
  $user_select_query="SELECT * FROM user WHERE id='$id'";
  $user_select_query_result=mysqli_query($dbconnect,$user_select_query);
  $user=mysqli_fetch_assoc($user_select_query_result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>RenewBiz - Grow Business and Nature</title>
<meta charset="UTF-8">
<meta name="description" content="Muse">
<meta name="keywords" content="Muse">
<meta name="author" content="Muse">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Muse Favicon -->
<link href="images/web/small_logo.png" rel="shortcut icon" type="image/x-icon">
<!-- Muse Plugins CSS -->
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" media="all">
<link href="assets/vendor/aos/dist/aos.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="assets/css/wishlist.css">
<!-- Muse Theme CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" media="all">

</head>
<body class="bg-gray-100 ecommerce-template">

<!-- Muse Header, Py 0, Py Sm 2 -->
<header class="muse-header py-0 py-sm-2">
  <div class="container">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="index.php">
        <img src="images/web/logo.png" alt="Muse">
      </a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="menu-icon" data-name="icons/tabler/hamburger" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
          <rect data-name="Icons/Tabler/Hamburger background" width="16" height="16" fill="none"/>
          <path d="M15.314,8H.686A.661.661,0,0,1,0,7.368a.653.653,0,0,1,.593-.625l.093-.006H15.314A.661.661,0,0,1,16,7.368a.653.653,0,0,1-.593.626Zm0-6.737H.686A.661.661,0,0,1,0,.632.654.654,0,0,1,.593.005L.686,0H15.314A.661.661,0,0,1,16,.632a.653.653,0,0,1-.593.625Z" transform="translate(0 4)" fill="#1e1e1e"/>
        </svg>          
        <svg class="menu-close" data-name="icons/tabler/close" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
          <rect data-name="Icons/Tabler/Close background" width="16" height="16" fill="none"/>
          <path d="M.82.1l.058.05L6,5.272,11.122.151A.514.514,0,0,1,11.9.82l-.05.058L6.728,6l5.122,5.122a.514.514,0,0,1-.67.777l-.058-.05L6,6.728.878,11.849A.514.514,0,0,1,.1,11.18l.05-.058L5.272,6,.151.878A.514.514,0,0,1,.75.057Z" transform="translate(2 2)" fill="#1e1e1e"/>
        </svg>          
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto">
         
       
        
        
          
        </ul>
        

        <?php if(isset($_SESSION['login_user_id']) and ($_SESSION['login_done']==2)) {?>

        <a href="cart/cart.php" class="btn btn-trasnparent m-3" style="margin-left:5px ;"><i class="fa-solid fa-cart-shopping m-3"></i>Cart</a>
        <a href="cart/wishlist.php" class="btn btn-trasnparent m-3" style="margin-left:5px ;"><i class="fa-solid fa-heart m-3"></i> Wishlist</a>
        <a href="dashboard/dashboard.php" class="btn btn-trasnparent m-3" style="margin-left:5px ;"><i class="fa-solid fa-house m-3"></i>Dashboard</a>
        <div class="dropdown d-none d-md-inline-block ps-2">
              <a href="#" class="avatar avatar-sm avatar-circle avatar-border-sm ms-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                <img class="avatar-img" src="images/user/<?=$user['image']?>" alt="<?=$user['image']?>">
                <span class="avatar-status avatar-sm-status avatar-success">&nbsp;</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="individual_profile/account-profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="login/logout.php">Logout</a></li>
              </ul>
            </div>
        <?php } elseif(isset($_SESSION['login_user_id']) and ($_SESSION['login_done']==1)) {?>
          <a href="dashboard/dashboard.php" class="btn btn-trasnparent m-3" style="margin-left:5px ;"><i class="fa-solid fa-house m-3"></i>Dashboard</a>
          <div class="dropdown d-none d-md-inline-block ps-2">
              <a href="#" class="avatar avatar-sm avatar-circle avatar-border-sm ms-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                <img class="avatar-img" src="images/user/<?=$user['image']?>" alt="<?=$user['image']?>">
                <span class="avatar-status avatar-sm-status avatar-success">&nbsp;</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="individual_profile/account-profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="login/logout.php">Logout</a></li>
              </ul>
            </div>
        <?php }else { ?>
        <a href="dashboard/dashboard.php" class="btn btn-trasnparent m-3"><i class="fa-solid fa-user-tie m-2"></i> Sign-in</a>
        <?php } ?>
      </div>
    </nav>
  </div>
</header>