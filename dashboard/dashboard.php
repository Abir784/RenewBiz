<?php 
$page="Dashboard";
include('../session_check.php');
require '../db.php';
include('../page_includes/dashboard_header.php');
$user_id=$_SESSION['login_user_id'];
$user_select_query= "SELECT * FROM user WHERE id='$user_id'";
$user_query=mysqli_query($dbconnect,$user_select_query);
$user=mysqli_fetch_assoc($user_query);
// total revenue count (seller)
$join_product_order_table_seller="SELECT sum(o.total_price) as total_sell From product p,orders o WHERE (o.product_id = p.id and p.user_id ='$user_id' and o.status=2);";
$join_product_order_table_seller_result= mysqli_query($dbconnect,$join_product_order_table_seller);
$revenue=mysqli_fetch_assoc($join_product_order_table_seller_result)['total_sell'];
// Average Sell
$join_product_order_table_seller_avg="SELECT avg(o.total_price) as avg_sell From product p,orders o WHERE (o.product_id = p.id and p.user_id ='$user_id' and o.status=2);";
$join_product_order_table_seller_avg_result= mysqli_query($dbconnect,$join_product_order_table_seller_avg);
$avg=mysqli_fetch_assoc($join_product_order_table_seller_avg_result)['avg_sell'];
// Show orders
$join_product_order_table="SELECT o.id as order_id,p.name as product_name, o.created_at as order_date,o.updated_at as delivered_date,o.status as order_status From product p,orders o WHERE (o.product_id = p.id and p.user_id = $user_id) ORDER BY o.created_at DESC LIMIT 5";
$join_product_order_table_result= mysqli_query($dbconnect,$join_product_order_table);
// buyer part - orders count 
$join_product_order_table_buyer="SELECT o.status as status,count(*) as count From product p,orders o WHERE (o.product_id = p.id and o.user_id ='$user_id' and (o.status=0 or o.status=2)) group by o.status";
$join_product_order_table_buyer_result= mysqli_query($dbconnect,$join_product_order_table_buyer);
$pending=0;
$delivered=0;
foreach($join_product_order_table_buyer_result as $order_count){
  if($order_count['status']==0){
    $pending=$order_count['count'];
  }else{
    $delivered = $order_count['count'];
  }
}
//buyers recent orders show 
$join_product_order_buyer_table="SELECT o.id as order_id,p.name as product_name, o.created_at as order_date,o.updated_at as delivered_date,o.status as order_status From product p,orders o WHERE (o.product_id = p.id and o.user_id = $user_id) ORDER BY o.created_at DESC LIMIT 5";
$join_product_order_buyer_table_result= mysqli_query($dbconnect,$join_product_order_buyer_table);

?>

