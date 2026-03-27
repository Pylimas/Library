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