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

function showGiveBookForm(id){
  var form = document.getElementById("giveBook");
  if(form.style.display === "none"){
    form.style.display = "block";
    showBookList(id);
    var input = document.getElementById('user_id');
    input.value = id;
  }else{
    form.style.display = "none";
  }
}

function hideGiveBookForm(){
  var form = document.getElementById("giveBook");
  if(form.style.display === "none"){
    form.style.display = "block";
  }else{
    form.style.display = "none";
  }
}

function showBookList(id){
  const list = document.getElementById("bookList");
  fetch("getBookList.php?id="+id)
  .then(res => res.json())
  .then(data => {
    list.innerHTML="";
    data.forEach(d => {
      const option = document.createElement("option");
      option.textContent = d.book_name + " "+d.author;
      option.value = d.id;
      list.appendChild(option);
    });
  });
}