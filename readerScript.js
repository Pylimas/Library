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
    getBooksForUser(id);
  }else{
    form.style.display = "none";
  }
}

function getBooksForUser(id){
    let dropdown = document.forms['bookDropdown'].bookList;
    if(id.trim() === ""){
        dropdown.selectedIndex=0;
        return false;
    }
    // fetch('')
    // .then(response => response.json())
    // .then(function()){
    //     let out="";
    //     for(let book in ){
    //         out+= '<option value="${book['id']}">${book['book_name']} +" "+ ${book['autror']}</option>'
    //     }
    //     dropdown.innerHTML=out;
    // }
}