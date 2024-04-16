<?php 
include '../session_check.php'; 
include '../db.php'; 
include '../page_includes/dashboard_header.php'; 

$order_id = $_GET['id'];
$select_join_order_buyer_product = "SELECT u.image as buyer_image ,b.business_industry as industry,b.business_name as business_name , b.phone_number as buyer_phone,b.name as buyer_name ,p.name as product_name ,o.weight as quantity,b.address as delivery_address,p.name as product_name, p.price as product_price, p.image as product_image,o.total_price as total_price ,o.status as order_status FROM orders o ,product p, buyer b, user u WHERE o.id='$order_id' and p.id=o.product_id and o.user_id = b.user_id and u.id=b.user_id";
$select_join_order_buyer_product_result = mysqli_query($dbconnect, $select_join_order_buyer_product);
$buyer_order_product_details = mysqli_fetch_assoc($select_join_order_buyer_product_result);
?>
    <style>
        .order-details-container {
            display: flex;
            justify-content: space-between;
        }

        .order-details-container .column {
            flex-basis: 45%;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .order-details-container .column.left {
            margin-right: 20px;
        }

        .order-details-container .column img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .order-details-container .column h5 {
            margin-top: 20px;
        }

        .order-details-container .column p {
            margin-bottom: 10px;
        }

        .order-details-container .column strong {
            font-weight: bold;
        }

        .btn-accept-decline {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="m-3" style="align-content:center; ">
            <h4 style="text-align:center;">Order Id:<?=$order_id?></h4>
        </div>
    </div>
    <div class="container order-details-container">
   
        <div class="column left">
            <h5>Product Details</h5>
            <table class="table table-unbordered">
                <tbody>
                    <tr>
                        <td>
                            <img class="img-fluid mb-3" src="../images/product/<?= $buyer_order_product_details['product_image'] ?>" alt="Product Image">
                            <p><strong>Product Name:</strong> <?= $buyer_order_product_details['product_name'] ?></p>
                            <p><strong>Quantity:</strong> <?= $buyer_order_product_details['quantity'] ?></p>
                            <p><strong>Price:</strong> <?= $buyer_order_product_details['product_price'] ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p><strong>Grand Total:</strong> <?= $buyer_order_product_details['total_price'] ?> Taka</p>


                   <h5>Order Status:</h5>
            <?php if ($buyer_order_product_details['order_status'] == 0) { ?>
                <p><b class="text-primary">Pending</b></p>
            <?php } elseif ($buyer_order_product_details['order_status'] == 1) { ?>
                <p><b class="text-secondary">Accepted and Ready to Deliver</b></p>
            <?php } elseif ($buyer_order_product_details['order_status'] == 2) { ?>
                <p><b class="text-success">Delivered</b></p>
            <?php } else { ?>
                <p><b class="text-danger">Declined</b></p>
            <?php } ?>


            <div class="btn-accept-decline">
                <form action="order_status_change.php" method="post">
                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                    <?php if ($buyer_order_product_details['order_status'] == 0) { ?>
                        <button type="submit" name="accept" class="btn btn-success mr-3" id="accept-order-btn">Accept</button>
                        <button type="submit" name="decline" class="btn btn-danger" id="decline-order-btn">Decline</button>
                    <?php } elseif ($buyer_order_product_details['order_status'] == 1) { ?>
                        <button type="submit" name="deliver" class="btn btn-success">Deliver</button>
                    <?php } ?>
            </form>
            </div>
        </div>
        <div class="column right">
        <h5>Buyer Details</h5>
        <hr>
        <div style="display: flex; align-items: center;">
            <div class="m-3">
                 <img class="img-fluid mb-3" src="../images/user/<?=$buyer_order_product_details['buyer_image']?>" alt="<?=$buyer_order_product_details['buyer_name']?>">
            <div>
                <p class="mb-3"><strong>Name:</strong> <?=$buyer_order_product_details['buyer_name']?></p>
                <p class="mb-3"><strong>Address:</strong> <?=$buyer_order_product_details['delivery_address']?></p>
                <p class="mb-3"><strong>Business Industry:</strong> <?=$buyer_order_product_details['industry']?></p>
                <p class="mb-3"><strong>Business Name:</strong> <?=$buyer_order_product_details['business_name']?></p>
                <p class="mb-3"><strong>Phone Number:</strong> <?=$buyer_order_product_details['buyer_phone']?></p>
            </div>
        </div>

     
        </div>




    </div>

    <?php include '../page_includes/dashboard_footer.php'; ?>

    <?php if (isset($_SESSION['success'])) { ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "<?= $_SESSION['success'] ?>"
            });
        </script>
    <?php } unset($_SESSION['success']) ?>

</body>
</html>