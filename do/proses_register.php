<?php
require "koneksi.php";

$nama = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$tgl_lahir = $_POST['birth_date'];

$sql = "INSERT INTO user (name, email, username, password, birth_date)
        VALUES
        ('$nama','$email','$username',md5('$password'),'$tgl_lahir')";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:login.php?register=sukses");
    exit;
} else {
    header("location:register.php?register=gagal");
    exit;
}
?>