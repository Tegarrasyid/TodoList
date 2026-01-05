<?php
session_start();
require "koneksi.php";

if(!isset($_SESSION['id_user'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$id_user = $_SESSION['id_user'];

$query = mysqli_query($koneksi, "UPDATE todo set is_favorite = IF(is_favorite = 1, 0, 1)
        WHERE id_todo = '$id' AND id_user = '$id_user'");

if($query){
    header("location:index.php?favorite=ditambahkan");
} else {
    header("location:index.php?favorite=gagal");
}
exit();
?>