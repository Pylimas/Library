<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
    crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <?php require_once "header.php"?>
    <main>
        <form class="form" action="login.php" method="post">
            <h3>Login</h3>
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                <?=$_GET['error']?>
                </div>
                <?php } ?>
            <div class="mb-3 inputBox">
                <label for="usernameInput" class="form-label">Username</label>
                <input type="text" class="form-control" id="usernameInput" name="username">
            </div>
            <div class="mb-3 inputBox">
                <label for="passInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passInput" name="password">
            </div>
            <select class="form-select" aria-label="Default select example" name="role">
                <option value="user" selected>User</option>
                <option value="employee">Employee</option>
            </select>
            <button type="submit">Login</button>
        </form>

    </main>
    <?php require_once "footer.php"?>
</body>
</html>