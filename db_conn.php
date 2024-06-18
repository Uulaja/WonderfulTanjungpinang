<?php 

$sName = "localhost";
$uName = "id22304127_root";
$pass = "Rahasia_09";
$db_name = "id22304127_project_blog";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}