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

?>

<!-- Main Content -->
 <?php if($data){ ?>
  <div class="px-0">
    <div class="container-fluid pt-2 pt-lg-3 pb-md-3">
      <div class="row">
        <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
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
          </div>
        </div>
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
        <!-- <div class="col-sm-6 col-md-12 col-xl-6 col-xxl-3">
          <div class="card mb-4 rounded-12 shadow-dark-80">
            <div class="card-body p-3 p-xl-3 p-xxl-4">
              <div class="row align-items-center">
                <div class="col">
                  <span class="small text-gray-600 d-block mb-1">This week</span>
                  <span class="h5 mb-0">Progress</span>
                </div>
                <div class="col-auto">
                  <div id="MuseColumnsChartOne" style="width: 105px;height: 50px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <!-- <div class="row">
        <div class="col-12 col-xl-8 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="card-body px-3 px-md-4">
              <div class="d-flex align-items-center border-bottom border-gray-200 pb-3 mb-2">
                <h6 class="card-header-title mb-0">Breakdown</h6>
                <div class="ms-auto">
                  <select class="form-select form-select-sm">
                    <option>Today</option>
                  </select>
                </div>
              </div>
              <div id="MuseMultipleColumnsChartOne"></div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4 mb-4">
          <div class="card h-100 rounded-12 shadow-dark-80">
            <div class="card-body px-3 px-md-4">
              <div class="d-flex align-items-center border-bottom border-gray-200 pb-3 mb-2">
                <h6 class="card-header-title mb-0">Refferals</h6>
                <div class="ms-auto">
                  <select class="form-select form-select-sm">
                    <option>Today</option>
                  </select>
                </div>
              </div>
              <div class="d-flex justify-content-center mt-4">
                <div id="MusePieChartOne" style="height: 380px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <div class="row">
        <div class="col-12 col-xl-4 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="p-3 p-md-4 border-bottom border-gray-200">
              <h6 class="mb-0 ">Projects</h6>
            </div>
            <div class="card-body pb-2 pt-0">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar30.png" alt="Avatars">
                        <span class="avatar-status avatar-success">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Amarachi Nkechi</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 3hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="../assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar31.png" alt="Avatars">
                        <span class="avatar-status avatar-warning">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Lara Madrigal</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 4hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="../assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar32.png" alt="Avatars">
                        <span class="avatar-status avatar-danger">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Ray Cooper</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 4hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="../assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar33.png" alt="Avatars">
                        <span class="avatar-status avatar-offline">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Linzell Bowman</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated 4hr ago</p>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown">
                        <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <img class="avatar-img" src="../assets/svg/icons/dots1.svg" alt="Avatars">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a href="#!" class="dropdown-item">
                            Action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Another action
                          </a>
                          <a href="#!" class="dropdown-item">
                            Something else here
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-8 mb-4">
          <div class="card rounded-12 shadow-dark-80 h-100">
            <div class="card-body px-3 px-md-4">
              <div class="d-flex align-items-center pb-3">
                <h6 class="card-header-title mb-0">Map</h6>
                <div class="ms-auto">
                  <select class="form-select form-select-sm">
                    <option>Today</option>
                  </select>
                </div>
              </div>
              <div id="MuseMapChart" style="height: 300px;"></div>
            </div>
          </div>
        </div>
      </div> -->
      <?php if(isset($_SESSION['login_done']) and $_SESSION['login_done']==1){ ?>

      <div class="row">
        <div class="col-12 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="d-flex align-items-center px-4 py-3">
              <h6 class="card-header-title mb-0">Recent 5 Orders</h6>
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
                  <td>


                  </td>
                  </tr>
                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <!-- <div class="row">
        <div class="col-12 col-xl-5 mb-4">
          <div class="card rounded-12 shadow-dark-80">
            <div class="px-3 px-md-4 py-3 border-bottom border-gray-200 d-flex align-items-center">
              <h6 class="mb-0 py-1">Activity</h6>
              <a href="#" class="py-1 tiny font-weight-semibold ms-auto btn btn-link link-primary">View all<svg class="ms-1" data-name="icons/tabler/chevron right" xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 16 16">
                <rect data-name="Icons/Tabler/Chevron Right background" width="16" height="16" fill="none"></rect>
                <path d="M.26.26A.889.889,0,0,1,1.418.174l.1.086L8.629,7.371a.889.889,0,0,1,.086,1.157l-.086.1L1.517,15.74A.889.889,0,0,1,.174,14.582l.086-.1L6.743,8,.26,1.517A.889.889,0,0,1,.174.36Z" transform="translate(4)" fill="#0D6EFD"></path>
              </svg></a>
            </div>
            <div class="card-body px-3 px-md-4 pb-2 pt-0">
              <div class="list-group list-group-flush my-n3">
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar30.png" alt="Avatars">
                        <span class="avatar-status avatar-success">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Amarachi Nkechi</a>
                      </h6>
                      <p class="card-text small text-gray-600">Uploaded Team.zip file on shared cloud</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">Just now</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar31.png" alt="Avatars">
                        <span class="avatar-status avatar-warning">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Lara Madrigal</a>
                      </h6>
                      <p class="card-text small text-gray-600">Shared a new blog post Design Systems</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">3m ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar32.png" alt="Avatars">
                        <span class="avatar-status avatar-danger">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Ray Cooper</a>
                      </h6>
                      <p class="card-text small text-gray-600">Changed his profile photo</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">1 hour ago</small>
                    </div>
                  </div>
                </div>
                <div class="list-group-item">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="avatar avatar-circle avatar-border">
                        <img class="avatar-img" src="../assets/img/dashboard/avatar33.png" alt="Avatars">
                        <span class="avatar-status avatar-offline">&nbsp;</span>
                      </span>
                    </div>
                    <div class="col ps-0">
                      <h6 class="mb-1">
                        <a href="#">Linzell Bowman</a>
                      </h6>
                      <p class="card-text small text-gray-600">Updated his stastus to Available</p>
                    </div>
                    <div class="col-auto">
                      <small class="text-gray-600">2 days ago</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-7 mb-4">
          <div class="card h-100 rounded-12 shadow-dark-80">
            <div class="px-3 px-md-4 py-3 border-bottom border-gray-200 d-flex align-items-center">
              <h6 class="mb-0 py-1">Checklist</h6>
              <div class="ms-auto">
                <select class="form-select form-select-sm">
                  <option>Today</option>
                </select>
              </div>
            </div>
            <div class="card-body px-3 px-md-4">
              <div class="check-list">
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label ms-2" for="flexCheckDefault">
                    Work on new kit style guide and intro
                  </label>
                </div>
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                  <label class="form-check-label ms-2" for="flexCheckDefault1">
                    Download all file assets for Sketch and Figma
                  </label>
                </div>
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                  <label class="form-check-label ms-2" for="flexCheckDefault2">
                    Upgrade network and fix latency issues
                  </label>
                </div>
                <div class="form-check mb-3 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                  <label class="form-check-label ms-2" for="flexCheckDefault3">
                    Organize and plan next week work
                  </label>
                </div>
                <div class="form-check mb-2 pt-1">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                  <label class="form-check-label ms-2" for="flexCheckDefault4">
                    Launch müse Bootstrap 5 template
                  </label>
                </div>
              </div>
            </div>
            <div class="row g-0 align-items-center checklist-box px-4 py-3 border-top border-gray-200">
              <div class="col">
                <textarea class="form-control py-0" rows="1" placeholder="Add new item..."></textarea>
              </div>
              <div class="col-auto">
                <button class="btn btn-sm btn-primary text-uppercase rounded">Add Item</button>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
  <?php } else {?>
    <div class="container">
       <h5>Compelete your profile to access dashboard</h5>
    </div>
  <?php } ?>
</div>

<?php 
include('../page_includes/dashboard_footer.php')
?>
