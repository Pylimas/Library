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
            <button onclick="showAddBookForm()">Add book</button>
        </div>
        <div class="tableContainer">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Book name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Isbn</th>
                        <th scope="col">Quantity in library</th>
                        <th scope="col">Taken books</th>
                        <th scope="col">#</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM book;";
                        $result = $pdo->query($sql);
                        if($result->rowCount()>0){
                            while ($row = $result->fetch()){
                                echo '<tr>
                                <td>'.$row['book_name'].'</td>
                                <td>'.$row['author'].'</td>
                                <td>'.$row['isbn'].'</td>
                                <td>'.$row['quantity'].'</td>
                                <td>'.$row['taken'].'</td>
                                <td><button type="button" onclick="showUpdateBookForm('.$row['id'].')">
                                        Edit
                                    </button></td>
                                <td>
                                    <form action="deleteBook.php" method="POST">
                                        <input type="hidden" name="id" value="'.$row['id'].'">
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                                </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="addBook">
            <form action="addBook.php" method="post" class="form">
                <div class="close-button">
                    <button type="button" class="btn-close" aria-label="Close" onclick="showAddBookForm()"></button>
                </div>
                <div class="mb-3">
                    <label for="bookName" class="form-label">Book name</label>
                    <input type="text" class="form-control" id="bookName" name="name">
                </div>
                <div class="mb-3">
                    <label for="bookAuthor" class="form-label">Book author</label>
                    <input type="text" class="form-control" id="bookAuthor" name="author">
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">Book isbn</label>
                    <input type="text" class="form-control" id="isbn" name="isbn">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
                <button type="submit">Add book</button>
            </form>
        </div>
        <div id="updateBook">
            <form action="updateBook.php" method="post" class="form">
                <div class="close-button">
                    <button type="button" class="btn-close" aria-label="Close" onclick="showUpdateBookForm()"></button>
                </div>
                <input type="hidden" name="id" value="">
                <div class="mb-3">
                    <label for="updateName" class="form-label">Book name</label>
                    <input type="text" class="form-control" id="updateName" name="name">
                </div>
                <div class="mb-3">
                    <label for="updateAuthor" class="form-label">Book author</label>
                    <input type="text" class="form-control" id="updateAuthor" name="author">
                </div>
                <div class="mb-3">
                    <label for="updateIsbn" class="form-label">Book isbn</label>
                    <input type="text" class="form-control" id="updateIsbn" name="isbn">
                </div>
                <div class="mb-3">
                    <label for="updateQuantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="updateQuantity" name="quantity">
                </div>
                <button type="submit">Update book</button>
            </form>
        </div>
    </main>
    <?php require_once "footer.php"?>
    <script src="script.js"></script>
</body>
</html>