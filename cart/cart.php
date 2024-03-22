<?php 
$page= "My cart";
include '../session_check.php';
include '../page_includes/dashboard_header.php'
?> 
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