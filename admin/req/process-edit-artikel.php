<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

  if(isset($_POST['id_artikel']) && 
     isset($_POST['title']) && 
     isset($_POST['text'])){
      
    include "../../db_conn.php";

    $id_artikel = $_POST['id_artikel'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    if(empty($title)){
      $em = "Title is required"; 
      header("Location: ../post.php?error=$em");
      exit;
    } else if(empty($text)){
      $em = "Content is required"; 
      header("Location: ../post.php?error=$em");
      exit;
    }

    // Check if a new cover image is uploaded
    if(isset($_FILES['cover']) && $_FILES['cover']['name'] != ""){
      $image_name = $_FILES['cover']['name'];
      $image_size = $_FILES['cover']['size'];
      $image_temp = $_FILES['cover']['tmp_name'];
      $error = $_FILES['cover']['error'];

      if($error == 0){
        if($image_size > 130000){
          $em = "Sorry, your file is too large.";
          header("Location: ../post.php?error=$em");
          exit;
        } else {
          $image_ex = pathinfo($image_name, PATHINFO_EXTENSION);
          $image_ex = strtolower($image_ex);
          $allowed_exs = array('jpg', 'jpeg', 'png');

          if(in_array($image_ex, $allowed_exs)){
            $cover_url = uniqid("COVER-", true).'.'.$image_ex;
            $image_path = '../../uploads/artikel/'.$cover_url;
            move_uploaded_file($image_temp, $image_path);

            // Fetch the current cover_url to delete the old image
            $stmt = $conn->prepare("SELECT cover_url FROM artikel WHERE id_artikel=?");
            $stmt->execute([$id_artikel]);
            $row = $stmt->fetch();
            $old_cover_url = $row['cover_url'];

            if($old_cover_url != "" && file_exists('../../uploads/artikel/'.$old_cover_url)){
              unlink('../../uploads/artikel/'.$old_cover_url);
            }

            $sql = "UPDATE artikel SET judul=?, isi=?, cover_url=? WHERE id_artikel=?";
            $stmt = $conn->prepare($sql);
            $res = $stmt->execute([$title, $text, $cover_url, $id_artikel]);

          } else {
            $em = "You can't upload files of this type";
            header("Location: ../post.php?error=$em");
            exit;
          }
        }
      }
    } else {
      $sql = "UPDATE artikel SET judul=?, isi=? WHERE id_artikel=?";
      $stmt = $conn->prepare($sql);
      $res = $stmt->execute([$title, $text, $id_artikel]);
    }

    if($res){
      $sm = "Artikel Berhasil Diperbarui!!";
      header("Location: ../post.php?success=$sm");
      exit;
    } else {
      $em = "Artikel Gagal Diperbarui!!";
      header("Location: ../post.php?error=$em");
      exit;
    }

  } else {
    header("Location: ../post.php");
    exit;
  }

} else {
  header("Location: ../admin-login.php");
  exit;
} 
