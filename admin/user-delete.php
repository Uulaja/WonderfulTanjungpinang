<?php
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username']) && isset($_GET['user_id'])) {
    
    $user_id=$_GET['user_id'];

    include_once '../data/User.php'; 
    include_once '../db_conn.php';
    $users = deleteById($conn, $user_id);
    if($res){
        $sm="User deleted successfully";
        header("Location: users.php?error=$sm");
        exit;
    }else{
        $em="User not deleted";
        header("Location: users.php?error=$em");
        exit;
    }
 
} else {
    header("Location: ../admin-login.php");
    exit;
}
?>
 