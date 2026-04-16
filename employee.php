<?php 
include_once "dbh.inc.php";
?>

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
        <div>
          <button onclick="showAddEmployeeForm()">Add employee</button>
        </div>
        <?php
        $sql = "SELECT * FROM emplyee;";
        $result = $pdo->query($sql);
        if($result->rowCount()>0){
            while ($row = $result->fetch()){
                echo '<div class="emplyeeCard">
                <p>Name: '.$row['emplyee_name'].'</p>
                <p>Surname: '.$row['surname'].'</p>
                <div>
                <form action="deleteEmployee.php" method="POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <button type="submit">Delete</button>
                </form>
                </div>
                </div>';
            }
        }
        ?>
        <div id="addEmployee">
            <form class="form" action="addEmployee.php" method="post">
                <div class="close-button">
                    <button type="button" class="btn-close" aria-label="Close" onclick="showAddEmployeeForm()"></button>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="text" class="form-control" id="pass" name="pass">
                </div>
                <button type="submit">Add employee</button>
            </form>
        </div>
    </main>
    <?php require_once "footer.php"?>
    <script>
        function showAddEmployeeForm(){
            var form = document.getElementById("addEmployee");
            if(form.style.display === "none"){
                form.style.display = "block";
            }else{
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>