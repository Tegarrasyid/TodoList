<?php
    session_start();
    require "koneksi.php";

    if(!isset($_SESSION['id_user'])){
        header("Location: login.php");
        exit();
    }

    if(isset($_GET['category']) && $_GET['category'] != ""){
        $kategori_id = $_GET['category'];
        $query = mysqli_query($koneksi, "SELECT t.*, c.category AS nama_kategori
            FROM todo t
            LEFT JOIN category c ON t.id_category = c.id_category
            WHERE t.id_category = '$kategori_id'
            ORDER BY t.id_todo DESC");
    } else {
        $query = mysqli_query($koneksi, "SELECT t.*, c.category AS nama_kategori
            FROM todo t
            LEFT JOIN category c ON t.id_category = c.id_category
            ORDER BY t.id_todo DESC");
    }

    $sql = "SELECT t.*, c.category AS nama_kategori
            FROM todo t
            LEFT JOIN category c ON t.id_category = c.id_category
            WHERE t.id_user = '".$_SESSION['id_user']."'";

    if (!empty($_GET['category'])) {
        $sql .= " AND t.id_category = '".$_GET['category']."'";
    }

    if (!empty($_GET['status'])) {
        $sql .= " AND t.status = '".$_GET['status']."'";
    }

    if (!empty($_GET['is_favorite'])) {
        $sql .= " AND t.is_favorite = 1";
    }



    $sql .= " ORDER BY t.id_todo DESC";

    $query = mysqli_query($koneksi, $sql);
    $categori = mysqli_query($koneksi, "SELECT * FROM category");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TodoList</title>

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

    .header {
        text-align: center;
        margin-top: 30px;
    }

    .header h2 {
        font-size: 26px;
        margin-bottom: 15px;
    }

    .filter-form {
        display: flex;
        justify-content: center;
        gap: 15px;
        align-items: center;
    }

    select {
        padding: 8px 12px;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 6px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-add { 
        background: #198754; 
        color: white; 
    }
    .btn-edit { 
        background: #0d6efd; 
        color: white; 
    }
    .btn-delete { 
        background: #dc3545; 
        color: white; 
    }

    .btn-add:hover { 
        background: #1fb971ff; 
    }
    .btn-edit:hover { 
        background: #0d89fdff; 
    }
    .btn-delete:hover { 
        background: #d51313ff; 
    }

    .action-btns {
        margin-top: 15px;
    }

    .container {
        width: 90%;
        margin: 40px auto;
    }

    .todo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }

    .todo-card {
        padding: 20px;
        border-radius: 14px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }

    .todo-card.light {
        background: #fff;
    }

    .todo-card.dark {
        background: #000;
        color: #868686;
    }

    .todo-card h5 {
        margin-bottom: 10px;
    }

    .line-through {
        text-decoration: line-through;
    }

    .todo-card p {
        margin-top: 10px;
    }

    .todo-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 12px;
    }

    .love{
        font-size: 20px;
        text-decoration: none;
    }
</style>
</head>

<body>

<?php require "navbar.php"; ?>
<div class="header">
    <h2>TodoList Saya</h2>

    <form method="GET" class="filter-form">
        <label>Filter Kategori:</label>
        <select name="category" onchange="this.form.submit()">
            <option value="">Semua</option>
            <?php while($k = mysqli_fetch_assoc($categori)) { ?>
                <option value="<?= $k['id_category']; ?>"
                <?= ($_GET['category'] ?? '') == $k['id_category'] ? 'selected' : '' ?>>
                <?= $k['category']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Filter Status:</label>
        <select name="status" onchange="this.form.submit()">
            <option value="">Semua</option>
            <option value="Pending" <?= ($_GET['status'] ?? '') == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Done" <?= ($_GET['status'] ?? '') == 'Done' ? 'selected' : '' ?>>Done</option>
        </select>

        <label>Filter Bookmark:</label>
        <select name="is_favorite" onchange="this.form.submit()">
            <option value="">Semua</option>
            <option value="1" <?= ($_GET['is_favorite'] ?? '') == '1' ? 'selected' : '' ?>>Favorite</option>
        </select>
    </form>



    <div class="action-btns">
        <a href="tambah.php" class="btn btn-add">(+) Tambah</a>
    </div>
</div>

<div class="container">
    <div class="todo-grid">
        <?php while ($todo = mysqli_fetch_assoc($query)) { ?>
        <div class="todo-card <?= $todo['status'] == 'Done' ? 'dark' : 'light' ?>">
            <h5 class="<?= $todo['status'] == 'Done' ? 'line-through' : '' ?>">
                <?= $todo['title']; ?>
            </h5>

            <small class="<?= $todo['status'] == 'Done' ? 'line-through' : '' ?>">
                <?= $todo['description']; ?>
            </small>

            <p class="<?= $todo['status'] == 'Done' ? 'line-through' : '' ?>">
                <strong>Kategori :</strong> <?= $todo['nama_kategori']; ?>
            </p>

            <p class="<?= $todo['status'] == 'Done' ? 'line-through' : '' ?>">
                <strong>Status :</strong> <?= $todo['status']; ?>
            </p>
            <br>

            <div class="todo-actions">
                <div class="action-right">
                    <a href="edit.php?id_todo=<?= $todo['id_todo']; ?>" class="btn btn-edit">Edit</a>
                    <a href="hapus.php?id_todo=<?= $todo['id_todo']; ?>" class="btn btn-delete"
                    onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </div>

                <a href="favorite.php?id=<?= $todo['id_todo']; ?>" class="love <?= $todo['is_favorite'] ? '' : '' ?>">
                    <?= $todo['is_favorite'] ? '❤️' : '🤍'; ?>
                </a>
            </div>


        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
