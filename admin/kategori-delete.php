<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['kategori_id'])) {
    
    $kategori_id = $_GET['kategori_id'];

    include_once '../data/kategori.php'; 
    include_once '../db_conn.php';
    $res = deleteByIdKategori($conn, $kategori_id);
    if ($res) {
        $sm = "kategori deleted successfully";
        header("Location: kategori.php?success=$sm");
        exit;
    } else {
        error_log("Delete operation failed for kategori_id: " . $kategori_id); // Log error
        $em = "kategori not deleted";
        header("Location: kategori.php?error=$em");
        exit;
    }
 
} else {
    header("Location: ../admin-login.php");
    exit;
}
?>
