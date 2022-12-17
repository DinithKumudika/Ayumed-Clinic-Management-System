/*const form = document.getElementById('form');
const username = document.getElementById('userName');
const email = document.getElementById('email');
const fname = document.getElementById('fName');
const lname = document.getElementById('lName');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    checkInputs();

} );

function checkInputs(){
    //get the values from the inputs
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const fnameValue = fname.value.trim();
    const lnameValue = lname.value.trim();
    const passwordValue = password.value.trim();
    const cpasswordValue = cpassword.value.trim();

    if(usernameValue ===''){
        //show error
        //add error class
        setErrorFor(username, 'User name can not be empty');
    }else{
        //add success class
        setSuccessFor(username);
    }


    if(emailValue === '') {
        setErrorFor(email, 'Email cannot be empty');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
    } else {
        setSuccessFor(email);
    }


    if(fnameValue ===''){
        setErrorFor(fname, 'First name can not be empty');
    }else{
        setSuccessFor(fname);
    }


    if(lnameValue ===''){
        setErrorFor(lname, 'Last name can not be empty');
    }else{
        setSuccessFor(lname);
    }


    if(passwordValue === '') {
        setErrorFor(password, 'Password cannot be empty');
    } else {
        setSuccessFor(password);
    }
    

    if(cpasswordValue === '') {
        setErrorFor(cpassword, 'Enter the password again');
    } else if(passwordValue !== cpasswordValue) {
        setErrorFor(cpassword, 'Passwords does not match');
    } else{
        setSuccessFor(cpassword);
    }

}

function setErrorFor(input, message){
    const formControl = input.parentElement;//form-control
    const p=formControl.querySelector('p');

    //add error message inside p
    p.innerText = message;

    //add error class
    formControl.className = 'form-control error';
}

function setSuccessFor(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
*/



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

const showPasswordBtn = document.getElementById('show-pwd');
const showRepeatPasswordBtn = document.getElementById('show-pwd-repeat');



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

let isShowingPwd = false;

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


// submit registration form
signupBtn.addEventListener('click', function () {
    if (isFormValid()) {
        // console.log("Clicked");
        signupForm.submit();
    }
});




