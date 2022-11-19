const firstNextBtn = document.getElementById('btn-next-1');
const secondNextBtn = document.getElementById('btn-next-2');

const firstBackBtn = document.getElementById('btn-back-1');
const secondBackBtn = document.getElementById('btn-back-2');

const signupBtn = document.getElementById('btn-signup');
const signupForm = document.getElementById('signup-form');

const progressText = document.getElementById('form-step-text');

const first = document.getElementById('first');
const second = document.getElementById('second');
const third = document.getElementById('third');

const progressBars = document.querySelectorAll('.step');

const showPasswordBtn = document.getElementById('show-pwd');
const showRepeatPasswordBtn = document.getElementById('show-pwd-repeat');

const firstNameInput = document.getElementById('input-fname');
const lastNameInput = document.getElementById('input-lname');
const dobInput = document.getElementById('input-dob');
const genderInput = document.querySelectorAll('.input-gender');
const nicInput = document.getElementById('input-nic');
const addressInput = document.getElementById('input-address');
const emailInput = document.getElementById('input-email');
const phoneNoInput = document.getElementById('input-phone');
const usernameInput = document.getElementById('input-uname');
const passwordInput = document.getElementById('input-pwd');
const repeatPasswordInput = document.getElementById('input-pwd-repeat');

// error elements
const firstNameErr = document.getElementById('err-fname');
const lastNameErr = document.getElementById('err-lname');
const dobErr = document.getElementById('err-dob');
const nicErr = document.getElementById('err-nic');
const addressErr = document.getElementById('err-address');
const emailErr = document.getElementById('err-email');
const phoneErr = document.getElementById('err-phone');
const usernameErr = document.getElementById('err-uname');
const passwordErr = document.getElementById('err-password');
const passwordRepeatErr = document.getElementById('err-password-repeat');

setCurrentDate();

let progressCount = 1;
progressBars[0].style.backgroundColor = "#19A627";

// first form step validation
function isFirstFormValid() {
     const firstNameValid = Validate.isFirstNameValid(firstNameInput, firstNameErr);
     const lastNameValid = Validate.isLastNameValid(lastNameInput, lastNameErr);
     const dobValid = Validate.isDOBValid(dobInput, dobErr);
     const nicValid = Validate.isNicValid(nicInput, nicErr);

     if (!firstNameValid && !lastNameValid && !dobValid && !nicValid) {
          return false;
     }
     else if (!firstNameValid) {
          return false;
     }
     else if (!lastNameValid) {
          return false;
     }
     else if (!dobValid) {
          return false;
     }
     else if (!nicValid) {
          return false;
     }
     else {
          return true;
     }
}

// second form step validation
function isSecondFormValid() {
     const addressValid = Validate.isAddressValid(addressInput, addressErr);
     const emailValid = Validate.isEmailValid(emailInput, emailErr);
     const phoneNoValid = Validate.isPhoneNoValid(phoneNoInput, phoneErr);

     if (!emailValid && !phoneNoValid && !addressValid) {
          return false;
     }
     else if (!addressValid) {
          return false;
     }
     else if (!emailValid) {
          return false;
     }
     else if (!phoneNoValid) {
          return false;
     }
     else {
          return true;
     }
}

function isThirdFormValid() {
     const usernameValid = Validate.isUsernameValid(usernameInput, usernameErr);
     const passwordValid = Validate.isPasswordValid(passwordInput, passwordErr);
     const passwordMatch = Validate.isPasswordMatch(repeatPasswordInput, passwordInput, passwordRepeatErr);

     if (!usernameValid && !passwordValid && !passwordMatch) {
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

// show 2nd step of form on click next
firstNextBtn.addEventListener('click', function () {
     if (isFirstFormValid()) {
          nextFormStep(first, second);
     }
});

// show 3rd step of form on click next
secondNextBtn.addEventListener('click', function () {
     if (isSecondFormValid()) {
          nextFormStep(second, third);
     }
});

// submit registration form
signupBtn.addEventListener('click', function () {
     if (isThirdFormValid()) {
          signupForm.submit();
          Swal.fire(
               
          );
     }
});

//show 1st step of form on click back
firstBackBtn.addEventListener('click', function () {
     previousFormStep(first, second);
});


//show 2nd step of form on click back
secondBackBtn.addEventListener('click', function () {
     previousFormStep(second, third);
});

function nextFormStep(currentForm, nextForm) {
     currentForm.style.display = "none";
     nextForm.style.display = "block";
     progressCount = progressCount + 1;
     progressText.innerHTML = "step " + progressCount + " of 3";
     progressBars[progressCount - 2].style.backgroundColor = "#6C757D";
     progressBars[progressCount - 1].style.backgroundColor = "#19A627";
}

function previousFormStep(previousForm, currentForm) {
     previousForm.style.display = "block";
     currentForm.style.display = "none";
     progressCount = progressCount - 1;
     progressText.innerHTML = "step " + progressCount + " of 3";
     progressBars[progressCount - 1].style.backgroundColor = "#19A627";
     progressBars[progressCount].style.backgroundColor = "#6C757D";
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

// set current date as the maximum value of date input
function setCurrentDate() {
     const today = new Date();
     let date = today.getDate();
     let year = today.getFullYear();
     let month = today.getMonth() + 1;

     if (date < 10) {
          date = "0" + date;
     }

     if (month < 10) {
          month = "0" + month;
     }

     dobInput.setAttribute("max", year + "-" + month + "-" + date);
}

//TODO: finish back end of patient registration
//TODO: add margin top to errors for mobile view
//TODO: fix nic validation
