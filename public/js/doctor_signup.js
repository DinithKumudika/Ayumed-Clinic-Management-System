
const signupBtn = document.getElementById('btn-signup');
const signupForm = document.getElementById('signup-form');

const firstNameInput = document.getElementById('fName');
const lastNameInput = document.getElementById('lName');
const nicInput = document.getElementById('nic');
const emailInput = document.getElementById('email');
const phoneNoInput = document.getElementById('phone');
const usernameInput = document.getElementById('userName');
const passwordInput = document.getElementById('password');
const repeatPasswordInput = document.getElementById('cpassword');

// error elements
const firstNameErr = document.getElementById('err-fname');
const lastNameErr = document.getElementById('err-lname');
const nicErr = document.getElementById('err-nic');
const emailErr = document.getElementById('err-email');
const phoneErr = document.getElementById('err-phone');
const usernameErr = document.getElementById('err-uname');
const passwordErr = document.getElementById('err-password');
const passwordRepeatErr = document.getElementById('err-password-repeat');



//form  validation
function isFormValid() {
     const firstNameValid = Validate.isFirstNameValid(firstNameInput, firstNameErr);
     const lastNameValid = Validate.isLastNameValid(lastNameInput, lastNameErr);
     const nicValid = Validate.isNicValid(nicInput, nicErr);
     const emailValid = Validate.isEmailValid(emailInput, emailErr);
     const phoneNoValid = Validate.isPhoneNoValid(phoneNoInput, phoneErr);
     const usernameValid = Validate.isUsernameValid(usernameInput, usernameErr);
     const passwordValid = Validate.isPasswordValid(passwordInput, passwordErr);
     const passwordMatch = Validate.isPasswordMatch(repeatPasswordInput, passwordInput, passwordRepeatErr);

    if (!firstNameValid && !lastNameValid && !nicValid && !emailValid && !phoneNoValid && !usernameValid && !passwordValid && !passwordMatch) {
          return false;
    }
    else if (!firstNameValid) {
          return false;
    }
    else if (!lastNameValid) {
          return false;
    }
    else if (!nicValid) {
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
    else if (!passwordValid) {
        return false;
    }
    else if (!passwordMatch) {
        return false;
    }
     else {
          return true;
     }
}


// submit registration form
signupBtn.addEventListener('click', function () {
    if (isFormValid()) {
        console.log("Clicked");
        signupForm.submit();
    }
});