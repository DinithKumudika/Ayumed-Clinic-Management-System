const signupBtn = document.getElementById('staff-add-btn');
const signupForm = document.getElementById('staff-add-form');

const firstName = document.getElementById('input-fName');
const lastName = document.getElementById('input-lName');
const regNo = document.getElementById('input-regNo');
const email = document.getElementById('input-email');
const username = document.getElementById('input-uname');
const password = document.getElementById('input-pwd');

const firstNameErr = document.getElementById('err-first-name');
const lastNameErr = document.getElementById('err-last-name');
const regNoErr = document.getElementById('err-reg-no');
const emailErr = document.getElementById('err-email');
const usernameErr = document.getElementById('err-uname');
const passwordErr = document.getElementById('err-pwd');

const fistNameValid = function (){
    if(!Validate.isFirstNameValid(firstName, firstNameErr)){
        return false;
    }
    else{
        return true;
    }
};

const lastNameValid = function () {
    if(!Validate.isLastNameValid(lastName, lastNameErr)){
        return false;
    }
    else{
        return true;
    }
}

const regNoValid = function (){
    if(!Validate.isRegNoValid(regNo, regNoErr)){
        return false;
    }
    else{
        return true;
    }
}

const emailValid = function () {
    if(!Validate.isEmailValid(email, emailErr)){
        return false;
    }
    else{
        return true;
    }
}

const usernameValid = function () {
    if(!Validate.isUsernameValid(username, usernameErr)){
        return false;
    }
    else{
        return true;
    }
}

const passwordValid = function () {
    if(!Validate.isPasswordValid(password, passwordErr)){
        return false;
    }
    else{
        return true;
    }
}

firstName.addEventListener('keyup', function (){
    fistNameValid();
});

lastName.addEventListener('keyup', function (){
    lastNameValid();
});

regNo.addEventListener('keyup', function () {
   regNoValid();
});

email.addEventListener('keyup', function () {
    emailValid();
});

username.addEventListener('keyup', function () {
   usernameValid();
});

password.addEventListener('keyup', function () {
    passwordValid();
});

function isFromValid(){
    if(!fistNameValid() && !lastNameValid() && !regNoValid() && !emailValid() && !usernameValid() && !passwordValid()){
        return false;
    }
    else if(!fistNameValid()){
        return false;
    }
    else if(!lastNameValid()){
        return false;
    }
    else if(!regNoValid()){
        return false;
    }
    else if(!emailValid()){
        return false;
    }
    else if(!usernameValid()){
        return false;
    }
    else if(!passwordValid()){
        return false
    }
    else {
        return true;
    }
}

signupBtn.addEventListener('click', function (e){
    e.preventDefault();
    if(isFromValid()){
        signupForm.submit();
    }
})