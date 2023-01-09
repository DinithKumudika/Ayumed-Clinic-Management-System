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