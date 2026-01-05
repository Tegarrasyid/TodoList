<?php
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user ='$id_user'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Saya</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    background: #f5f5f5;
}

.container {
    display: flex;
    justify-content: center;
}

.profile-card{
    width: 100%;
    max-width: 450px;
    border-radius: 15px;
    padding: 30px;
    margin-top: 70px;
    box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    background: #fff;
}

.profile-card h3{
    text-align: center;
    margin-bottom: 25px;
}

.profile-card p{
    margin-bottom: 12px;
    font-size: 15px;
}

.profile-card strong{
    display: inline-block;
    width: 120px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
}

.btn:hover {
    background: #333;
}

.text-center {
    text-align: center;
    margin-top: 25px;
}
.btn-e{
    display: inline-block;
    padding: 10px 20px;
    background: #1151ffff;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
}
.btn-e:hover {
    background: #0c628aff;
}
</style>
</head>

<body>
<?php require "navbar.php"; ?>
<div class="container">
    <div class="profile-card">
        <h3>Profil Saya</h3>

        <?php while($user = mysqli_fetch_assoc($query)) { ?>
            <p><strong>Nama</strong>: <?= $user['name'] ?></p>
            <p><strong>Tanggal Lahir</strong>: <?= $user['birth_date'] ?></p>
            <p><strong>Username</strong>: <?= $user['username'] ?></p>
            <p><strong>Email</strong>: <?= $user['email'] ?></p>
            <p><strong>Password</strong>: *******</p>
        <?php } ?>

        <div class="text-center">
            <a href="index.php" class="btn">Kembali</a>
            <a href="edit_profil.php" class="btn-e">Edit Profil</a>
        </div>
    </div>
</div>

</body>
</html>
