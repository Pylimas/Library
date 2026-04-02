const carousel = document.querySelector('.carousel');
const next = document.querySelector('.next');
const prev = document.querySelector('.prev');

next.addEventListener('click', () => {
  carousel.scrollLeft += 200;
});

prev.addEventListener('click', () => {
  carousel.scrollLeft -= 200;
});

function showAddBookForm(){
  var form = document.getElementById("addBook");
  if(form.style.display === "none"){
    form.style.display = "block";
  }else{
    form.style.display = "none";
  }
}

function showUpdateBookForm(id){
  var form = document.getElementById("updateBook");
  if(form.style.display === "none"){
    form.style.display = "block";
    document.querySelector('#updateBook input[name="id"]').value = id;
    fetch('getBook.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            document.getElementById('updateName').value = data.book_name;
            document.getElementById('updateAuthor').value = data.author;
            document.getElementById('updateIsbn').value = data.isbn;
            document.getElementById('updateQuantity').value = data.quantity;
        });
  }else{
    form.style.display = "none";
  }
}
