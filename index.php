<?php 

  if (!isset($_COOKIE['Authenticated']) || !isset($_COOKIE['User'])) {
    header('Location: /login.html');
  } 

  include 'methods.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Mini-Blog</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="p-10">
    <main class="max-w-6xl mx-auto ">
      <div class="flex justify-between items-center text-2xl">
        <h1>Mini-Blog</h1>

        <div class="flex gap-10 items-center">
          <h2><?php echo$_COOKIE['User']; ?></h2>
        <form action="logout.php" method="delete">
          <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-sm" type="submit" >Log Out</button> 
        </form>
      </div>
      </div>
      </div>

      <div>
        <?php if(isset($_REQUEST['info'])){?>
          <?php if($_REQUEST['info'] == "added"){?>
            <div class="text-center bg-green-500 text-white my-3 py-4 text-xl rounded-md">
              <h4>Post has been added.</h4>
            </div>
         <?php } else if($_REQUEST['info'] == "updated"){ ?>
          <div class="text-center bg-green-500 text-white my-3 py-4 text-xl rounded-md">
              <h4>Post has been updated.</h4>
            </div>
          <?php } else if($_REQUEST['info'] == "deleted"){ ?>
            <div class="text-center bg-red-500 text-white my-3 py-4 text-xl rounded-md">
              <h4>Post has been delete.</h4>
            </div>
            <?php } ?>
       <?php } ?>
      </div>

      <div class="flex justify-center my-10">
        <a href="/create.php"
          class="button text-sm md:text-base text-white px-4 py-2 bg-black relative after:content-[''] after:border after:border-black after:top-1 after:left-1 after:absolute after:-right-1 after:-bottom-1 uppercase tracking-widest hover:text-gray-300 font-semibold"
        >
          Create A Post +
        </a>
      </div>
      

      <div class="grid grid-cols-2 gap-5">
            <?php foreach($query as $q){?>
              <div class="bg-gray-200 p-5 rounded-sm shadow-lg">
              <p class="text-xl font-bold tracking-widest"><?php echo $q['title'] ?></p>
              <p class="text-lg tracking-widest">Content: <?php echo $q['content'] ?></p>
              <p class="text-sm mt-2 mb-3 font-light tracking-widest">Date: <?php echo $q['created_at'] ?></p>
              <a href="view.php?id=<?php echo $q['id'] ?>" class="bg-blue-500  px-2 py-1 rounded-sm text-white cursor-pointer">Read More ...</a>
              </div>
              <?php } ?>
      </div>
    </main>
    <script src="" async defer></script>
  </body>
</html>
