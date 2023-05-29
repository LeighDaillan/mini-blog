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
        <a href="index.php">Home</a>
          <h2><?php echo$_COOKIE['User']; ?></h2>
        <form action="logout.php" method="delete">
          <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-sm" type="submit" >Log Out</button> 
        </form>
      </div>
      </div>
      </div>

        <?php foreach($query as $q){?>
            <div class="bg-gray-200 my-10 p-5">
                <h1 class="font-bold text-4xl"><?php echo $q['title']; ?></h1>
                <h2 class=" text-2xl">
                    <?php echo $q['content']; ?>
                </h2>
                <h3 class="font-light text-lg">
                    Date:   <?php echo $q['created_at']; ?>
                </h3>
                <div class="flex justify-center gap-10 items-center">
                <a class="px-4 py-2 bg-blue-600 text-white rounded-sm" href="edit.php?id=<?php echo $q['id']; ?>">Edit</a>

                <form>
                    <input type="text" hidden name="id" value="<?php echo $q['id']; ?>" />
                <button class="px-4 py-2 bg-red-600 text-white rounded-sm" name="delete">Delete</button>
                </form>
            </div>
            </div>
        <?php } ?>

    </main>
    <script src="" async defer></script>
  </body>
</html>
