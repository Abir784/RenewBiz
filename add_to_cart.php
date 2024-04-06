<?php
session_start();
include 'page_includes/index_header.php';
include 'db.php';
$id=$_GET['id'];
$select_product_query="SELECT * FROM product WHERE id='$id'";
if(isset($_SESSION['login_user_id'])){
    $user_id=$_SESSION['login_user_id'];
    $if_buyer_exists="SELECT EXISTS (SELECT * FROM buyer WHERE user_id = '$user_id') as buyer";
    $buyer_exists_result=mysqli_query($dbconnect,$if_buyer_exists);
    $exists_result=mysqli_fetch_assoc($buyer_exists_result);
    $data=$exists_result['buyer'];
    
    if ($data){
        
        $if_product_exists="SELECT EXISTS (SELECT * FROM orders WHERE (user_id = '$user_id' and product_id = '$id' and status = 2)) as orders";
        $product_exists_result=mysqli_query($dbconnect,$if_product_exists);
        $product_exists=mysqli_fetch_assoc($product_exists_result);
        $product_data=$product_exists['orders'];
    
    } else {
        $product_data=false;
    }
  }

$select_product_query="SELECT * FROM product WHERE id='$id'";
$product_id=$_GET['id'];
$select_product_query="SELECT * FROM product WHERE id='$product_id'";
$select_product_query_result=mysqli_query($dbconnect,$select_product_query);
$product=mysqli_fetch_assoc($select_product_query_result);
if(isset($_SESSION['login_user_id'])){

  $user_id=$_SESSION['login_user_id'];

  $if_buyer_exists="SELECT EXISTS (SELECT * FROM buyer WHERE user_id = '$user_id') as buyer";
  $buyer_exists_result=mysqli_query($dbconnect,$if_buyer_exists);
  $exists_result=mysqli_fetch_assoc($buyer_exists_result);
  $data=$exists_result['buyer'];
  
  if ($data){
      $if_product_exists="SELECT EXISTS (SELECT * FROM orders WHERE (user_id = '$user_id' and product_id = '$id' and status=2)) as orders";
      $product_exists_result=mysqli_query($dbconnect,$if_product_exists);
      $product_exists=mysqli_fetch_assoc($product_exists_result);
      $product_data=$product_exists['orders'];
  
  } else {
      $product_data=false;
  }
}
$select_buyer_feedback="SELECT u.image as profile_image ,b.name as buyer_name,bf.comment,bf.rating FROM user u, buyer_feedback bf,buyer b WHERE (u.id=b.user_id and b.id=bf.buyer_id and product_id='$id')";
$buyer_feedback_query=mysqli_query($dbconnect,$select_buyer_feedback);
$avg_query= "SELECT avg(rating) as avg_rating FROM buyer_feedback WHERE product_id='$id'";
$avg_rating_query_result=mysqli_query($dbconnect,$avg_query);
$avg_rating=mysqli_fetch_assoc($avg_rating_query_result)['avg_rating'];



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
          <path d="M17.076,19.2,12,16.14,6.924,19.2l1.344-5.772L3.792,9.546l5.9-.5L12,3.6l2.3,5.442,5.9.5-4.476,3.882Z" transform="translate(-3.792 -3.6)" fill="#ffffff"/></svg></span> <?=round($avg_rating,3)?></p>
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
<?php if(isset($_SESSION['login_user_id']) and $product_data){ ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mt-5">Feedback</h2>
            <form action="feedback/post.php" method="post">
                <input type="hidden" name ="product_id" value ="<?=$id?>">
                
                <div class="form-group">
                    <label for="feedback">Your Feedback</label>
                    <textarea name="comment" id="feedback" class="form-control" rows="5" required></textarea>
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
                <div class="mb-3" >
                    <button type="submit" class="btn btn-success">submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php } ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mt-5">Feedbacks</h2>
            <?php foreach($buyer_feedback_query as $key=>$feedback){?>
            <div class="media bg-white m-2">
                <div class="media-body">
                <img src="images/user/<?=$feedback['profile_image']?>" alt="Buyer Image" width="50" height="50" style="border-radius: 50%; margin:10px;">
                    <b style="display: inline-block; margin:8px"><?=$feedback['buyer_name']?></b>
                    <p class="star-icon"  style="display: inline-block;" >
                        <span class="rounded-pill">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16.416 15.6" >
                            <path d="M17.076,19.2,12,16.14,6.924,19.2l1.344-5.772L3.792,9.546l5.9-.5L12,3.6l2.3,5.442,5.9.5-4.476,3.882Z" transform="translate(-3.792 -3.6)" fill="#ffffff"/></svg></span> <?=$feedback['rating']?>
                    </p>
                                
                    <p class="text-muted" style="margin-left:8px">
                     <?=$feedback['comment']?>
                     </p>
                </div>
            </div>
            <?php }?>
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

