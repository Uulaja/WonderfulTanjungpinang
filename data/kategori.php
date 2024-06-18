<?php

//Get All USERS

function getAllKategori($conn){
    $sql = "SELECT * FROM kategori;";
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
function getByIdKategori($conn, $id){
    $sql = "SELECT * FROM kategori WHERE id_kategori = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetch();
        return $data;
    }else {
        return 0;
    }
}

function deleteByIdKategori($conn, $id){
    $sql = "DELETE FROM kategori WHERE id_kategori=?";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$id]);
 
    if($res){
           return 1;
    }else {
         return 0;
    }
 }