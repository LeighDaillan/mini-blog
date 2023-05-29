<?php 

  if (!isset($_COOKIE['Authenticated']) || !isset($_COOKIE['User'])) {
    header('Location: /login.html');
  } 

  include 'methods.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">

<main class="max-w-6xl mx-auto ">
      <div class="flex justify-between items-center text-2xl">
        <h1>Mini-Blog</h1>

        <div class="flex gap-10 items-center">
          <a href="index.php">Home</a>
          <h2><?php echo$_COOKIE['User']; ?></h2>
        <form action="logout.php" method="delete">
          <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-sm" type="submit" >Log Out</button> 
        </form>
      </div>
      </div>
      </div>

      <form action="methods.php" method="POST" class="flex flex-col gap-5 my-10">
        <input type="text" name="title" placeholder="Blog Title" class="border border-black p-2 rounded-sm" required/>
        <textarea name="content" placeholder="Blog Content" class="border border-black p-2 rounded-sm" required></textarea>

        <div class="text-center">
        <button type="submit"
          name="new_post"
          class="button text-sm md:text-base text-white px-4 py-2 bg-black relative after:content-[''] after:border after:border-black after:top-1 after:left-1 after:absolute after:-right-1 after:-bottom-1 uppercase tracking-widest hover:text-gray-300 font-semibold"
        >
          Add Post
        </button>
        </div>
      </form>
      </div>
    </main>
  
</body>
</html>