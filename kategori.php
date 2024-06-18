<?php 
session_start();
$logged = false;
if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {
	 $logged = true;
	 $user_id = $_SESSION['id_user'];
    }

  include_once("db_conn.php");
  include_once("data/artikel.php");

  
  
  $categories = getAllcategory($conn);
  $categories5 = get5Kategori($conn); 
  $category = 0;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php 
           if (isset($_GET['id_kategori'])){
           	   $c_id =$_GET['id_kategori'];
           	   $category = getCategoryById($conn, $c_id); 
               if ($category == 0) {
                 echo "Blog Category Page";
               }else {
               	echo "Blog | ".$category['kategori'];
               }
           }else {
              echo "Blog Category Page";
           }
		 ?>
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php 
     include 'inc/NavBar.php';
  ?>
 <div class="container mt-5">
 <h1 class="display-4 mb-4 fs-3">
 			<?php if ($category != 0)
 			  echo "Articles about '".$category['kategori']."'";  
 			else echo "Articles"; ?>
 	
</h1>
  
  <section class="d-flex">
  	<?php if (!isset($_GET['id_kategori'])) { ?>
  	   <main class="main-blog p-2">
  	   	  <div class="list-group category-aside">
  	   	  	 <?php foreach ($categories as $category) {?>
			  <a href="kategori.php?id_kategori=<?=$category['id_kategori']?>" 
			     class="list-group-item list-group-item-action">
			  	<?php echo $category['kategori']; ?>
			  </a>
			<?php } ?>
		   </div>
  	   </main>
  	<?php }else{
  	 $cId = $_GET['id_kategori'];
  	 $posts = getAllPostsByCategory($conn, $cId);
  	?>
	<?php if ($posts != 0) { ?>
   <main class="main-blog">
   	<?php foreach ($posts as $post) { ?>
   	   <div class="card main-blog-card mb-5">
	  <img src="uploads/artikel/<?=$post['cover_url']?>" class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title"><?=$post['judul']?></h5>
	    <?php 
            $p = strip_tags($post['isi']); 
            $p = substr($p, 0, 200);               
	     ?>
	    <p class="card-text"><?=$p?>...</p>
	    <a href="single_post.php?post_id=<?=$post['id_artikel']?>" class="btn btn-primary">Read more</a>
	    <hr>
        <div class="d-flex justify-content-between">
        	<div class="react-btns">
    
		    </div>	
		    <small class="text-body-secondary"><?=$post['tanggal']?></small>
        </div>	
	    
	  </div>
	</div>
   <?php } ?>
   </main>
  	<?php }else {?> 
  		<main class="main-blog p-2">
	  		<div class="alert alert-warning">
	  			No posts yet.
	  		</div>
  	    </main>
  	<?php } } ?>
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

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>