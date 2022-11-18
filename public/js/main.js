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
