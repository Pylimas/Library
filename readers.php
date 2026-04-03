<?php 
include_once "dbh.inc.php"
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
        <?php 
            $sql = "SELECT * FROM reader;";
            $result = $pdo->query($sql);
            if($result->rowCount() > 0){
                while ($row = $result->fetch()){
                    echo '<button class="accordion">'.$row['reader_card_id'].'</button>
                    <div class="panel">
                    <p>Name: '.$row['reader_name'].'</p>';
                        $sql = "SELECT * FROM taken_books where reader_id =".$row['id']." ;";
                        $result_books = $pdo->query($sql);
                        if($result_books->rowCount() > 0){
                            echo ' <table style="width:100%;">
                                <thead><tr>
                                <th scope="col">Book name</th>
                                <th scope="col">Author</th>
                                <th scope="col">#</th>
                                </tr></thead>';
                            while ($book = $result_books->fetch()){
                                echo '<tr>
                                <td>'.$book['book_name'].'</td>
                                <td>'.$book['author'].'</td>
                                <td>
                                <form action="returnBook.php" method="POST">
                                        <input type="hidden" name="book_id" value="'.$book['book_id'].'">
                                        <input type="hidden" name="id" value="'.$book['id'].'">
                                        <button type="submit">Return</button>
                                    </form>
                                </td>
                                </tr>
                                </table>';
                            }
                        }
                        echo '<button type="button" onclick="showGiveBookForm('.$row['id'].')">Give book</button>
                    </div>';
                }
            }
        ?>
        <div id="giveBook">
            <form name="bookDropdown" class="form" action="giveBook.php" method="POST">
                <div class="close-button">
                    <button type="button" class="btn-close" aria-label="Close" onclick="hideGiveBookForm()"></button>
                </div>
                <input type="hidden" name="user_id" id="user_id" value="">
                <select class="form-select" aria-label="Default select example" id="bookList" name="chosenBookID">
                    <option value="">Open this select menu</option>
                </select>
                <button type="submit">Give book</button>
            </form>
        </div>
    </main>
    <?php require_once "footer.php"?>
    <script src="readerScript.js"></script>
</body>
</html>
