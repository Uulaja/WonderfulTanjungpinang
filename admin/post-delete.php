<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['post_id'])) {
    
    $artikel_id=$_GET['post_id'];

    include_once '../data/artikel.php'; 
    include_once '../db_conn.php';
    $res = deleteById($conn, $artikel_id);
    if($res){
        $sm="post deleted successfully";
        header("Location: post.php?success=$sm");
        exit;
    }else{
        $em="post not deleted";
        header("Location: post.php?error=$em");
        exit;}
 
} else {
    header("Location: ../admin-login.php");
    exit;
}
?>
