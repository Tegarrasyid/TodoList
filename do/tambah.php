<?php
session_start();
require "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$category = mysqli_query($koneksi, "SELECT * FROM category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
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

    .container{
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    .form-container{
        width: 100%;
        max-width: 500px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        background: white;
    }

    .form-container h3{
        text-align: center;
        margin-bottom: 20px;
    }

    label{
        display: block;
        font-weight: bold;
        margin-bottom: 5ps;
    }

    input, textarea, select{
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 15px;
    }

    textarea{
        resize: none;
    }

    button{
        width: 100%;
        padding: 10px;
        border: none;
        font-size: 15px;
        border-radius: 5px;
        cursor: pointer;
        background: #198754;
        color: white;
    }

    button:hover{
        background: #32a871ff;
    }
</style>
<body>
    <?php require "navbar.php"; ?>
<br>
    <div class="container">
        <div class="form-container">
            <h3>Tambah Tugas</h3>

            <form action="proses_tambah.php" method="POST">
                <label>Judul</label>
                <input type="text" name="title" required>

                <label>Deskripsi</label>
                <textarea name="description" rows="4" required></textarea>

                <label>Kategori</label>
                <select name="id_category" required>
                    <option value="">Pilih Kategori</option>
                    <?php while($k = mysqli_fetch_assoc($category)) { ?>
                        <option value="<?= $k['id_category']; ?>"><?= $k['category']; ?></option>
                    <?php } ?>
                </select>

                <label>Status</label>
                <select name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Done">Done</option>
                </select>
                                          
                <input type="hidden" name="id_user" value="<?= $id_user ?>">

                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>
</body>
</html>