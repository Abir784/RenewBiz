<?php
$page='Order Details';
include '../session_check.php';
include '../db.php';
include '../page_includes/dashboard_header.php';
$order_id=$_GET['id'];
$select_join_order_buyer_product="SELECT b.name as buyer_name ,p.name as product_name ,o.weight as quantity,b.address as delivery_address,p.name as product_name, p.price as product_price, p.image as product_image,o.total_price as total_price ,o.status as order_status FROM orders o ,product p, buyer b WHERE o.id='$order_id' and p.id=o.product_id and o.user_id = b.user_id";
$select_join_order_buyer_product_result=mysqli_query($dbconnect,$select_join_order_buyer_product);
$buyer_order_product_details=mysqli_fetch_assoc($select_join_order_buyer_product_result);


?>

<style>
.order-details-container {
    display: flex;
}

.order-details-container.column {
    flex-basis: 50%;
}

.order-details-container.column.left {
    padding-right: 20px;
}

.btn-accept-decline {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    margin-left: 400px;
    
}

</style>

<div class="container order-details-container align-center">
    <div class="column left">
        <h4>Order id: #<?=$order_id?></h4>
        <br>
        <h5>Buyer Details</h5>
        <div style="display: flex; align-items: center;">
            <div>
                <p><strong>Name:</strong> <?=$buyer_order_product_details['buyer_name']?></p>
                <p><strong>Address:</strong> <?=$buyer_order_product_details['delivery_address']?></p>
            </div>
        </div>

        <h5>Product Details</h5>
        <table class="table table-unbordered">
            <tbody>
                <tr>
                    <td>
                      <img src="../images/product/<?=$buyer_order_product_details['product_image']?>" width="180" height="80" style="50%; margin-right: 20px;">
                        <p><strong>Product Name:</strong> <?=$buyer_order_product_details['product_name']?></p>
                        <p><strong>Quantity: </strong><?=$buyer_order_product_details['quantity']?></p>
                        <p><strong>Price: </strong> <?=$buyer_order_product_details['product_price']?></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p><strong>Grand Total:</strong> <?=$buyer_order_product_details['total_price']?> Taka</p>
    </div>
    <div class="column right">
        Order Status:
        <?php if($buyer_order_product_details['order_status'] == 0){?>
        <b class="text-primary">Pending</b>
        <?php } elseif($buyer_order_product_details['order_status'] == 1) { ?>
          <b class="text-secondary">Accepted and Ready to Deliver</b>
        <?php } elseif($buyer_order_product_details['order_status'] == 2){?>
            <b class="text-success">Delivered</b>

        <?php } else {?>
            <b class="text-danger">Declined</b>
        <?php }?>
    </div>
    <div class="btn-accept-decline">
        <form action="order_status_change.php" method="post">
            <input type="hidden"  name="order_id" value="<?=$order_id?>">
            <?php if($buyer_order_product_details['order_status']==0){ ?>
            <button type="submit" name="accept" class="btn btn-success mr-3" id="accept-order-btn">Accept</button>
            <button type="submit" name="decline" class="btn btn-danger" id="decline-order-btn">Decline</button>
            <?php } elseif($buyer_order_product_details['order_status']==1){ ?>
            <button type="submit" name="deliver" class="btn btn-success">Deliver</button>
            <?php } ?>
        </form>
    </div>
</div>


<?php

include '../page_includes/dashboard_footer.php';
?>
<?php if(isset($_SESSION['success'])){?>
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
    title: "<?=$_SESSION['success']?>"
    });
</script>
<?php }unset($_SESSION['success'])?>
