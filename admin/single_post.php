<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])&& isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    
    include_once '../data/artikel.php'; 
    include_once '../db_conn.php';
    $posts = getById($conn,$post_id);
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - <?=$posts['judul']?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/richtext.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.richtext.min.js"></script>
</head>
<body>
    <?php
    $key = "hhhdsefeg";
    include 'inc/side-nav.php';
    
    ?>
    <div class="main-table">
   
    <div class="card main-blog-card mb-5" >
            <img src="../uploads/artikel/<?=$posts['cover_url'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$posts['judul']?></h5>
                <p class="card-text"><?=$posts['isi']?></p>
                <p class="card-text"><small class="text-body-secondary">Disunting <?=$posts['tanggal']?></small> </p>
            </div>
        </div>
       
    </div>
        </section>
            </div>
	<script>
		var navList = document.getElementById('navList').children;
		navList.item(1).classList.add('active');
        $(document).ready(function() {
            $('.text').richText();});
	</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php 
} else {
    header("Location: ../admin-login.php");
    exit;
} 
?>
