<?php

include('dbConn.php');
$objDb = new dbConn();
$conn = $objDb->connect();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);


  try {
    $sql = "INSERT INTO users (username, email, password) 
            VALUES ('$username', '$email', '$hash_password')";

    $result = mysqli_query($conn, $sql);

    http_response_code(200);
    header('Location: /login.html');
  } catch (Exception $e) {
    http_response_code(400);
    echo "Error: " . $e->getMessage();
  }

}