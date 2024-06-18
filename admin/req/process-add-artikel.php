<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 
  if(isset($_POST['title']) && 
  isset($_FILES['cover']) && 
  isset($_POST['text'])&& 
  isset($_POST['category'])&& 
  isset($_POST['tanggal'])){
    include "../../db_conn.php";

    $title = $_POST['title'];
    $text = $_POST['text'];
    $category = $_POST['category'];
    $tanggal = $_POST['tanggal'];

    if(empty($title)){
         $em = "Title is required"; 
         header("Location: ../post.php?error=$em");
         exit;
      }else if(empty($title)){
         $em = "Title is required"; 
         header("Location: ../post.php?error=$em");
         exit;
      }

    $image_name = $_FILES['cover']['name'];
    if($image_name!=""){
      $image_size = $_FILES['cover']['size'];
      $image_temp = $_FILES['cover']['tmp_name'];
      $error = $_FILES['cover']['error'];
      if($error == 0){
        if($image_size > 130000){
          $em = "Sorry, your file is too large.";
          header("Location: ../post.php?error=$em");
          exit;
        }else{
          $image_ex=pathinfo($image_name, PATHINFO_EXTENSION);
          $image_ex=strtolower($image_ex);
          $allowed_exs = array('jpg', 'jpeg', 'png');
        
          if(in_array($image_ex, $allowed_exs)){
            $cover_url = uniqid("COVER-", true).'.'.$image_ex;
            $image_path = '../../uploads/artikel/'.$cover_url;
            move_uploaded_file($image_temp, $image_path);
            $sql = "INSERT INTO artikel ( judul, isi, kategori, cover_url, tanggal) VALUES ( ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title, $text, $category, $cover_url, $tanggal]);
          }else{
          $em = "You can't upload files of this type";
          header("Location: ../post.php?error=$em");
          exit;
        }
      }
    }
    }else{
      $sql = "INSERT INTO artikel ( judul, isi, kategori, tanggal) VALUES ( ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title, $text, $category,  $tanggal]);
    }
      if($res){
        $sm="Artikel Berhasil Ditambahkan!!";
        header("Location: ../post.php?success=$sm");
        exit;
    }else{
        $em="Artikel Gagal Ditambahkan!!";
        header("Location: ../post.php?error=$em");
        exit;
    }

  }else{
    header("Location: ../post.php");
    exit;
  }








} else {
    header("Location: ../admin-login.php");
    exit;
} 
