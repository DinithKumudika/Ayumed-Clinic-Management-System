
//Validate Code for inputs

const username = document.getElementById("username");
const password = document.getElementById("password");

const usernameError = document.getElementById("username_error");
const passwordError = document.getElementById("password_error");
const form = document.getElementById("form");
const loginButton = document.getElementById("login-btn");

form.addEventListener('submit', function (e) {
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

function myFunction() {
     const x = document.getElementById("password");
     if (x.type === "password") {
          x.type = "text";
     } else {
          x.type = "password";
     }
}