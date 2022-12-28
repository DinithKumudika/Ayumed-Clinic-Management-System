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

const url = window.location.href;

loginForm.setAttribute("action", url);

switch (url) {
     case "http://localhost/ayumed/user/login/doctor":
          userTypes[0].checked = true;
          addStyle(userDoctor);
          removeStyle(userStaff);
          removeStyle(userPharmacist);
          removeStyle(userAdmin);
          break;
     case "http://localhost/ayumed/user/login/staff":
          addStyle(userStaff);
          userTypes[1].checked = true;
          removeStyle(userDoctor);
          removeStyle(userPharmacist);
          removeStyle(userAdmin);
          break;
     case "http://localhost/ayumed/user/login/pharm":
          addStyle(userPharmacist);
          userTypes[2].checked = true;
          removeStyle(userDoctor);
          removeStyle(userStaff);
          removeStyle(userAdmin);
          break;
     case "http://localhost/ayumed/user/login/admin":
          addStyle(userAdmin);
          userTypes[3].checked = true;
          removeStyle(userDoctor);
          removeStyle(userStaff);
          removeStyle(userPharmacist);
          break;
     case "http://localhost/ayumed/user/login":
          userTypes[0].checked = true;
          addStyle(userDoctor);
          removeStyle(userStaff);
          removeStyle(userPharmacist);
          removeStyle(userAdmin);
          break;
}

function addStyle(element){
     element.classList.add("checked");
     element.style.color = "#ffffff";
}

function removeStyle(element){
     element.classList.remove("checked");
     element.style.color = "#1B9527";
}
userDoctor.addEventListener('click', function (){
     window.location.href = "http://localhost/ayumed/user/login/doctor";
     userTypes[0].checked = true;
});

userStaff.addEventListener('click', function (){
     window.location.href = "http://localhost/ayumed/user/login/staff";
     userTypes[1].checked = true;
});

userPharmacist.addEventListener('click', function (){
     window.location.href = "http://localhost/ayumed/user/login/pharm";
     userTypes[2].checked = true;
});

userAdmin.addEventListener('click', function (){
     window.location.href = "http://localhost/ayumed/user/login/admin";
     userTypes[3].checked = true;
});


let isShowing = false;


// show password option
showPasswordBtn.addEventListener('click',function (){
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

loginBtn.addEventListener('click', function () {
     const validUsername = validInput(usernameInput, usernameError, "username is required");
     const validPassword = validInput(passwordInput, passwordError, "password is required");

     if(validUsername && validPassword){
          loginForm.submit();
     }
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
function showError(inputField,element,message){
     inputField.style.borderBottom = "2px solid #DC3545";
     element.innerHTML = message;
}

function showSuccess(inputField,element){
     inputField.style.borderBottom = "2px solid #28A745";
     element.innerHTML = "";
}

function validInput (input, error, $message){
     if(emptyInput(input)){
          showError(input, error, $message);
          return false;
     }
     else{
          showSuccess(input, error);
          return true;
     }
}