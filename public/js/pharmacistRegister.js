const firstNameInput = document.getElementById('f-name');
const lastNameInput = document.getElementById('l-name');
const emailInput = document.getElementById('e-mail');
const phoneNoInput = document.getElementById('phone');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const repeatPasswordInput = document.getElementById('confirm_password');


const signupBtn = document.getElementById('signup-btn');

const showPasswordBtn = document.getElementById('show-pwd');
const showRepeatPasswordBtn = document.getElementById('show-pwd-repeat');



// error elements
const firstNameErr = document.getElementById('err-fname');
const lastNameErr = document.getElementById('err-lname');
const emailErr = document.getElementById('err-email');
const phoneErr = document.getElementById('err-phone');
const usernameErr = document.getElementById('err-uname');
const passwordErr = document.getElementById('err-password');
const passwordRepeatErr = document.getElementById('err-confirmpassword');

// Form validation
function isFormValid() {
    const firstNameValid = Validate.isFirstNameValid(firstNameInput, firstNameErr);
    const lastNameValid = Validate.isLastNameValid(lastNameInput, lastNameErr);
    const emailValid = Validate.isEmailValid(emailInput, emailErr);
    const phoneNoValid = Validate.isPhoneNoValid(phoneNoInput, phoneErr);
    const usernameValid = Validate.isUsernameValid(usernameInput, usernameErr);
    const passwordValid = Validate.isPasswordValid(passwordInput, passwordErr);

    if (!firstNameValid && !lastNameValid && !emailValid && !phoneNoValid && !usernameValid && !passwordValid) {
         return false;
    }
    else if (!firstNameValid) {
         return false;
    }
    else if (!lastNameValid) {
         return false;
    }
    else if (!emailValid) {
         return false;
    }
    else if (!phoneNoValid) {
         return false;
    }
    else if (!usernameValid) {
        return false;
   }
    else {
         return true;
    }
}

// submit registration form
signupBtn.addEventListener('click', function () {
    if (isFormValid()) {
         signupForm.submit();
         Swal.fire(
              
         );
    }
});

// show/hide password
showPasswordBtn.addEventListener('click', function () {
    isShowingPwd = toggleShowPassword(isShowingPwd, showPasswordBtn, passwordInput);
});

let isShowingRepeatPwd = false;

// show/hide confirm password
showRepeatPasswordBtn.addEventListener('click', function () {
    isShowingRepeatPwd = toggleShowPassword(isShowingRepeatPwd, showRepeatPasswordBtn, repeatPasswordInput);
});

function toggleShowPassword(isShowing, passwordBtn, input) {
    if (!isShowing) {
         passwordBtn.classList.remove("fa-eye");
         passwordBtn.classList.add("fa-eye-slash");
         input.type = "text";
         return true;
    }
    else {
         passwordBtn.classList.remove("fa-eye-slash");
         passwordBtn.classList.add("fa-eye");
         input.type = "password";
         return false;
    }
}


