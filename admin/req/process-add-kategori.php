<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 
  if(isset($_POST['category'])){
    include "../../db_conn.php";
    $category = $_POST['category'];

    if(empty($category)){
         $em = "category is required"; 
         header("Location: ../kategori.php?error=$em");
         exit;
      }
      $sql = "INSERT INTO kategori(kategori) VALUES (?)";
      $stmt = $conn->prepare($sql);
      $res=$stmt->execute([$category]);
    
      if($res){
        $sm="Kategori Berhasil Ditambahkan!!";
        header("Location: ../kategori.php?success=$sm");
        exit;
    }else{
        $em="Kategori Gagal Ditambahkan!!";
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
