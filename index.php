<?php
session_start();
include('page_includes/index_header.php');
include 'db.php';
// products;
$product_select='SELECT p.id as id,p.image as image,p.name as name,p.price as price,i.weight as weight FROM product p,inventory i WHERE i.product_id=p.id and p.status=1';
$products=mysqli_query($dbconnect,$product_select);
//categories
$category_select='SELECT * FROM category';
$categorys=mysqli_query($dbconnect,$category_select);
// New arrivals
$new_arrival_products='SELECT p.id as id,p.image as image,p.name as name,p.price as price,i.weight as weight FROM product p,inventory i WHERE (i.product_id=p.id and p.status=1) ORDER BY p.created_at DESC LIMIT 5';
$new_products=mysqli_query($dbconnect,$new_arrival_products);
// Highest Grossing Proudct
$highest_grossing_product_query='SELECT p.id as product_id,p.image as product_image,p.name as product_name,p.price as product_price ,p.description as p_description,i.weight as weight, count(p.id) as num_of_orders From product p,orders o,inventory i WHERE i.product_id = p.id and o.product_id = p.id GROUP BY p.id ORDER BY num_of_orders DESC LIMIT 1';
$highest_grossing_product_query_result=mysqli_query($dbconnect,$highest_grossing_product_query);
$highest_grossing_product=mysqli_fetch_assoc($highest_grossing_product_query_result);
?>

<div class="container">
  <!-- Muse Section, Pb 0 -->

<section class="muse-section pb-0">
    <div class="row">
        <div class="col-lg-6 order-lg-2 text-lg-end mt-auto" data-aos="fade-up" data-aos-delay="100">
            <img src="images/web/Banner.png" class="img-fluid" alt="Banner">
        </div>
        <div class="col-lg-6 mt-4 mb-2 my-lg-0">
           
            <h1 class="display-4 mt-2 mt-5 text-success">RenewBiz</h1>
            <p class="big mt-1 lh-lg"> An eco-friendly digital marketplace akin to e-commerce that facilitates connections between entrepreneurs .</p>
          
         
            </div>
        </div>
    </div>
</section>
</div>

