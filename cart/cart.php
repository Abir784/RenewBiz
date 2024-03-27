<?php 
$page= "My cart";
include '../session_check.php';
include '../page_includes/dashboard_header.php';
//amr id session diye dhorte hobe age
$user_id=$_SESSION['login_user_id'];
//then oi user id diye buyer table theke buyer id ante hobe
$select_query="SELECT * FROM buyer WHERE user_id='$user_id'";
$buyer_select_query_result=mysqli_query($dbconnect,$select_query);
$buyer=mysqli_fetch_assoc($buyer_select_query_result);
$bid=$buyer['id'];

// then oi buyer id diye cart table theke amr product id gula ana lagbe
$product_select_query="SELECT * FROM carts WHERE buyer_id='$bid'";
$product_select_query_result=mysqli_query($dbconnect,$product_select_query);

//then oi product id diye product table e join korbo and product er details anbo
$product_details_query="SELECT c.id AS cart_id, p.id,p.name AS p_name, p.price as price, p.image AS product_image, c.quantity AS quantity FROM product p, carts c WHERE c.product_id = p.id";
$products=mysqli_query($dbconnect,$product_details_query);
$grand_total=0;

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
            <form action="confirmed_order.php" method="post">
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
                    <?php foreach($products as $key=>$product){?>
                    <tr> 
                        <?php
                        $grand_total+=($product['price']*$product['quantity']);

                        ?>
                        <th scope="row"><?=$key+1?></th>
                        <th><img class="rounded-pill" width="150" height="75" src="../images/product/<?=$product['product_image']?>" alt="0.jpg"></th>
                        <td><?=$product['p_name']?></td>
                        <td><input class="form-control" type="number" name="quantity<?=$key+1?>" value="<?=$product['quantity']?>"></td>
                        <input type="hidden" name="id<?=$key+1?>" value="<?=$product['id']?>">
                        <td><?=$product['price']?> TK.</td>
                        <td><?=$product['price']*$product['quantity']?> TK.</td>
                        <input type="hidden" name="total_price<?=$key+1?>" value="<?=$product['price']*$product['quantity']?>">
                        <input type="hidden" name="cart_id<?=$key+1?>" value="<?=$product['cart_id']?>">
                        <td><a href="cart_delete.php?id=<?=$product['id']?>" class="btn btn-danger" id="alertButton">Remove</a></td>
                    
                    </tr>
                    <?php } ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                    <td colspan="4" class="text-right">Grand Total:</td>
                    <td><?=$grand_total?> TK.</td>
                    <td></td>
                    </tr>
                </tfoot>
                </table>
                <div class="text-right">
                <button type="submit" name="save" class="btn btn-secondary mb-3">Save</button>
                <button type="submit" name="confirm_order" class="btn btn-info mb-3">Confirm Order</button>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </section>

<?php 
include '../page_includes/dashboard_footer.php'
?>

<?php if(isset($_SESSION['success'])) {?>
<script>
  $(document).ready(function(){
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "<?=$_SESSION['success']?>",
    showConfirmButton: false,
    timer: 1050
      });
});
</script>
<?php } unset($_SESSION['success'])?>