<!-- Main Content -->
 <?php if($data){ ?>
  <div class="px-0">
    <div class="container-fluid pt-2 pt-lg-3 pb-md-3">
      <div class="row">
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <!--For Seller -->
            <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==1){ ?>
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">Total Revenue</span>
                  <span class="h5 mb-0"><?=$revenue?> Taka</span>
                </div>
                <div class="col-auto">
                 <a href="generate_revenue.php?id=<?=$user['id']?>"> <span class="badge badge-success py-2 px-2"><span class="px-1">Download Revenue Report <svg class="ms-1" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 16 16">
                    <g data-name="icons/tabler/trend-up" transform="translate(0)">
                      <rect data-name="Icons/Tabler/Trend background" width="16" height="16" fill="none"/>
                      <path d="M.249,9.315.18,9.256a.616.616,0,0,1-.059-.8L.18,8.385,5.1,3.462A.616.616,0,0,1,5.9,3.4l.068.059L8.821,6.309,13.9,1.231H9.641A.616.616,0,0,1,9.031.7L9.025.616a.617.617,0,0,1,.532-.61L9.641,0h5.728a.614.614,0,0,1,.569.346h0l0,.008,0,.008h0a.613.613,0,0,1,.048.168V.541A.621.621,0,0,1,16,.61V6.359a.616.616,0,0,1-1.226.083l-.005-.083V2.1L9.256,7.615a.616.616,0,0,1-.8.059l-.069-.059L5.539,4.768,1.05,9.256a.615.615,0,0,1-.8.059Z" transform="translate(0 3)" fill="#ffffff"/>
                    </g>
                  </svg>
                  </span>
                </span>
                </a>
                </div>
              </div>
            </div>
            <?php }?>
            <!-- For Buyer-->
            <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==2){ ?>
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">Delivered Orders</span>
                  <span class="h5 mb-0"><?=$delivered?></span>
                </div>
                <div class="col-auto">
                    <g data-name="icons/tabler/trend-up" transform="translate(0)">
                      <rect data-name="Icons/Tabler/Trend background" width="16" height="16" fill="none"/>
                      <path d="M.249,9.315.18,9.256a.616.616,0,0,1-.059-.8L.18,8.385,5.1,3.462A.616.616,0,0,1,5.9,3.4l.068.059L8.821,6.309,13.9,1.231H9.641A.616.616,0,0,1,9.031.7L9.025.616a.617.617,0,0,1,.532-.61L9.641,0h5.728a.614.614,0,0,1,.569.346h0l0,.008,0,.008h0a.613.613,0,0,1,.048.168V.541A.621.621,0,0,1,16,.61V6.359a.616.616,0,0,1-1.226.083l-.005-.083V2.1L9.256,7.615a.616.616,0,0,1-.8.059l-.069-.059L5.539,4.768,1.05,9.256a.615.615,0,0,1-.8.059Z" transform="translate(0 3)" fill="#ffffff"/>
                    </g>
                  </svg>
                  </span>
                </span>
                </a>
                </div>
              </div>
            </div>
            <?php }?>

          </div>
        </div>
            <!-- For seller-->

        <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==1){ ?>
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">Average Sell</span>
                  <span class="h5 mb-0"><?=round($avg,2)?> Taka</span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <?php } ?>
            <!-- For Buyer-->

        <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==2){ ?>
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">Pending Orders</span>
                  <span class="h5 mb-0"><?=$pending?></span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      
      <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==1){ ?>
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="d-flex align-items-center px-4 py-3">
              <h6 class="card-header-title mb-0">Recent Orders</h6>
            </div>
            <div class="table-responsive mb-0">
              <table class="table card-table table-nowrap">
                <thead>
                  <tr>
                   <th>Order Id</th>
                    <th>Product Name</th>
                    <th>Status</th>
                    <th>Order date</th>
                    <th>Delivered date</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php foreach($join_product_order_table_result as $orders){ ?>
                  <tr>
                    <td class="goal-project">
                      <?='#'.$orders['order_id']?>
                    </td>
                    <td class="goal-project">
                      <?=$orders['product_name']?>
                    </td>
                 <?php if($orders['order_status']==0){ ?>
                   <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-offline position-relative me-1 bottom-0 end-0">&nbsp;</span> Pending</td>
                <?php } elseif($orders['order_status'] == 1) {?>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-warning position-relative me-1 bottom-0 end-0">&nbsp;</span> Accepted</td>
                <?php } elseif($orders['order_status'] == 2) {?>
                    <td class="goal-status"> <span class="avatar-status avatar-sm-status avatar-success position-relative me-1 bottom-0 end-0">&nbsp;</span> Delivered</td>
                <?php } else{?>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-danger position-relative me-1 bottom-0 end-0">&nbsp;</span> Declined
                  </td>
                  <?php } ?>
                  <td class="goal-date">
                    <?php
                     echo date_format(date_create($orders['order_date']),'d-M-Y h:i A')
                     ?>
                     </td>
                  <td>
                  <?php
                      if($orders['delivered_date'] == NULL){
                        echo 'NULL';
                      }else{
                        echo date_format(date_create($orders['delivered_date']),'d-M-Y h:i A');
                      }
                     ?>
                  </tr>
                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==2){ ?>
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="d-flex align-items-center px-4 py-3">
              <h6 class="card-header-title mb-0">Recent Orders</h6>
            </div>
            <div class="table-responsive mb-0">
              <table class="table card-table table-nowrap">
                <thead>
                  <tr>
                   <th>Order Id</th>
                    <th>Product Name</th>
                    <th>Status</th>
                    <th>Order date</th>
                    <th>Delivered date</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php foreach($join_product_order_buyer_table_result as $orders){ ?>
                  <tr>
                    <td class="goal-project">
                      <?='#'.$orders['order_id']?>
                    </td>
                    <td class="goal-project">
                      <?=$orders['product_name']?>
                    </td>
                 <?php if($orders['order_status']==0){ ?>
                   <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-offline position-relative me-1 bottom-0 end-0">&nbsp;</span> Pending</td>
                <?php } elseif($orders['order_status'] == 1) {?>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-warning position-relative me-1 bottom-0 end-0">&nbsp;</span> Accepted</td>
                <?php } elseif($orders['order_status'] == 2) {?>
                    <td class="goal-status"> <span class="avatar-status avatar-sm-status avatar-success position-relative me-1 bottom-0 end-0">&nbsp;</span> Delivered</td>
                <?php } else{?>
                    <td class="goal-status"><span class="avatar-status avatar-sm-status avatar-danger position-relative me-1 bottom-0 end-0">&nbsp;</span> Declined
                  </td>
                  <?php } ?>
                  <td class="goal-date">
                    <?php
                     echo date_format(date_create($orders['order_date']),'d-M-Y h:i A')
                     ?>
                     </td>
                  <td>
                  <?php
                      if($orders['delivered_date'] == NULL){
                        echo 'NULL';
                      }else{
                        echo date_format(date_create($orders['delivered_date']),'d-M-Y h:i A');
                      }
                     ?>
                  </tr>
                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
 
    </div>
  </div>
  <?php } else {?>
    <div class="container">
      
       <h5>Complete your profile to access dashboard <a href ="../individual_profile/account-profile.php" class='ml-3'> Click Here To Complete </a></h5>
    </div>
  <?php } ?>
</div>

<?php 
include('../page_includes/dashboard_footer.php')
?>
