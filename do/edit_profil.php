<?php
session_start();
require "koneksi.php";

$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
</head>
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
    .navbar {
        background: #3d3d3dff;
        padding: 15px 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        margin-left: 20px;
    }

    .wrapper{
        min-height: 95vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register{
        width: 100%;
        max-width: 400px;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        background: white;
    }

    .register h3{
        text-align: center;
        margin-bottom: 20px;
    }

    label{
        display: block;
        font-weight: bold;
        margin-bottom: 4px;
    }
    
    input{
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        font-size: 12px;
    }

    button{
        width: 100%;
        padding: 10px;
        border: none;
        font-size: 15px;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
        background: #0a90f7ff;
        color: white;
    }

    button:hover{
        background: #3692d8ff;
    }

    .text-center{
        text-align: center;
    }

    .text-center a{
        text-decoration: none;
        font-weight: bold;
        color: #0091ffff;
    }

    .text-center a:hover{
        text-decoration: underline;
    }

    .batal{
        width: 100%;
        padding: 10px;
        border: none;
        font-size: 15px;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 10px;
        background: #f70a0aff;
        color: white;
    }

    .batal:hover{
        background: #d83636ff;
    }

</style>
<body>

<?php require "navbar.php" ?>
<div class="wrapper">
    <div class="register">
        <h3>Edit Profil</h3>

        <form action="proses_update_profil.php" method="POST">
            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

            <p>
                Nama <br>
                <input type="text" name="name" value="<?= $user['name'] ?>" required>
            </p>

            <p>
                Tanggal Lahir <br>
                <input type="date" name="birth_date" value="<?= $user['birth_date'] ?>">
            </p>

            <p>
                Username <br>
                <input type="text" name="username" value="<?= $user['username'] ?>" required>
            </p>

            <p>
                Email <br>
                <input type="email" name="email" value="<?= $user['email'] ?>" required>
            </p>

            <hr><br>

            <p>
                Password Baru <br>
                <small>(Kosongkan jika tidak ingin ganti password)</small><br>
                <input type="password" name="password">
            </p>

            <button type="submit">Simpan Perubahan</button>
            <a href="profil.php"  ><button class="batal">Batal</button></a>
        </form>
    </div>    
</div>

</body>
</html>
