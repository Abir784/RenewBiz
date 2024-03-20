<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update & Delete Product</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="file"], input[type="number"], input[type="submit"], button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"], button {
            background-color: #4CAF50; /* Green color for update button */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 12px 20px; /* Adjust padding for better appearance */
            font-size: 16px; /* Adjust font size for better appearance */
        }
        input[type="submit"]:hover, button:hover {
            background-color: #45a049; /* Darker shade of green on hover */
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Product</h1>
        <?php if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-danger" ><?=$_SESSION['error']?></div>
        <?php } unset($_SESSION['error'])?>
        <form action="update_product.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label form-label-lg">Product ID:</label>
                <!-- Automatically generated product ID -->
                <input type="text" class="form-control form-control-lg" name="product_id" value="<?=uniqid('product_')?>" readonly>
            </div>
            <div class="form-group">
                <label class="form-label form-label-lg">Product Name:</label>
                <input type="text" class="form-control form-control-lg" name="product_name" required>
            </div>
            <div class="form-group">
                <label class="form-label form-label-lg">Product Image:</label>
                <input type="file" class="form-control form-control-lg" name="product_image" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-xl btn-primary">Update Product</button>
            </div>
            <div class="form-group">
                <!-- Delete Product button -->
                <button type="submit" class="btn btn-xl btn-danger" formaction="delete_product.php">Delete Product</button>
            </div>
        </form>
    </div>
</body>
</html>
