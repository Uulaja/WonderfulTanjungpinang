<?php
if(isset($key)&&$key == "hhhdsefeg"){
?>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">Dashboard <b>Penulis</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<div class="d-flex align-items-center main-profile-link" >
			<a href="profile.php" >
			<i class="fa fa-user" aria-hidden="true"></i>&nbsp;
		   <span><?php echo $_SESSION['username']; ?></span>
		   </a>
		</div>
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="../img/user.jpg">
				<h4><?=$_SESSION['username']?></h4>
			</div>
			<ul id="navList">
			
				<li>
					<a href="post.php">
						<i class="fa fa-wpforms" aria-hidden="true"></i>
						<span>Post</span>
					</a>
				</li>
				<li>
					<a href="../index.php">
						<i class="fa fa-wpforms" aria-hidden="true"></i>
						<span>Home</span>
					</a>
				</li>
				<li>
					<a href="../logout.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="section-1">
<?php
}
?>