<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
	include '../inc/NavBar.php';
	?>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<div class="shadow w-450 p-3 text-center">
            <h3 class="display-4 ">Hello, <?=$_SESSION['username']?></h3>
            <a href="logout.php" class="btn btn-warning">
            	Logout
            </a>
		</div>
    </div>
</body>
</html>

<?php }else {
	header("Location:login.php");
	exit;
} ?>