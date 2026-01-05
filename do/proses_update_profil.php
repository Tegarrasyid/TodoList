<?php
session_start();
require "koneksi.php";

$id_user     = $_POST['id_user'];
$name        = $_POST['name'];
$birth_date  = $_POST['birth_date'];
$username    = $_POST['username'];
$email       = $_POST['email'];
$password    = $_POST['password'];

// Jika password diisi → update + md5
if (!empty($password)) {
    $password_md5 = md5($password);

    $query = mysqli_query($koneksi, "
        UPDATE user SET
        name='$name',
        birth_date='$birth_date',
        username='$username',
        email='$email',
        password='$password_md5'
        WHERE id_user='$id_user'
    ");
} else {
    // Jika password kosong → update tanpa password
    $query = mysqli_query($koneksi, "
        UPDATE user SET
        name='$name',
        birth_date='$birth_date',
        username='$username',
        email='$email'
        WHERE id_user='$id_user'
    ");
}

if ($query) {
    header("Location: profil.php");
} else {
    echo "Gagal update profil";
}
