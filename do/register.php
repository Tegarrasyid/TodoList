<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

</style>
<body>
    <div class="navbar">
        <a href="index.php">TodoList</a>
    </div>
    
    <div class="wrapper">
        <div class="register">
            <h3>Daftar Pengguna Baru</h3>
            <form action="proses_register.php" method="post">

                <label>Nama Lengkap</label>
                <input type="text" name="name" required>

                <label>Email</label>
                <input type="email" name="email" required>

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>
                
                <label>Tanggal Lahir</label>
                <input type="date" name="birth_date" required>

                <button type="submit">Daftar</button>

                <p class="text-center">Sudah punya akun?<a href="login.php"> Login Disini</a></p>
            </form>

        </div>
    </div>

</body>
</html>