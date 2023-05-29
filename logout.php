<?php 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  setcookie('Authenticated', '', time() - 3600, '/');
  setcookie('User', '', time() - 3600, '/');
}

header('Location: /login.html');