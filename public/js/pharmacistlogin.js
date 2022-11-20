
//Validate Code for inputs

<<<<<<< HEAD
// const username = document.getElementById("username");
// const password = document.getElementById("password");

// const usernameError = document.getElementById("username_error");
// const passwordError = document.getElementById("password_error");
// const form = document.getElementById("form");
// const loginButton = document.getElementById("login-btn");

// form.addEventListener('submit', function (e) {
//      e.preventDefault();
// });

// function validate() {
//      if (username.value.trim().length === 0) {
//           usernameError.innerHTML = "username is required";
//      }

//      if (password.value.trim().length === 0) {
//           passwordError.innerHTML = "password is required";
//      }
// }

//   function myFunction() {
//        const x = document.getElementById("password");
//        if (x.type === "password") {
//             x.type = "text";
//        } else {
//            x.type = "password";
//        }
//   }

/* selecting html elements */
const showPasswordBtn = document.getElementById('show-pwd');
const username = document.getElementById('username');
const password = document.getElementById('password');
const usernameError = document.querySelector('.username_error');
const passwordError = document.querySelector('.password_error');
const loginBtn = document.getElementById('btn-login');
const loginForm = document.getElementById('form');

let isShowing = false;

 //show password option
 showPasswordBtn.addEventListener('click',()=>{
      if (!isShowing){
           showPasswordBtn.classList.remove("fa-eye");
           showPasswordBtn.classList.add("fa-eye-slash");
           password.type = "text";
           isShowing = true;
      }
      else{
           showPasswordBtn.classList.remove("fa-eye-slash");
           showPasswordBtn.classList.add("fa-eye");
           password.type = "password";
           isShowing = false;
      }
 });


/* stop default behavior of login form on submit */
// loginForm.addEventListener('submit',(e)=>{
//      e.preventDefault();
// });

//input validation
loginBtn.addEventListener('click',()=>{
     if(isValidated()){
          loginForm.submit();
     }
});

function isValidated(){
     if(!usernameValidate() && !passwordValidate()){
          return false;
     }
     else if(!usernameValidate()){
          return false;
     }
     else if(!passwordValidate()){
          return false;
     }
     else{
          return true;
     }
}

/* check for empty input fields */
function emptyInput(inputField){
     if(inputField.value.trim() === ''){
          return true;
     }
     else{
          return false;
     }
}
function error(inputField,element,message){
     inputField.style.border= "2px solid #DC3545";
     element.innerHTML = message;
}

function success(inputField,element,message){
     inputField.style.border = "2px solid #28A745";
     element.innerHTML = message;
}

function usernameValidate(){
     if(emptyInput(username)){
          error(username, usernameError, "username is required");
          return false;
     }
     else{
          success(username, usernameError,"");
          return true;
     }
}

function passwordValidate(){
     if(emptyInput(password)){
          error(password , passwordError, "password is required");
          return false;
     }
     else{
          success(password, passwordError,"");
          return true;
     }
}
=======
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
>>>>>>> main
