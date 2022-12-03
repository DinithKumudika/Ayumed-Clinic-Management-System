// side bar
const menuBtn = document.getElementById("menu-btn");
const sidebar =  document.querySelector(".side-nav-container");

menuBtn.addEventListener('click',function(){
     sidebar.classList.toggle("active");
})

//logout
const logout = document.getElementById("logout");
const logoutBtn = document.getElementById("logout-btn");

logoutBtn.addEventListener('click',function(){
     logout.submit();
});


//register service worker
if(`serviceWorker` in navigator){
     navigator.serviceWorker.register('../../sw.js')
     .then(function(reg){
          console.log("service worker registered", reg);
     })
     .catch(function(err){
          console.log("error in registering service worker", err);
     })
}

// modal
const modal = document.getElementById("modal");
const openModalBtn = document.querySelector(".modal-active");
const span = document.getElementsByClassName("close")[0];

openModalBtn.addEventListener('click',function (){
     modal.style.display = "block";
});

span.addEventListener('click',function () {
     modal.style.display = "none";
});

window.addEventListener('click',function (e) {
     if (e.target == modal) {
          modal.style.display = "none";
     }
});


function sendXHR(method, url){
     // initialize XMLHttpRequest object
     const xhr = new XMLHttpRequest();

     // establish connection with the server
     xhr.open(method, url);

     // callback
     xhr.onreadystatechange = function () {
          if(this.readyState === 4 && this.status === 200){

          }
     }

     // send request
     xhr.send();
}

