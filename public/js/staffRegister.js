const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const email = document.getElementById('email');
const staffNo = document.getElementById('staff_no');
const username = document.getElementById('username');
const password = document.getElementById('password');

// error elements
const firstNameErr = document.getElementById('error-fname');
const lastNameErr = document.getElementById('error-lname');
const emailErr = document.getElementById('error-email');
const staffNoErr = document.getElementById('error-staff-no')
const usernameErr = document.getElementById('error-username');
const passwordErr = document.getElementById('error-password');
const confirmPasswordErr = document.getElementById('error-c-password');

const showPasswordBtn = document.getElementById('show-pwd');
const showRepeatPasswordBtn = document.getElementById('show-pwd-repeat');

function validForm() {
    const firstNameValid = Validate.isFirstNameValid(firstName, firstNameErr);
    const lastNameValid = Validate.isLastNameValid(lastName, lastNameErr);
    const emailValid = Validate.isEmailValid(email, emailErr);
    const staffNoValid = Validate.isStaffNoValid(staffNo, staffNoErr);
    const usernameValid = Validate.isUsernameValid(username, usernameErr);
    const passwordValid = Validate.isPasswordValid(password, passwordErr);
    const passwordMatch = Validate.isPasswordMatch(password, confirmPassword, confirmPasswordErr);

    if (!firstNameValid && !lastNameValid && !emailValid && !staffNoValid  && !usernameValid && !passwordValid && !passwordMatch) {
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
    else if (!staffNoValid) {
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

let isShowingPwd = false;

// show/hide password
showPasswordBtn.addEventListener('click', function () {
    isShowingPwd = toggleShowPassword(isShowingPwd, showPasswordBtn, password);
});

let isShowingRepeatPwd = false;

// show/hide confirm password
showRepeatPasswordBtn.addEventListener('click', function () {
    isShowingRepeatPwd = toggleShowPassword(isShowingRepeatPwd, showRepeatPasswordBtn, confirmPassword);
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

signupBtn.addEventListener('click',function (e){
    if(validForm()){
        signupForm.submit();
    }
});
