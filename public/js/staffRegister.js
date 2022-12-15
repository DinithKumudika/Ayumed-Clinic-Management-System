const signupBtn = document.getElementById('staff-signup-btn');
const signupForm = document.getElementById('staff-signup-form');

const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const email = document.getElementById('email');
const staffNo = document.getElementById('staff_no');
const username = document.getElementById('username');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('c-password');

// error elements
const firstNameErr = document.getElementById('error-fname');
const lastNameErr = document.getElementById('error-lname');
const emailErr = document.getElementById('error-email');
const staffNoErr = document.getElementById('error-staff-no')
const usernameErr = document.getElementById('error-username');
const passwordErr = document.getElementById('error-password');
const confirmPasswordErr = document.getElementById('error-c-password');

function validForm() {
    const firstNameValid = Validate.isFirstNameValid(firstName, firstNameErr);
    const lastNameValid = Validate.isLastNameValid(lastName, lastNameErr);
    const emailValid = Validate.isEmailValid(email, emailErr);
    //TODO: fix confirm password error not showing
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

signupBtn.addEventListener('click',function (e){
    if(validForm()){
        signupForm.submit();
    }
});
