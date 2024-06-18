<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Artikel</title>
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
    include_once '../data/artikel.php'; 
    include_once '../data/kategori.php';
    include_once '../db_conn.php';
    $posts = getAll($conn);
    $categories = getAllKategori($conn);
    ?>
    <div class="main-table">
        <h3 class="mb-3">All Artikel <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addArticleModal">
        Tambah Artikel </button></h3>
        <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php } ?>
       <!-- Add Article Modal -->
       <div class="modal fade" id="addArticleModal" tabindex="-1" aria-labelledby="addArticleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content form-card">
                    <div class="modal-header">
                        <h5 class="modal-title form-title" id="addArticleModalLabel">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="req/process-add-artikel.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">judul</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cover Image</label>
                                <input type="file" class="form-control" name="cover">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">isi</label>
                                <textarea class="form-control text" name="text"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-control">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?=$category['id_kategori']?>"><?=$category['kategori']?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Article Modal -->
        <div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content form-card">
                    <div class="modal-header">
                        <h5 class="modal-title form-title" id="editArticleModalLabel">Edit Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="req/process-edit-artikel.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_artikel" id="edit-id_artikel">
                            <div class="mb-3">
                                <label class="form-label">judul</label>
                                <input type="text" class="form-control" name="title" id="edit-title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cover Image</label>
                                <input type="file" class="form-control" name="cover">
                                <img src="" id="edit-cover-image" class="img-thumbnail mt-2" style="max-height: 200px;">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">isi</label>
                                <textarea class="form-control text" name="text" id="edit-text"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-control" id="edit-category">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?=$category['id_kategori']?>"><?=$category['kategori']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php if (!empty($posts)) { ?>
            <table class="table t1 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as  $artikel) { ?>
                    <tr>
                        <th scope="row"><?=$artikel['id_artikel']?></th>
                        <td><a href="single_post.php?post_id=<?=$artikel['id_artikel']?>"><?=$artikel['judul']?></a></td>
                        <td><?=$artikel['isi']?></td>
                        
                        <td>
                            <button type="button" 
                                    class="btn btn-primary btn-edit" 
                                    data-id="<?=$artikel['id_artikel']?>" 
                                    data-title="<?=$artikel['judul']?>" 
                                    data-cover="<?=$artikel['cover_url']?>"
                                    data-text="<?=$artikel['isi']?>" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editArticleModal">
                                Edit
                            </button>
                            <a href="post-delete.php?post_id=<?=$artikel['id_artikel']?>" class="btn btn-danger">Delete</a>
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
        navList.item(1).classList.add('active');
        function initializeRichText() {
        $('.text').richText();
    }
        $(document).ready(function() {
            // Event listener for the edit button
            $('.btn-edit').on('click', function() {
                // Get data attributes from the clicked button
                var articleId = $(this).data('id');
                var title = $(this).data('title');
                var cover = $(this).data('cover');
                var text = $(this).data('text');                
                // Set the values in the modal
                $('#edit-id_artikel').val(articleId);
                $('#edit-title').val(title);
                $('#edit-cover-image').attr('src', '../uploads/artikel/' + cover);
                $('#edit-text').val(text);
                $('#edit-category').val(category);
            });
        });
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