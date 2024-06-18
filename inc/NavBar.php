<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonderful TanjungPinang</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <b>Wonderful<span style="color: #FFD700;">TanjungPinang</span></b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori.php">Category</a>
                    </li>
                    <?php if ($logged) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="profile.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i> <?=$_SESSION['username']?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../penulis/post.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login | Signup</a>
                    </li>
                    <?php } ?>
                </ul>
               
            </div>
        </div>
    </nav>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzC2XpsK3mI6b3L1bO9Y6XJ9f93rGXgK9E9oYbPvHWT+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-QFQtWu7e1P6boqmDeH6AzIEPFi8Zh9zSeCJ5pL1yt69b6uD55C4J8kewEI7C3Utw" crossorigin="anonymous"></script></body>
</html>
