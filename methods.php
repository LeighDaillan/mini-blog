<?php 
include('dbConn.php');
$objDb = new dbConn();
$conn = $objDb->connect();

$author = $_COOKIE['User'];
$sql = "SELECT * FROM blog_posts
        WHERE author = '$author'";
$query = mysqli_query($conn, $sql);

if(isset($_REQUEST["new_post"])) {
  $title = $_REQUEST["title"];
  $content = $_REQUEST["content"];
  $date = date('d') . 'th of ' . date('F, Y') . ' at ' . date('G:i:s');
  

  echo $title . $content . $author;

  $sql = "INSERT INTO blog_posts(title, content, author, created_at) VALUES ('$title', '$content', '$author', '$date')";

  mysqli_query($conn, $sql);

  header('Location: /index.php?info=added');
}

if(isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];

  $sql = "SELECT * FROM blog_posts
  WHERE author = '$author' AND id = '$id'";
  $query = mysqli_query($conn, $sql);
}

if(isset($_REQUEST['delete'])) {
  $id = $_REQUEST['id'];

  $sql = "DELETE FROM blog_posts
  WHERE author = '$author' AND id = '$id'";
  mysqli_query($conn, $sql);

  header('Location: /index.php?info=deleted');
}

if(isset($_REQUEST["update_post"])) {
  $id = $_REQUEST["id"];
  $title = $_REQUEST["title"];
  $content = $_REQUEST["content"];

  $sql = "UPDATE blog_posts SET title = '$title', content = '$content' WHERE author = '$author' AND id = '$id'";
  mysqli_query($conn, $sql);

  header('Location: /index.php?info=updated');
}