<?php 
session_start();


include '../../db/db.php';



$id = $_GET['id'];
try{
    $sql = "DELETE FROM category WHERE id = '$id'";
    $categorylist= $connect->query($sql);
    $_SESSION['success']="Da xoa thanh cong";
}catch(Exception $e){
    $error="Dinh khoa ngoai khong the xoa";
    $_SESSION['error']=$error;
}
header("Location:index.php");