<?php
session_start();
include 'page_includes/index_header.php';
include 'db.php';
$id=$_GET['id'];

$if_buyer_exists="SELECT EXISTS (SELECT * FROM buyer WHERE user_id = '$user_id') as buyer";
$buyer_exists_result=mysqli_query($dbconnect,$if_buyer_exists);
$exists_result=mysqli_fetch_assoc($buyer_exists_result);
$data=$exists_result['buyer'];

if ($data){
    $if_product_exists="SELECT EXISTS (SELECT * FROM orders WHERE (product_id = '$id' and buyer_id = '$buyer_id')) as order";
    $product_exists_result=mysqli_query($dbconnect,$if_product_exists);
    $product_exists=mysqli_fetch_assoc($product_exists_result);
    $product_data=$product_exists['order'];

    header('location:add_to_cart.php'); 
}
else 


$select_product_query="SELECT * FROM product WHERE id='$id'";
$product_id=$_GET['id'];
$select_product_query="SELECT * FROM product WHERE id='$product_id'";
$select_product_query_result=mysqli_query($dbconnect,$select_product_query);
$product=mysqli_fetch_assoc($select_product_query_result);

?>
<style>
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;}
</style>
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
        <a href="cart/cart_post.php?id=<?=$product_id?>" class="btn btn-xl btn-dark font-weight-semibold text-uppercase me-2 px-5"><span class="px-md-5">Add to Cart</span></a>
        </a>
      </div>
      <small class="text-uppercase text-gray-600 d-block my-3">FREE SHIPPING</small>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mt-5">Feedback</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="feedback">Your Feedback</label>
                    <textarea name="feedback" id="feedback" class="form-control" rows="5" required></textarea>
                </div>
                <div class="form-class">
                  <label for="rating" class="form-control"></label>
                  <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mt-5">Feedbacks</h2>
            <?//php if($product['avg_rating']): ?>
            <div class="media">
                <img class="me-3" src="#" alt="profile" width="50">
                <div class="media-body">
                    <h5><?//=$feedback['name']?></h5>
                    <p><?//=$feedback['feedback']?></p>
                    <p class="text-muted">
            </p>
                </div>
            </div>
            <?//php endwhile; ?>
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
    timer: 1050
      });
});
</script>
<?php } unset($_SESSION['success'])?>

