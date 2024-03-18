<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .signup-form {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .signup-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .signup-form input[type="text"],
    .signup-form input[type="email"],
    .signup-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .signup-form button {
      width: 100%;
      padding: 10px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .signup-form button:hover {
      background-color: #45a049;
    }

    .signup-form label {
      display: block;
    }

    .signup-form input[type="checkbox"] {

      display: inline-block;
      margin-right: 5px;
    }
  </style>
</head>
<body>
  <div class="signup-form">
    <h2>Sign Up </h2> 
    <?php if(isset($_SESSION['error1'])){ ?>
          <div class="alert alert-danger" ><?=$_SESSION['error1']?></div>
          <?php }unset($_SESSION['error1'])?>

    <form action="post_signup.php" method="post">
      
   
      <input type="email" name="email" placeholder="Email required" >
      <input type="password" name="password" placeholder="Password required" >
      <label for="remember-me"><input type="checkbox" id="remember-me" name="remember"> Remember Me</label>
      <button type="submit">Sign Up</button>
    </form>
    <?php
    
    ?>
  </div>
  
</body>
</html>
