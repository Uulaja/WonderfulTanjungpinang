<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 
  if(isset($_POST['category'])){
    include "../../db_conn.php";
    $category = $_POST['category'];
    $id = $_POST['id_kategori'];
    if(empty($category)){
         $em = "category is required"; 
         header("Location: ../kategori.php?error=$em");
         exit;
      }
      $sql = "UPDATE kategori SET kategori=? where id_kategori=?" ;
      $stmt = $conn->prepare($sql);
      $res=$stmt->execute([$category, $id]);
    
      if($res){
        $sm="Kategori Berhasil Diedit!!";
        header("Location: ../kategori.php?success=$sm");
        exit;
    }else{
        $em="Kategori Gagal Diedit!!";
        header("Location: ../kategori.php?error=$em");
        exit;
    }

  }else{
    header("Location: ../kategori.php");
    exit;
  }








} else {
    header("Location: ../admin-login.php");
    exit;
} 
