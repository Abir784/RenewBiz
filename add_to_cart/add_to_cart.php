
<?php 
include '../session_check.php';

include '../page_includes/dashboard_header.php'
?>

<div class="main-content">
  <div class="header p-0 p-md-3">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center">
          <div class="col d-flex align-items-center">
            <a href="#" class="back-arrow bg-white circle circle-sm shadow-dark-80 rounded mb-0"><img src="../assets/svg/icons/chevrons-left1.svg" alt="Chevrons"></a>
            <div class="ps-0 ps-md-3">
              <h1 class="h4 mb-0">
                My Cart
              </h1>
            </div>
          </div>
          <div class="col-auto d-flex flex-wrap align-items-center">
            <a href="#" class="text-dark h5 mb-0 notification dnd"><img src="../assets/svg/icons/notification.svg" style="width:20px;" alt="Notification"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/setting1.svg" alt="Setting"></a>
            <a href="#" class="text-dark ms-4 h5 mb-0 ps-2"><img src="../assets/svg/icons/hamburger1.svg" alt="Hamburger"></a>
            <div class="dropdown d-none d-md-inline-block ps-2">
              <a href="#" class="avatar avatar-sm avatar-circle avatar-border-sm ms-4" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                <img class="avatar-img" src="../assets/img/templates/avatar1.svg" alt="Avatar">
                <span class="avatar-status avatar-sm-status avatar-danger">&nbsp;</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-3 bg-gray-200">
 
<div class="container mb-5">
  <!-- Muse Section, Py 4, Py Md 5 -->
 
  <!-- Muse Section, Pt 4 -->
  <section class="muse-section pt-4 mb-5">
        <div class="row">
         <div class="col-lg-12">
            <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
            <div class="border-bottom border-gray-200 px-4 px-md-5 py-4">
                <h5 class="mb-0">Cart info</h5>
            </div>
            <div class="container mt-5">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <th><img class="rounded-pill" width="150" height="75" src="../images/product/0.jpg" alt="0.jpg"></th>
                    <td>Product Name 1</td>
                    <td><input class="form-control" type="number" name="quantiy"></td>
                    <td>$10.00</td>
                    <td>$20.00</td>
                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <th><img class="rounded-pill" width="150" height="75"src="../images/product/0.jpg" alt="0.jpg"></th>
                    <td>Product Name 2</td>
                    <td><input class="form-control" type="number" name="quantiy"></td>
                    <td>$15.00</td>
                    <td>$15.00</td>
                    <td><button class="btn btn-sm btn-danger">Remove</button></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                    <td colspan="4" class="text-right">Total:</td>
                    <td>$35.00</td>
                    <td></td>
                    </tr>
                </tfoot>
                </table>
                <div class="text-right">
                <button class="btn btn-primary mb-3">Confirm Order</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>


<?php 
include '../page_includes/dashboard_footer.php'
?>