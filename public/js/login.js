const showPasswordBtn = document.getElementById('show-pwd');
const usernameInput = document.getElementById('input-uname');
const passwordInput = document.getElementById('input-pwd');
const usernameError = document.querySelector('.err-uname');
const passwordError = document.querySelector('.err-pwd');
const loginBtn = document.getElementById('btn-login');
const loginForm = document.getElementById('login-form');
let isShowing = false;

// show password option
showPasswordBtn.addEventListener('click',()=>{
     if (!isShowing){
          showPasswordBtn.classList.remove("fa-eye");
          showPasswordBtn.classList.add("fa-eye-slash");
          passwordInput.type = "text";
          isShowing = true;
     }
     else{
          showPasswordBtn.classList.remove("fa-eye-slash");
          showPasswordBtn.classList.add("fa-eye");
          passwordInput.type = "password";
          isShowing = false;
     }
});


/* stop default behavior of login form on submit */
loginForm.addEventListener('submit',(e)=>{
     e.preventDefault();
});

//input validation
loginBtn.addEventListener('click',()=>{
     
     validate();
});

function validate(){
     usernameValidate();
     passwordValidate();
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

function validInputLength(inputField){
     if(inputField.value.length>=8 && inputField.value.length<=16){
          return true;
     }
     else{
          return false;
     }
}

function error(inputField,element,message){
     inputField.style.borderBottom = "2px solid #DC3545";
     element.innerHTML = message;
}

function success(inputField,element,message){
     inputField.style.borderBottom = "2px solid #28A745";
     element.innerHTML = message;
}

function usernameValidate(){
     if(emptyInput(usernameInput)){
          error(usernameInput, usernameError, "username cannot be empty");
     }
     else{
          success(usernameInput, usernameError,"");
     }
}

function passwordValidate(){
     if(emptyInput(passwordInput)){
          error(passwordInput , passwordError, "password cannot be empty");
     }
     else{
          success(passwordInput, passwordError,"");
     }
}