const username = document.getElementById('username');
const password = document.getElementById('password');
const loginBtn = document.getElementById('login-btn');
const usernameError = document.getElementById("error-username");
const passwordError = document.getElementById("error-password");
const loginForm = document.getElementById('staff-login-form');


function emptyInput(inputField){
    if(inputField.value.trim() === ''){
        return true;
    }
    else{
        return false;
    }
}
function error(inputField,element,message){
    inputField.style.border = "3px solid #DC3545";
    element.innerHTML = message;
}

function success(inputField,element,message){
    inputField.style.border = "3px solid #28A745";
    element.innerHTML = message;
}

function usernameValidate(){
    if(emptyInput(username)){
        error(username, usernameError, "Username cannot be empty");
        return false;
    }
    else{
        success(username, usernameError,"");
        return true;
    }
}

function passwordValidate(){
    if(emptyInput(password)){
        error(password, passwordError, "Password cannot be empty");
        return false;
    }
    else{
        success(password, passwordError,"");
        return true;
    }
}

function validateForm(){
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

loginForm.addEventListener('submit',function (e){
    if(validateForm()){
        loginForm.submit();
    }
    else{
        e.preventDefault();
    }
});