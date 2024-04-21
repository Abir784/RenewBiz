<?php
session_start();
include('page_includes/index_header.php');
include 'db.php';
$product_select='SELECT p.id as id,p.image as image,p.name as name,p.price as price,i.weight as weight FROM product p,inventory i WHERE i.product_id=p.id and p.status=1';
$products=mysqli_query($dbconnect,$product_select);
?>



<div class="container mt-4">
        <h6 class="mt-5"><b>Search Product</b></h6>
        <div class="input-group mb-5 mt-3">
            <div class="form-outline">
                <input type="text" id="getName"/>
            </div>
        </div>
</div>
<div class="container bg-white">
    

    <div class="row" id="sadia">
        
        
        <!-- Start Loop-->
        <?php foreach($products as $product) {?>
            <?php 
                  $product_id=$product['id'];
                  $avg_query= "SELECT avg(rating) as avg_rating FROM buyer_feedback WHERE product_id='$product_id'";
                  $avg_rating_query_result=mysqli_query($dbconnect,$avg_query);
                  $avg_rating=mysqli_fetch_assoc($avg_rating_query_result)['avg_rating'];
                    if($avg_rating == NULL){
                      $avg_rating=0;

                    }
            ?>
         <div class="col-lg-4">
            <div class="swiper-slide">
            <figure class="card border-0 transition-3d-hover">
              <div class="rounded-6 bg-light-100 px-4 pt-4 pb-5 position-relative">
                <div><small class="star-icon big bg-white rounded-pill ps-2 pe-3 d-inline-flex align-items-center"><span class="rounded-pill me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16.416 15.6">
                  <path d="M17.076,19.2,12,16.14,6.924,19.2l1.344-5.772L3.792,9.546l5.9-.5L12,3.6l2.3,5.442,5.9.5-4.476,3.882Z" transform="translate(-3.792 -3.6)" fill="#ffffff"/>
                </svg></span><?=round($avg_rating,2)?></small></div>
                <a href="add_to_cart.php?id=<?=$product['id']?>" class="py-2 mb-md-4 muse-animation has-height"><img class="img-fluid" src="images/product/<?=$product['image']?>" alt="img"></a>

                <?php if($product['weight']>0){?>
                            <?php if(isset($_SESSION['login_done']) and ($_SESSION['login_done']==1)){?>
                                <a href="#" class="add-cart">
                                    <svg data-name="icons/tabler/cart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                    <rect data-name="Icons/Tabler/Cart background" width="16" height="16" fill="none"/>
                                    <path d="M8.753,13.995A2.006,2.006,0,1,1,10.759,16,2.008,2.008,0,0,1,8.753,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,9.847,13.995Zm-6.929,0A2.006,2.006,0,1,1,4.924,16,2.008,2.008,0,0,1,2.918,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,4.012,13.995ZM10.9,11.309l-.142,0H5.684c-.052,0-.1,0-.157,0A2.723,2.723,0,0,1,3,9.616l-.052-.136-.023-.092L2.1,4.434l-.013-.028a.5.5,0,0,1-.038-.139l-.005-.074a.512.512,0,0,1,.005-.075L1.542,1.094H.547A.548.548,0,0,1,.005.621L0,.547A.548.548,0,0,1,.473.005L.547,0H2.006a.544.544,0,0,1,.52.38l.019.077.531,3.19h10.6a.547.547,0,0,1,.547.549l-.006.076-.729,5.1-.025.1a2.721,2.721,0,0,1-2.554,1.829Zm-.111-1.1.095,0a1.64,1.64,0,0,0,1.5-.977l.03-.077.632-4.419H3.259l.735,4.412.033.085a1.643,1.643,0,0,0,1.491.977l.133,0Z" transform="translate(1)" fill="#1e1e1e"/>
                                    
                                    </svg>
                                </a>
                                <a href="#" class="add-wishlist"><i class="fa-sharp fa-regular fa-heart"></i></a>

                        <?php } elseif(isset($_SESSION['login_done']) and ($_SESSION['login_done']==2)){?>
                            <a href="cart/cart_post.php?id=<?=$product['id']?>" class="add-cart">
                            <svg data-name="icons/tabler/cart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                <rect data-name="Icons/Tabler/Cart background" width="16" height="16" fill="none"/>
                                <path d="M8.753,13.995A2.006,2.006,0,1,1,10.759,16,2.008,2.008,0,0,1,8.753,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,9.847,13.995Zm-6.929,0A2.006,2.006,0,1,1,4.924,16,2.008,2.008,0,0,1,2.918,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,4.012,13.995ZM10.9,11.309l-.142,0H5.684c-.052,0-.1,0-.157,0A2.723,2.723,0,0,1,3,9.616l-.052-.136-.023-.092L2.1,4.434l-.013-.028a.5.5,0,0,1-.038-.139l-.005-.074a.512.512,0,0,1,.005-.075L1.542,1.094H.547A.548.548,0,0,1,.005.621L0,.547A.548.548,0,0,1,.473.005L.547,0H2.006a.544.544,0,0,1,.52.38l.019.077.531,3.19h10.6a.547.547,0,0,1,.547.549l-.006.076-.729,5.1-.025.1a2.721,2.721,0,0,1-2.554,1.829Zm-.111-1.1.095,0a1.64,1.64,0,0,0,1.5-.977l.03-.077.632-4.419H3.259l.735,4.412.033.085a1.643,1.643,0,0,0,1.491.977l.133,0Z" transform="translate(1)" fill="#1e1e1e"/>
                            </svg>
                            </a>
                            <a href="cart/wishlist_post.php?id=<?=$product_id?>" class="add-wishlist"><i class="fa-sharp fa-regular fa-heart"></i></a>
                        
                        <?php } else{?>
                            <a href="login/login.php" class="add-cart">
                            <svg data-name="icons/tabler/cart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                <rect data-name="Icons/Tabler/Cart background" width="16" height="16" fill="none"/>
                                <path d="M8.753,13.995A2.006,2.006,0,1,1,10.759,16,2.008,2.008,0,0,1,8.753,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,9.847,13.995Zm-6.929,0A2.006,2.006,0,1,1,4.924,16,2.008,2.008,0,0,1,2.918,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,4.012,13.995ZM10.9,11.309l-.142,0H5.684c-.052,0-.1,0-.157,0A2.723,2.723,0,0,1,3,9.616l-.052-.136-.023-.092L2.1,4.434l-.013-.028a.5.5,0,0,1-.038-.139l-.005-.074a.512.512,0,0,1,.005-.075L1.542,1.094H.547A.548.548,0,0,1,.005.621L0,.547A.548.548,0,0,1,.473.005L.547,0H2.006a.544.544,0,0,1,.52.38l.019.077.531,3.19h10.6a.547.547,0,0,1,.547.549l-.006.076-.729,5.1-.025.1a2.721,2.721,0,0,1-2.554,1.829Zm-.111-1.1.095,0a1.64,1.64,0,0,0,1.5-.977l.03-.077.632-4.419H3.259l.735,4.412.033.085a1.643,1.643,0,0,0,1.491.977l.133,0Z" transform="translate(1)" fill="#1e1e1e"/>
                                
                            </svg>
                            </a>
                            <a href="login/login.php" class="add-wishlist"><i class="fa-sharp fa-regular fa-heart"></i></a>

                        <?php }?>
                <?php } ?>
              </div>
            
                <figcaption class="pt-3">
                        <h4 class="mb-sm-3 title-box m-3">
                        <a href="add_to_cart.php?id=<?=$product['id']?>"><?=$product['name']?></a>
                        </h4>
                        <?php if($product['weight']>0){?>
                            <span class="h5 m-3">
                                <?=$product['price']?> Tk
                            </span>

                        <?php }else{?>
                            <strike><?=$product['price']?> Tk</strike> Out of Stock
                        <?php } ?>
                </figcaption>
            </div>
            </figure>
            </div>
        <?php }?>

    
    </div>
    
</div>

<?php
include 'page_includes/index_footer.php'
?>

<script>
    $(document).ready(function(){
    $('#getName').on("keyup", function(){
        var getName = $(this).val();
        
        $.ajax({
        method:'POST',
        url:'search.php',
        data:{name:getName},
        success:function(response)
        {
            $("#sadia").html(response);
        } 
        });
    });
    });
</script>