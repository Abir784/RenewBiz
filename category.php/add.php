<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="file"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Add Product</h1>
    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-md-10 col-lg-6 m-auto py-4 py-md-5">
                <div class="text-center pb-4 mb-3">
                    <!--<img src="../assets/img/pages/logo.svg" alt="Muse">-->
                </div>
                
                <?php if(isset($_SESSION['error1'])){ ?>
                <div class="alert alert-danger" ><?=$_SESSION['error1']?></div>
                <?php }unset($_SESSION['error1'])?>
    
                <div class="bg-white rounded-12 shadow-dark-80 py-4 py-md-5 px-md-4 px-3">
                    <h1 class="mb-md-3 mb-0 text-center">Add Product</h1>
                    <form class="p-2" action="add_product.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label form-label-lg">Product ID:</label>
                            <input type="number" class="form-control form-control-lg" name="product_id" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-lg">Product Name:</label>
                            <input type="text" class="form-control form-control-lg" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label form-label-lg">Product Image:</label>
                            <input type="file" class="form-control form-control-lg" name="product_image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-xl btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
