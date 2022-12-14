/*const username = document.querySelector('#userName');
const password = document.querySelector('#password');
const submit = document.querySelector('#submit');
const signupForm = document.getElementById('signup');

signupForm.addEventListener('submit', (event)=>{
    //event.preventDefault();

        //username validation
        if(username.value.trim() === '')
        {
            error(username, 'User name can not be empty');
        }else{
            success(username);
        }

        //password validation
        if(password.value.trim() == '')
        {
            error(password, 'Password can not be empty');
        }else{
            success(password);
        }

});

function error(element, msg){
    element.style.border = '3px #FF0000 solid';
    const parent = element.parentElement;
    const p = parent.querySelector('p');
    p.textContent = msg;
    p.style.visibility = 'visible';
}

function success(element){
    element.style.border = '3px #19a627 solid';
    const parent = element.parentElement;
    const p = parent.querySelector('p');
    p.style.visibility = 'hidden';
}
*/

/* selecting html elements */
/* const showPasswordBtn = document.getElementById('show-pwd');*/
const usernameInput = document.getElementById('userName');
const passwordInput = document.getElementById('password');
const usernameError = document.querySelector('.err-uname');
const passwordError = document.querySelector('.err-pwd');
const loginBtn = document.getElementById('btn-login');
const loginForm = document.getElementById('login-form');

let isShowing = false;

// show password option
/*showPasswordBtn.addEventListener('click',()=>{
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
}); */


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
     inputField.style.borderBottom = "3px solid #DC3545";
     element.innerHTML = message;
}

function success(inputField,element,message){
     inputField.style.borderBottom = "3px solid #28A745";
     element.innerHTML = message;
}

function usernameValidate(){
     if(emptyInput(usernameInput)){
          error(usernameInput, usernameError, "User Name cannot be empty");
          return false;
     }
     else{
          success(usernameInput, usernameError,"");
          return true;
     }
}

function passwordValidate(){
     if(emptyInput(passwordInput)){
          error(passwordInput , passwordError, "Password cannot be empty");
          return false;
     }
     else{
          success(passwordInput, passwordError,"");
          return true;
     }
}