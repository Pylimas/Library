<?php 
include_once "dbh.inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
    crossorigin="anonymous">
</head>
<body>
    <?php require_once "header.php"?>
    <main>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Isbn</th>
                    <th scope="col">Quantity in library</th>
                    <th scope="col">Free books</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM book;";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if($resultCheck>0){
                        while ($row = mysqli_fetch_assoc($result)){
                            echo '<tr>
                            <th>'.$row['id'].'</th>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['author'].'</td>
                            <td>'.$row['isbn'].'</td>
                            <td>'.$row['quantity'].'</td>
                            <td>'.$row['free'].'</td>
                            </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>