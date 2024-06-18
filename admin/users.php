<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    $key = "hhhdsefeg";
    include 'inc/side-nav.php';
    include_once '../data/User.php'; 
    include_once '../db_conn.php';
    $users = getAll($conn);

    ?>
    <div class="main-table">
        <h3 class="mb-3">All Users <a href="../signup.php" class="btn btn-success">Add New</a> </h3>
        <?php if (!empty($users)) { ?>
            <table class="table t1 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $index => $user) { ?>
                    <tr>
                        <th scope="row"><?=$user['id_user']?></th>
                        <td><?=$user['fname']?></td>
                        <td><?=$user['username']?></td>
                        <td>
                            <a href="user-edit.php?user_id=<?=$user['id_user']?>" class="btn btn-primary">Edit</a>
                            <a href="user-delete.php?user_id=<?=$user['id_user']?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-warning">
                Kosong!!
            </div>
        <?php } ?>
    </div>
	<script>
		var navList = document.getElementById('navList').children;
		navList.item(0).classList.add('active');
		
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
