<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
</head>
<style>
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
</style>
<body>
    <div class="navbar">
        <a href="index.php">TodoList</a>
        <div>
            <a href="index.php">Home</a>
            <a href="profil.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>