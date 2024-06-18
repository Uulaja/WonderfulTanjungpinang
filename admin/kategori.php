<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Kategori</title>
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
    include_once '../data/kategori.php'; 
    include_once '../db_conn.php';
    $categories = getAllKategori($conn);
    ?>
    <div class="main-table">
        <h3 class="mb-3">All Kategori 
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addArticleModal">Tambah Kategori</button></h3>
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

        <!-- Modal for Adding kategori -->
        <div class="modal fade" id="addArticleModal" tabindex="-1" aria-labelledby="addArticleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content form-card">
                    <div class="modal-header">
                        <h5 class="modal-title form-title" id="addArticleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="req/process-add-kategori.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="category">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for editing kategori -->
        <div class="modal fade" id="editKategoriModal" tabindex="-1" aria-labelledby="editKategoriModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content form-card">
                    <div class="modal-header">
                        <h5 class="modal-title form-title" id="editKategoriModalLabel">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="req/process-edit-kategori.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_kategori" id="edit-id_kategori">
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="category" id="edit-category">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($categories)) { ?>
            <table class="table t1 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as  $category) { ?>
                    <tr>
                        <th scope="row"><?=$category['id_kategori']?></th>  
                        <td><?=$category['kategori']?></td>
                        <td>
                            <button type="button" 
                                    class="btn btn-primary btn-edit" 
                                    data-id="<?=$category['id_kategori']?>" 
                                    data-category="<?=$category['kategori']?>"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editKategoriModal">
                                Edit
                            </button>                       
                            <a href="kategori-delete.php?kategori_id=<?=$category['id_kategori']?>" class="btn btn-danger">Delete</a>
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
        navList.item(2).classList.add('active');
        $(document).ready(function() {
            $('.text').richText();
            // Event listener for the edit button
            $('.btn-edit').on('click', function() {
                // Get data attributes from the clicked button
                var categoryId = $(this).data('id');
                var category = $(this).data('category');
                
                // Set the values in the modal
                $('#edit-id_kategori').val(categoryId);
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
