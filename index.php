<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
	 $logged = true;
	 $user_id = $_SESSION['user_id'];
    }
  $notFound = 0;
 ?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title> Wonderful TanjungPinang</title>
        <link rel = "stylesheet" href = "css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
      <?php
      include "inc/NavBar.php";
      include_once 'data/artikel.php'; 
      include_once 'data/kategori.php';
      include_once 'db_conn.php';
      $posts = getAll($conn);
      $categories = getAllcategory($conn);
  $categories5 = get5Kategori($conn); 
  $category = 0;
      ?>
   
<div class="container mt-5">
    <section class= "d-flex" >
    <?php if (!empty($posts)) { ?>
        <main class = "main-blog"> 
        <?php foreach ($posts as  $artikel) { ?>
        <div class="card main-blog-card mb-5" >
            <img src="uploads/artikel/<?=$artikel['cover_url']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$artikel['judul']?></h5>
                <?php 
                    $p = strip_tags($artikel['isi']); 
                    $p = substr($p, 0, 200);               
			     ?>
                <p class="card-text"><small class="text-body-secondary">Disunting <?=$artikel['tanggal']?></small> </p>
                <a href="single_post.php?post_id=<?=$artikel['id_artikel']?>" class="btn btn-primary">Baca</a>
            </div>
        </div>
        <?php } ?>
        
        </main>
        <?php }  ?>
        <aside class="aside-main">
       	   <div class="list-group category-aside">
			  <a href="#" 
			     class="list-group-item list-group-item-action active" 
			     aria-current="true">
			    Category
			  </a>
			  <?php foreach ($categories5 as $category ) { ?>
			  <a href="kategori.php?id_kategori=<?=$category['id_kategori']?>" 
			  	 class="list-group-item list-group-item-action">
			  	<?php echo $category['kategori']; ?>
			  </a>
			  <?php } ?>
			</div>
       </aside>
    </section>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
cuman gabut saja ges
    </body>
</html>