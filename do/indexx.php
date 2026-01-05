<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
</head>
<body>
    <div class="header">
        <h2>TodoList Saya</h2>

        <form class="" method="get">
            <label for=""></label>
        </form>
    </div>

    <div class="container">
        <div class="todo-grid">
            <?php while ($todo = mysqli_fetch_assoc($query)){ ?>
                <div class="todo-card <?= $todo['status'] == 'Done' ? 'dark' : 'light' ?>">

                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>