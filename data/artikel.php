<?php

//Get All USERS

function getAll($conn){
    $sql = "SELECT * FROM artikel;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
    }else {
        return 0;
    }
}
//getByid
function getById($conn, $id){
    $sql = "SELECT * FROM artikel WHERE id_artikel = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetch();
        return $data;
    }else {
        return 0;
    }
}

function deleteById($conn, $id){
    $sql = "DELETE FROM artikel WHERE id_artikel = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($res){
        return 1;
    }else {
        return 0;
    }        
}
function get5Kategori($conn){
    $sql = "SELECT * FROM kategori LIMIT 5";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if($stmt->rowCount() >= 1){
          $data = $stmt->fetchAll();
          return $data;
    }else {
        return 0;
    }
 }
 function getAllcategory($conn){
    $sql = "SELECT * FROM kategori ORDER BY kategori";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
 
    if($stmt->rowCount() >= 1){
          $data = $stmt->fetchAll();
          return $data;
    }else {
        return 0;
    }
 }
 // getCategoryById
function getCategoryById($conn, $id){
    $sql = "SELECT * FROM kategori WHERE id_kategori=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
 
    if($stmt->rowCount() >= 1){
          $data = $stmt->fetch();
          return $data;
    }else {
        return 0;
    }
 }
 // getAllPostsByCategory
function getAllPostsByCategory($conn, $category_id){
    $sql = "SELECT * FROM artikel  WHERE kategori=? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$category_id]);
 
    if($stmt->rowCount() >= 1){
          $data = $stmt->fetchAll();
          return $data;
    }else {
        return 0;
    }
 }
 function getAllByUser($conn, $user_id) {
    $sql = "SELECT * FROM artikel WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}