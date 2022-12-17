//Validate Code for inputs

const name = document.getElementById("name");
const weight = document.getElementById("weight");
const  unit= document.getElementById("unit");
const  category= document.getElementById("category");
const  quantity= document.getElementById("quantity");
const  availability= document.getElementById("availability");

const usernameError = document.getElementById("username_error");
const passwordError = document.getElementById("password_error");
const form = document.getElementById("form");
const loginButton = document.getElementById("login-btn");

form.addEventListener('submit', function(e){
     e.preventDefault();
});

function validate() {
     if (username.value.trim().length === 0) {
          usernameError.innerHTML = "username is required";
     }

     if (password.value.trim().length === 0) {
          passwordError.innerHTML = "password is required";
     }
}
