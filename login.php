<?php 

include('dbConn.php');
$objDb = new dbConn();
$conn = $objDb->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    $data = [];
    $checkPwd = 0;
    

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            $checkPwd = password_verify($password, $data[0]['password']);
        }; 
        
        if ($checkPwd && count($data) == 1) {
          
          // Create token header as a JSON string
          $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

          // Create token payload as a JSON string
          $usersData = [
              'user_id' => $data[0]['id'],
              'username' => $data[0]['username'],
              'email' => $data[0]['email'],
          ];
          $payload = json_encode($usersData);
          $secret = 'abcdefghijklmnopqrst';

          // Encode Header to Base64Url String
          $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

          // Encode Payload to Base64Url String
          $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

          // Encode Secret to Base64Url String
          $base64UrlSecret = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($secret));

          // Create Signature Hash
          $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $base64UrlSecret, true);

          // Encode Signature to Base64Url String
          $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

          // Create JWT
          $jwt_token = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

          setcookie('Authenticated', $jwt_token, time() + (86400 * 30), "/");
          setcookie('User', $data[0]['username'], time() + (86400 * 30), "/");
          header('Location: /index.php');
        }

        echo 'Wrong Credentials';

}