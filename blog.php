<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title> Blog Page</title>
        <link rel = "stylesheet" href = "css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UulBlog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="About.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Contact.php">Contact</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="kategori.php">Kategori 1</a></li>
            <li><a class="dropdown-item" href="kategori.php">Kategori 2</a></li>
            <li><a class="dropdown-item" href="kategori.php">Kategori 3</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <section class= "d-flex" >
        <main class = "main-blog"> 
        <div class="card main-blog-card mb-5" >
            <img src="uploads/ai.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Artikel title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text"><small class="text-body-secondary">Disunting 3 menit yang lalu</small> </p>
                <a href="#" class="btn btn-primary">Baca</a>
            </div>
        </div>
        <div class="card main-blog-card mb-5" >
            <img src="uploads/ai.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Artikel title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text"><small class="text-body-secondary">Disunting 3 menit yang lalu</small> </p>
                <a href="#" class="btn btn-primary">Baca</a>
            </div>
        </div>
        </main>
        <aside class="aside-main"> 
                    <div class="list-group kategori-aside">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Kategori
            </a>
            <a href="#" class="list-group-item list-group-item-action">Kategori 1</a>
            <a href="#" class="list-group-item list-group-item-action">Kategori 2</a>
            <a href="#" class="list-group-item list-group-item-action">Kategori 3</a>
            </div>
        </aside>
    </section>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>