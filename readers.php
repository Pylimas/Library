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
                        $sql = "SELECT * FROM taken_books where reader_id =".$row['reader_id']." ;";
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
                                        <input type="hidden" name="id" value="'.$book['id'].'">
                                        <button type="submit">Return</button>
                                    </form>
                                </td>
                                </tr>
                                </table>';
                            }
                        }
                    echo '</div>';
                }
            }
        ?>
        <button class="accordion">Section 1</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod nostrum consequuntur qui enim soluta, odit earum quos quis architecto explicabo rerum hic officia ab. Sed aut error perspiciatis aperiam porro? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente adipisci doloribus quidem voluptates ad? Illum delectus quos quaerat dolor modi quibusdam illo eum iste libero aliquid dolores accusantium, eos aut?</p>
        </div>
        <button class="accordion">Section 2</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod nostrum consequuntur qui enim soluta, odit earum quos quis architecto explicabo rerum hic officia ab. Sed aut error perspiciatis aperiam porro? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente adipisci doloribus quidem voluptates ad? Illum delectus quos quaerat dolor modi quibusdam illo eum iste libero aliquid dolores accusantium, eos aut?</p>
        </div>
    </main>
    <?php require_once "footer.php"?>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        for(i=0;i< acc.length; i++){
            acc[i].addEventListener("click", function(){
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if(panel.style.display === "block"){
                    panel.style.display = "none";
                }else{
                    panel.style.display = "block";
                }
            });
        }
    </script>
</body>
</html>
