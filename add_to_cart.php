<?php
session_start();
include 'page_includes/index_header.php';
include 'db.php';
$id=$_GET['id'];

$select_product_query="SELECT * FROM product WHERE id='$id'";
$select_product_query_result=mysqli_query($dbconnect,$select_product_query);
$product=mysqli_fetch_assoc($select_product_query_result);
?>
<div class="container">
  <div class="row">
    <div class="col-lg-6 order-lg-2 text-lg-end mt-auto" data-aos="fade-up" data-aos-delay="100">
      <img src="images/product/<?=$product['image']?>" class="img-fluid" alt="Banner">
    </div>
    <div class="col-lg-6 mt-4 mb-2 my-lg-0">
      <p class="star-icon"><span class="rounded-pill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16.416 15.6">
          <path d="M17.076,19.2,12,16.14,6.924,19.2l1.344-5.772L3.792,9.546l5.9-.5L12,3.6l2.3,5.442,5.9.5-4.476,3.882Z" transform="translate(-3.792 -3.6)" fill="#ffffff"/></svg></span> 4.8</p>
      <h1 class="display-4 mt-2 text-uppercase"><?=$product['name']?></h1>
      <p class="big mt-1 lh-lg"><?=$product['description']?></p>
      <p class="h3 mt-4"><?=$product['price']?> Tk</p>
      <div class="mt-2">
        <a href="cart/cart_post.php?id=<?=$id?>" class="btn btn-xl btn-dark font-weight-semibold text-uppercase me-2 px-5"><span class="px-md-5">Add to Cart</span></a>
        </a>
      </div>
      <small class="text-uppercase text-gray-600 d-block my-3">FREE SHIPPING</small>
    </div>
  </div>
</div>

<?php
include 'page_includes/index_footer.php';
?>

<?php if(isset($_SESSION['success'])) {?>
<script>
  $(document).ready(function(){
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "<?=$_SESSION['success']?>",
    showConfirmButton: false,
    timer: 750
      });
});
</script>
<?php } unset($_SESSION['success'])?>
