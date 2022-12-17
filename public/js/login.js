/* selecting html elements */
const showPasswordBtn = document.getElementById('show-pwd');
const usernameInput = document.getElementById('input-uname');
const passwordInput = document.getElementById('input-pwd');
const usernameError = document.querySelector('.err-uname');
const passwordError = document.querySelector('.err-pwd');
const loginBtn = document.getElementById('btn-login');
const loginForm = document.getElementById('login-form');

const userDoctor = document.getElementById("user-doctor");
const userStaff = document.getElementById("user-staff");
const userPharmacist = document.getElementById("user-pharm");
const userAdmin = document.getElementById("user-admin");

const userTypes = document.getElementsByName("user_type");

userTypes[0].checked = true;
userDoctor.classList.add("checked");
userDoctor.style.color = "#ffffff";

function addStyle(element){
     element.classList.add("checked");
     element.style.color = "#ffffff";
}

function removeStyle(element){
     element.classList.remove("checked");
     element.style.color = "#1B9527";
}
userDoctor.addEventListener('click', function (){
     userTypes[0].checked = true;
     addStyle(userDoctor);
     removeStyle(userStaff);
     removeStyle(userPharmacist);
     removeStyle(userAdmin);
});

userStaff.addEventListener('click', function (){
     userTypes[1].checked = true;
     addStyle(userStaff);
     removeStyle(userDoctor);
     removeStyle(userPharmacist);
     removeStyle(userAdmin);
});

userPharmacist.addEventListener('click', function (){
     userTypes[2].checked = true;
     addStyle(userPharmacist);
     removeStyle(userDoctor);
     removeStyle(userStaff);
     removeStyle(userAdmin);
});

userAdmin.addEventListener('click', function (){
     userTypes[3].checked = true;
     addStyle(userAdmin);
     removeStyle(userDoctor);
     removeStyle(userStaff);
     removeStyle(userPharmacist);
});


let isShowing = false;

loginBtn.disable = true;

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

usernameInput.addEventListener('input', function (){
     inputValidate(usernameInput, usernameError, "username cannot be empty");
});

passwordInput.addEventListener('input', function () {
     inputValidate(passwordInput, passwordError, "password cannot be empty");
});

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
     inputField.style.borderBottom = "2px solid #DC3545";
     element.innerHTML = message;
}

function success(inputField,element){
     inputField.style.borderBottom = "2px solid #28A745";
     element.innerHTML = "";
}

function inputValidate(input, inputError, message){
     if(emptyInput(input, inputError, message)){
          error(input, inputError, message);
     }
     else{
          success(input, inputError);
     }
}