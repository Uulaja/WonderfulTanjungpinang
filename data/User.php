<?php

//Get All USERS

function getAll($conn){
    $sql = "SELECT id_user, fname, username FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() >= 1){
        $data = $stmt->fetchAll();
        return $data;
    }else {
        return 0;
    }
}


function deleteById($conn, $id){
    $sql = "DELETE FROM users WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if($res){
        return 1;
    }else {
        return 0;
    }        
}
function getByIDUser($conn, $id){
    $sql = "SELECT id_user, fname, username FROM users WHERE id_user=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
 
    if($stmt->rowCount() >= 1){
          $data = $stmt->fetch();
          return $data;
    }else {
        return 0;
    }
 }