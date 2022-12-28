// sidebar
const menuBtn = document.getElementById("menu-btn");
const sidebar = document.querySelector(".side-nav-container");

menuBtn.addEventListener('click', function () {
    sidebar.classList.toggle("active");
});

//logout
const logout = document.getElementById("logout");
const logoutBtn = document.getElementById("logout-btn");

logoutBtn.addEventListener('click', function () {
    logout.submit();
});


//register service worker
// if(`serviceWorker` in navigator){
//      navigator.serviceWorker.register('http://localhost/ayumed/sw.js')
//      .then(function(reg){
//           console.log("service worker registered", reg);
//      })
//      .catch(function(err){
//           console.log("error in registering service worker", err);
//      })
// }

// modal
const modal = document.getElementById("modal");
const openModalBtn = document.querySelector(".modal-active");
const span = document.getElementsByClassName("close")[0];

openModalBtn.addEventListener('click', function () {
    modal.style.display = "block";
});

span.addEventListener('click', function () {
    modal.style.display = "none";
});

window.addEventListener('click', function (e) {
    if (e.target == modal) {
        modal.style.display = "none";
    }
});


function ajax(url, method, resDateType) {
    return $.ajax({
        url: url,
        type: method,
        dataType: resDateType,
    }).then(function (response) {
         return {
              response: response,
              status: 200
         };
    }, function (xhr, status, error) {
        return {
             response: xhr.responseText,
             status: xhr.status
        };
    });
}

