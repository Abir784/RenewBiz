<?php 
$page='Inventory';
include '../session_check.php';
include '../page_includes/dashboard_header.php';
include '../db.php';
$id=$_GET['id'];
$product_select_query="SELECT p.id,p.name AS p_name, c.name AS category_name,p.price AS price,p.image AS product_image,p.description AS p_description  FROM product p INNER JOIN Category c ON p.category_id = c.id WHERE p.id=$id";
$products=mysqli_query($dbconnect,$product_select_query);
$product=mysqli_fetch_assoc($products);
//if exists in Inventory
$if_inventory_exists="SELECT EXISTS(SELECT * FROM inventory WHERE product_id = '$id') as product_exists";
$inventory_exists=mysqli_query($dbconnect,$if_inventory_exists);
$quantity=0;
if(mysqli_fetch_assoc($inventory_exists)['product_exists']){
  $inventory="SELECT weight FROM inventory WHERE product_id = '$id'";
  $inventory_result=mysqli_query($dbconnect,$inventory);
  $quantity=mysqli_fetch_assoc($inventory_result)['weight'];
}
?>

 
<div class="container mb-5">
  <!-- Muse Section, Py 4, Py Md 5 -->
 
  <!-- Muse Section, Pt 4 -->
    <section class="muse-section pt-4 mb-5">
                <div class="row">
                <div class="col-lg-12">
                    <div class="bg-white rounded-12 shadow-dark-80 mb-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="border-bottom border-gray-200 px-4 px-md-5 py-4">
                        <h5 class="mb-0">Add Inventory</h5>
                    </div>
                        <div class="container mt-5">
                          <div class="card mb-3">
                            <img src="../images/product/<?=$product['product_image']?>"  width="180px" height="180px" class="rounded float-start ml-2" alt="Product Image">
                            <div class="card-body">

                            <table class="table table-borderless">
                              <thead>
                              <tr>
                                <td><h5 class="card-title">Product Name:</h5></td>
                                <td><h5 class="card-title" >Category:</h5></td>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                <td><?=$product['p_name']?> </td>
                                <td><?=$product['category_name']?></td>
                              </tr>
                              <tr >
                                <td >
                                  <p class="card-text"><b>Description:</b><br> <?=$product['p_description']?></p>
                                </td>
                                <td > 
                                    <p class="card-text"><b>Price:</b> <br><?=$product['price']?> Tk (per Kg) </p>
                                </td>
                              </tr>
                              <tr>
                                <td >
                                  <p class="card-text"><b>In-Stock:</b><br> <?=$quantity?> Kg's</p>
                                </td>
                                <td > 
                                    <p class="card-text"></p>
                                </td>
                              </tr>
                              </tbody>
                              
                            </table>
                            </div>
                          </div>
                          <form action="inventory_post.php" method="post" class="ml-3">
                            <input type="hidden" value="<?=$product['id']?>" name="id" >
                            <div class="form-group">
                              <label for="weight">Weight (in kg):</label>
                              <input type="number" class="form-control" name="weight" min="0" step="0.01" required>
                            </div>
                            <button type="submit" class="btn btn-primary mb-5">Add</button>
                          </form>
                        </div>
                </div>
           </div>
       </div>
    </section>

<?php 

include '../page_includes/dashboard_footer.php';

?>
































