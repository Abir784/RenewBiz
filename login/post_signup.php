<?php
$email = $_POST["email"];
$password=password_hash($_POST["password"],PASSWORD_DEFAULT);
$sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 1)";

echo password_hash($intar, PASSWORD_DEFAULT);



?>
