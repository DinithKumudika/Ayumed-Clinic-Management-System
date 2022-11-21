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

// Get the modal
const modal = document.getElementById("modal");

// Get the button that opens the modal
const btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.addEventListener('click',function (){
     modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
span.addEventListener('click',function () {
     modal.style.display = "none";
});

window.addEventListener('click',function (e) {
     if (e.target == modal) {
          modal.style.display = "none";
     }
});