<div class="bg-white">
  <div class="container">

    <!-- Muse Section, Muse Brands -->
    <!--  -->
    
    <!-- Muse Section -->
    <section class="muse-section">
      <div class="swiper-container swiper-list">
        <h3 class="text-uppercase pb-3 pb-md-5">Products</h3>
        <div class="mb-3" style="align-content: flex-start;">
          <a href="view_all.php" class="btn btn-link link-dark">View all</a>
        </div>
        <div class="swiper-wrapper">
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
            
          
  
              
                <?php }?>

                 
       
              </div>
              <figcaption class="pt-3">
                <h4 class="mb-sm-3 title-box">
                <a href="add_to_cart.php?id=<?=$product['id']?>"><?=$product['name']?>
                </a>
                </h4>
                <?php if($product['weight']>0){?>
                <span class="h5">
                  <?=$product['price']?> Tk
                </span>

                <?php }else{?>
                   <strike><?=$product['price']?> Tk</strike> Out of Stock

                <?php } ?>
                
              </figcaption>
            </figure>
              </div>
          <?php }?>
        
 
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </section>
    
    <!-- Muse Section -->
    <?php if($highest_grossing_product) {?>
    <section class="muse-section">
      <h3 class="text-uppercase pb-3 pb-md-5">Top Pick</h3>
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="swiper-container swiper-navication">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="images/product/<?=$highest_grossing_product['product_image']?>" class="w-100" alt="img">
              </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
        <div class="col-lg-5 my-4" data-aos="fade-up" data-aos-delay="100">
          <p class="star-icon mb-2"><span class="rounded-pill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16.416 15.6">
            <path d="M17.076,19.2,12,16.14,6.924,19.2l1.344-5.772L3.792,9.546l5.9-.5L12,3.6l2.3,5.442,5.9.5-4.476,3.882Z" transform="translate(-3.792 -3.6)" fill="#ffffff"/>
            <?php 
                  $product_id=$highest_grossing_product['product_id'];
                  $avg_query= "SELECT avg(rating) as avg_rating FROM buyer_feedback WHERE product_id='$product_id'";
                  $avg_rating_query_result=mysqli_query($dbconnect,$avg_query);
                  $avg_rating=mysqli_fetch_assoc($avg_rating_query_result)['avg_rating'];
                    if($avg_rating == NULL){
                      $avg_rating=0;

                    }
            ?>
          </svg></span> <?=round($avg_rating,3)?></p>
          <h2 class="h1 text-uppercase mb-0"><a href="add_to_cart.php?id=<?=$highest_grossing_product['product_id']?>"><?=$highest_grossing_product['product_name']?></a></h2>
          <p class="big lh-lg"><?=$highest_grossing_product['p_description']?>.</p>

          <?php if($highest_grossing_product['weight']>0){?>
                       <p class="h3 mt-4"><?=$highest_grossing_product['product_price']?> Taka</p>
                <?php }else{?>
                  <p class="h3 mt-4"><strike><?=$highest_grossing_product['price']?> Taka</strike> Out of Stock </p>

                <?php } ?>

                <?php if($highest_grossing_product['weight']>0){  ?>
                  <?php if(isset($_SESSION['login_done']) and ($_SESSION['login_done']==1)){?>
                    <div class="mt-2">
                      <a href="" class="btn btn-xl btn-dark text-uppercase me-2 px-5"><span class="px-md-5">Add to Cart</span></a>
                    </div>
                  <?php } elseif(isset($_SESSION['login_done']) and ($_SESSION['login_done']==2)){?>
                    <div class="d-flex justify-content-center mt-2">
                        <a href="cart/cart_post.php?id=<?=$product_id?>" class="btn btn-xl btn-dark font-weight-semibold text-uppercase me-2 px-3"><span class="px-md-5">Add to Cart</span></a>
                          <a href="cart/wishlist_post.php?id=<?=$product_id?>" class="btn btn-xl btn-warning font-weight-semibold text-uppercase me-2 px-5" title="Add to Wishlist">
                          <i class="fa-sharp fa-regular fa-heart"></i>
                       </a>
                     </div>
                  <?php } else{?>
                    <div class="mt-2">
                        <a href="login/login.php" class="btn btn-xl btn-dark text-uppercase me-2 px-5"><span  class="px-md-5">Add to Cart</span></a>
                    </div>
                 <?php }?>
               <?php } ?>
        </div>
      </div>
    </section>
    <?php }?>
    <!-- Muse Section -->
    <section class="muse-section">
      <div class="row">
        <div class="col-md-7">
          <h3 class="text-uppercase pb-md-4">POPULAR CATEGORIES</h3>
        </div>
       
      </div>
      <div class="row">
        <?php foreach($categorys as $category){ ?>
        <div class="col-6 col-lg-3 mt-1" data-aos="fade-up" data-aos-delay="100">
          <figure class="card border-0 transition-3d-hover mb-0 mb-md-3">
            <a href="category_filter.php?id=<?=$category['id']?>"><img src="images/category/<?=$category['image']?>" class="rounded-6 w-100" alt="img"></a>
            <figcaption class="pt-3 pb-4">
              <h5 class="mb-0 mb-md-3 title-box"><a href="category_filter.php?id=<?=$category['id']?>"><?=$category['name']?></a></h5>
            </figcaption>
          </figure>
        </div>
        <?php } ?>
      </div>
    </section>
    
    <!-- Muse Section -->
    <section class="muse-section">
      <div class="swiper-container swiper-list2">
        <h3 class="text-uppercase pb-3 pb-md-5">New Arrivals</h3>
        <div class="swiper-wrapper">
          <?php foreach($new_products as $new) {?>

            <?php 
                  $product_id=$new['id'];
                  $avg_query= "SELECT avg(rating) as avg_rating FROM buyer_feedback WHERE product_id='$product_id'";
                  $avg_rating_query_result=mysqli_query($dbconnect,$avg_query);
                  $avg_rating=mysqli_fetch_assoc($avg_rating_query_result)['avg_rating'];
                    if($avg_rating == NULL){
                      $avg_rating=0;

                    }
            ?>
          <div class="swiper-slide">
            <figure class="card border-0 transition-3d-hover">
              <div class="rounded-6 bg-light-100 px-4 pt-4 pb-5 position-relative">
                <a href="add_to_cart.php?id=<?=$product['id']?>" class="py-2 muse-animation has-height"><img src="images/product/<?=$new['image']?>" alt="img"></a>
                <?php if(isset($_SESSION['login_done']) and ($_SESSION['login_done']==1)){?>
                  <a href="#" class="add-cart">
                  <svg data-name="icons/tabler/cart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                    <rect data-name="Icons/Tabler/Cart background" width="16" height="16" fill="none"></rect>
                    <path d="M8.753,13.995A2.006,2.006,0,1,1,10.759,16,2.008,2.008,0,0,1,8.753,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,9.847,13.995Zm-6.929,0A2.006,2.006,0,1,1,4.924,16,2.008,2.008,0,0,1,2.918,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,4.012,13.995ZM10.9,11.309l-.142,0H5.684c-.052,0-.1,0-.157,0A2.723,2.723,0,0,1,3,9.616l-.052-.136-.023-.092L2.1,4.434l-.013-.028a.5.5,0,0,1-.038-.139l-.005-.074a.512.512,0,0,1,.005-.075L1.542,1.094H.547A.548.548,0,0,1,.005.621L0,.547A.548.548,0,0,1,.473.005L.547,0H2.006a.544.544,0,0,1,.52.38l.019.077.531,3.19h10.6a.547.547,0,0,1,.547.549l-.006.076-.729,5.1-.025.1a2.721,2.721,0,0,1-2.554,1.829Zm-.111-1.1.095,0a1.64,1.64,0,0,0,1.5-.977l.03-.077.632-4.419H3.259l.735,4.412.033.085a1.643,1.643,0,0,0,1.491.977l.133,0Z" transform="translate(1)" fill="#1e1e1e"></path>
                  </svg>
                </a>
                <a href="cart/wishlist_post.php?id=<?=$new['id']?>" class="add-wishlist"><i class="fa-sharp fa-regular fa-heart"></i></a>

                <?php } elseif(isset($_SESSION['login_done']) and ($_SESSION['login_done']==2)){?>
                  <a href="cart/cart_post.php?id=<?=$new['id']?>" class="add-cart">
                  <svg data-name="icons/tabler/cart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                    <rect data-name="Icons/Tabler/Cart background" width="16" height="16" fill="none"></rect>
                    <path d="M8.753,13.995A2.006,2.006,0,1,1,10.759,16,2.008,2.008,0,0,1,8.753,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,9.847,13.995Zm-6.929,0A2.006,2.006,0,1,1,4.924,16,2.008,2.008,0,0,1,2.918,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,4.012,13.995ZM10.9,11.309l-.142,0H5.684c-.052,0-.1,0-.157,0A2.723,2.723,0,0,1,3,9.616l-.052-.136-.023-.092L2.1,4.434l-.013-.028a.5.5,0,0,1-.038-.139l-.005-.074a.512.512,0,0,1,.005-.075L1.542,1.094H.547A.548.548,0,0,1,.005.621L0,.547A.548.548,0,0,1,.473.005L.547,0H2.006a.544.544,0,0,1,.52.38l.019.077.531,3.19h10.6a.547.547,0,0,1,.547.549l-.006.076-.729,5.1-.025.1a2.721,2.721,0,0,1-2.554,1.829Zm-.111-1.1.095,0a1.64,1.64,0,0,0,1.5-.977l.03-.077.632-4.419H3.259l.735,4.412.033.085a1.643,1.643,0,0,0,1.491.977l.133,0Z" transform="translate(1)" fill="#1e1e1e"></path>
                  </svg>
                </a>
                
                <a href="cart/wishlist_post.php?id=<?=$new['id']?>" class="add-wishlist"><i class="fa-sharp fa-regular fa-heart"></i></a>

                <?php } else{?>
                  <a href="login/login.php" class="add-cart">
                  <svg data-name="icons/tabler/cart" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                    <rect data-name="Icons/Tabler/Cart background" width="16" height="16" fill="none"></rect>
                    <path d="M8.753,13.995A2.006,2.006,0,1,1,10.759,16,2.008,2.008,0,0,1,8.753,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,9.847,13.995Zm-6.929,0A2.006,2.006,0,1,1,4.924,16,2.008,2.008,0,0,1,2.918,13.995Zm1.094,0a.912.912,0,1,0,.912-.912A.913.913,0,0,0,4.012,13.995ZM10.9,11.309l-.142,0H5.684c-.052,0-.1,0-.157,0A2.723,2.723,0,0,1,3,9.616l-.052-.136-.023-.092L2.1,4.434l-.013-.028a.5.5,0,0,1-.038-.139l-.005-.074a.512.512,0,0,1,.005-.075L1.542,1.094H.547A.548.548,0,0,1,.005.621L0,.547A.548.548,0,0,1,.473.005L.547,0H2.006a.544.544,0,0,1,.52.38l.019.077.531,3.19h10.6a.547.547,0,0,1,.547.549l-.006.076-.729,5.1-.025.1a2.721,2.721,0,0,1-2.554,1.829Zm-.111-1.1.095,0a1.64,1.64,0,0,0,1.5-.977l.03-.077.632-4.419H3.259l.735,4.412.033.085a1.643,1.643,0,0,0,1.491.977l.133,0Z" transform="translate(1)" fill="#1e1e1e"></path>
                  </svg>
                </a>
                <a href="login/login.php" class="add-wishlist"><i class="fa-sharp fa-regular fa-heart"></i></a>

                <?php }?>
               
              </div>
              <figcaption class="pt-3">
                <div class="mb-2"><small class="star-icon big d-inline-flex align-items-center"><span class="rounded-pill me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16.416 15.6">
                  <path d="M17.076,19.2,12,16.14,6.924,19.2l1.344-5.772L3.792,9.546l5.9-.5L12,3.6l2.3,5.442,5.9.5-4.476,3.882Z" transform="translate(-3.792 -3.6)" fill="#ffffff"/>
                </svg></span> <?=$avg_rating?></small></div>
                <h5 class="mb-2 title-box"><a href="add_to_cart.php?id=<?=$product_id?>"><?=$new['name']?></a></h5>
                <?php if($new['weight']>0){?>
                <span class="h5">
                  <?=$new['price']?> Tk
                </span>

                <?php }else{?>
                   <strike><?=$new['price']?> Tk</strike> Out of Stock

                <?php } ?>
              </figcaption>
            </figure>
          </div>
          <?php } ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </section>
    
    <!-- Muse Section, Perfection Section -->
    <section class="muse-section perfection-section">
      <div class="row g-0 border-top">
        <div class="col-lg-12 col-xl-4 py-md-5 border-bottom">
          <h2 class="mb-2">COMMITTED TO SUSTAINABILITY</h2>
          <p class="lh-lg pe-lg-5 me-xl-2">At RenewBiz, we are committed to sustainability and denounce with righteous indignation any practices that harm the environment.</p>
        </div>
        <div class="col-md-6 col-xl-4 border-start border-end border-bottom">
          <ul class="perfection-list">
            <li>
              <div>
                <span class="bg-success circle circle-lg">
                  <svg data-name="icons/tabler/notification" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                    <rect data-name="Icons/Tabler/Notification background" width="16" height="16" fill="none"></rect>
                    <path d="M4.108,13.087l0-.164v-.205H.617a.616.616,0,0,1-.3-1.151,2.668,2.668,0,0,0,1.3-1.773l.024-.153V7.151A6.328,6.328,0,0,1,4.861,1.915l.1-.053,0-.012A2.246,2.246,0,0,1,7.043,0L7.18,0A2.252,2.252,0,0,1,9.372,1.715l.03.147.1.053a6.371,6.371,0,0,1,3.2,5.027l.015.237,0,2.388a2.677,2.677,0,0,0,1.334,2,.616.616,0,0,1-.22,1.146l-.084.005H10.257v.205a3.077,3.077,0,0,1-6.15.164Zm1.227-.164a1.846,1.846,0,0,0,3.688.126l0-.126v-.205H5.334ZM6.161,2.152l-.008.158,0,.03-.016.08L6.107,2.5l-.036.071L6.047,2.6,6,2.667l-.024.025-.033.031-.066.049-.073.04A5.131,5.131,0,0,0,2.887,6.973l-.014.206,0,2.535a3.917,3.917,0,0,1-.626,1.694l-.056.079h9.991l0-.008a4,4,0,0,1-.655-1.634l-.029-.2V7.208a5.116,5.116,0,0,0-2.93-4.4.613.613,0,0,1-.346-.468l-.006-.088a1.026,1.026,0,0,0-2.046-.1Z" transform="translate(1)" fill="#ffffff"></path>
                  </svg>                        
                </span>
              </div>
              <div class="perfection-right">
                <h6 class="mb-2">ECO-FRIENDLY SHIPPING</h6>
                <p class="small lh-lg text-gray-600 mb-1">RenewBiz ships fast, eco-friendly, minimizing environmental impact with carbon reduction.</p>
              </div>
            </li>
            <li>
              <div>
                <span class="bg-success circle circle-lg">
                  <svg data-name="icons/tabler/notification" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                    <rect data-name="Icons/Tabler/Notification background" width="16" height="16" fill="none"></rect>
                    <path d="M4.108,13.087l0-.164v-.205H.617a.616.616,0,0,1-.3-1.151,2.668,2.668,0,0,0,1.3-1.773l.024-.153V7.151A6.328,6.328,0,0,1,4.861,1.915l.1-.053,0-.012A2.246,2.246,0,0,1,7.043,0L7.18,0A2.252,2.252,0,0,1,9.372,1.715l.03.147.1.053a6.371,6.371,0,0,1,3.2,5.027l.015.237,0,2.388a2.677,2.677,0,0,0,1.334,2,.616.616,0,0,1-.22,1.146l-.084.005H10.257v.205a3.077,3.077,0,0,1-6.15.164Zm1.227-.164a1.846,1.846,0,0,0,3.688.126l0-.126v-.205H5.334ZM6.161,2.152l-.008.158,0,.03-.016.08L6.107,2.5l-.036.071L6.047,2.6,6,2.667l-.024.025-.033.031-.066.049-.073.04A5.131,5.131,0,0,0,2.887,6.973l-.014.206,0,2.535a3.917,3.917,0,0,1-.626,1.694l-.056.079h9.991l0-.008a4,4,0,0,1-.655-1.634l-.029-.2V7.208a5.116,5.116,0,0,0-2.93-4.4.613.613,0,0,1-.346-.468l-.006-.088a1.026,1.026,0,0,0-2.046-.1Z" transform="translate(1)" fill="#ffffff"></path>
                  </svg>                        
                </span>
              </div>
              <div class="perfection-right">
                <h6 class="mb-2">30 DAY MONEY BACK</h6>
                <p class="small lh-lg text-gray-600 mb-1">RenewBiz offers 30-day returns, promoting sustainability with hassle-free options.</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-6 col-xl-4 border-bottom">
          <ul class="perfection-list">
            <li>
              <div>
                <span class="bg-success circle circle-lg">
                  <svg data-name="icons/tabler/notification" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                    <rect data-name="Icons/Tabler/Notification background" width="16" height="16" fill="none"></rect>
                    <path d="M4.108,13.087l0-.164v-.205H.617a.616.616,0,0,1-.3-1.151,2.668,2.668,0,0,0,1.3-1.773l.024-.153V7.151A6.328,6.328,0,0,1,4.861,1.915l.1-.053,0-.012A2.246,2.246,0,0,1,7.043,0L7.18,0A2.252,2.252,0,0,1,9.372,1.715l.03.147.1.053a6.371,6.371,0,0,1,3.2,5.027l.015.237,0,2.388a2.677,2.677,0,0,0,1.334,2,.616.616,0,0,1-.22,1.146l-.084.005H10.257v.205a3.077,3.077,0,0,1-6.15.164Zm1.227-.164a1.846,1.846,0,0,0,3.688.126l0-.126v-.205H5.334ZM6.161,2.152l-.008.158,0,.03-.016.08L6.107,2.5l-.036.071L6.047,2.6,6,2.667l-.024.025-.033.031-.066.049-.073.04A5.131,5.131,0,0,0,2.887,6.973l-.014.206,0,2.535a3.917,3.917,0,0,1-.626,1.694l-.056.079h9.991l0-.008a4,4,0,0,1-.655-1.634l-.029-.2V7.208a5.116,5.116,0,0,0-2.93-4.4.613.613,0,0,1-.346-.468l-.006-.088a1.026,1.026,0,0,0-2.046-.1Z" transform="translate(1)" fill="#ffffff"></path>
                  </svg>                        
                </span>
              </div>
              <div class="perfection-right">
                <h6 class="mb-2">24/7 GREEN SUPPORT</h6>
                <p class="small lh-lg text-gray-600 mb-1">RenewBiz provides 24/7 eco-support, prioritizing sustainability in customer assistance.</p>
              </div>
            </li>
            <li>
              <div>
                <span class="bg-success circle circle-lg">
                  <svg data-name="icons/tabler/notification" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                    <rect data-name="Icons/Tabler/Notification background" width="16" height="16" fill="none"></rect>
                    <path d="M4.108,13.087l0-.164v-.205H.617a.616.616,0,0,1-.3-1.151,2.668,2.668,0,0,0,1.3-1.773l.024-.153V7.151A6.328,6.328,0,0,1,4.861,1.915l.1-.053,0-.012A2.246,2.246,0,0,1,7.043,0L7.18,0A2.252,2.252,0,0,1,9.372,1.715l.03.147.1.053a6.371,6.371,0,0,1,3.2,5.027l.015.237,0,2.388a2.677,2.677,0,0,0,1.334,2,.616.616,0,0,1-.22,1.146l-.084.005H10.257v.205a3.077,3.077,0,0,1-6.15.164Zm1.227-.164a1.846,1.846,0,0,0,3.688.126l0-.126v-.205H5.334ZM6.161,2.152l-.008.158,0,.03-.016.08L6.107,2.5l-.036.071L6.047,2.6,6,2.667l-.024.025-.033.031-.066.049-.073.04A5.131,5.131,0,0,0,2.887,6.973l-.014.206,0,2.535a3.917,3.917,0,0,1-.626,1.694l-.056.079h9.991l0-.008a4,4,0,0,1-.655-1.634l-.029-.2V7.208a5.116,5.116,0,0,0-2.93-4.4.613.613,0,0,1-.346-.468l-.006-.088a1.026,1.026,0,0,0-2.046-.1Z" transform="translate(1)" fill="#ffffff"></path>
                  </svg>                        
                </span>
              </div>
              <div class="perfection-right">
                <h6 class="mb-2">ZERO FRAUD TOLERANCE</h6>
                <p class="small lh-lg text-gray-600 mb-1">
                   RenewBiz ensures zero fraud, offering free eco-friendly returns.</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="row pt-4">
        <div class="col-xl-7">
          <p class="small text-start text-gray-600 lh-lg mb-0">This order process is provided by Brand name, who handle all payment services, invoicing and download links. Need more information? You can always reach us at <a href="mailto:support@email.com" class="text-gray-600">renewsupport@justmail.com</a></p>
        </div>
      </div>
    </section>

    <!-- Muse Section -->
    <section class="muse-section" data-aos="fade-up" data-aos-delay="100">
      <div class="bg-gray-100 position-relative overflow-hidden rounded-12 mb-4 mb-md-0">
        <div class="row align-items-center">
          <div class="col-xl-6 col-md-7">
            <div class="p-4 p-lg-5 m-sm-2">
              <h2 class="h1 text-uppercase mb-0">Subscribe !</h2>
              <p class="fs-20 text-black-600 lh-lg">Best deals directly to your inbox</p>
              <form class="mt-sm-4 signup-form">
                <div class="input-group input-group-xl">
                  <input type="text" class="form-control" placeholder="Email address" aria-label="Email" aria-describedby="button-addon2">
                  <button class="btn btn-xl btn-success text-uppercase caption px-3" type="button" id="button-addon2">Sign up</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-xl-6 col-md-5 mt-auto">
            <div class="text-center mx-3 mx-md-0 pt-4 pt-md-5 mt-lg-3">
              <img src="assets/img/templates/mail-box.svg" class="img-fluid" alt="img">
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</div>

<?php
include('page_includes/index_footer.php');



?>
