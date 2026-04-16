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
        $sql = "SELECT * FROM employee;";
        $result = $pdo->query($sql);
        if($result->rowCount()>0){
             echo ' <div class="tableContainer"><table>
                <thead><tr>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">#</th>
                <th scope="col">#</th>
                </tr></thead>';
            while ($row = $result->fetch()){
                echo '<tr>
                <td>'.$row['employee_name'].'</td>
                <td>'.$row['surname'].'</td>
                <td>
                <form action="deleteEmployee.php" method="POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <button type="submit">Delete</button>
                </form>
                </td>
                <td>
                    <button type="button" onclick="showUpdateEmployeeForm('.$row['id'].')">
                        Edit
                    </button>
                </td>
                </tr>';
            }
            echo '</table></div>';
        }
        ?>
        <div id="addEmployee">
            <form class="form" action="addEmployee.php" method="POST">
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
        <div id="updateEmployee">
            <form class="form" action="updateEmployee.php" method="POST">
                <input type="hidden" name="id" id="updateId">
                <div class="close-button">
                    <button type="button" class="btn-close" aria-label="Close" onclick="hideUpdateEmployeeForm()"></button>
                </div>
                <div class="mb-3">
                    <label for="name_update" class="form-label">Name</label>
                    <input type="text" class="form-control" id="updateName" name="name_update">
                </div>
                <div class="mb-3">
                    <label for="surname_update" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="updateSurname" name="surname_update">
                </div>
                <button type="submit">Save</button>
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
        function showUpdateEmployeeForm(id){
            var form = document.getElementById("updateEmployee");
            form.style.display = "block";
            document.querySelector('#updateEmployee input[name="id"]').value = id;
            fetch('getEmployee.php?id=' + id)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('updateName').value = data.employee_name;
                    document.getElementById('updateSurname').value = data.surname;
                });
        }
        function hideUpdateEmployeeForm(){
            var form = document.getElementById("updateEmployee");
            form.style.display = "none";
        }
    </script>
</body>
</html>