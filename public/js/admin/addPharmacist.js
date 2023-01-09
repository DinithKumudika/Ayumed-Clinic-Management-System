const addBtn = document.getElementById('staff-add-btn');
const addForm = document.getElementById('staff-add-form');

const firstName = document.getElementById('input-fName');
const lastName = document.getElementById('input-lName');
const phoneNo = document.getElementById('input-phone');
const email = document.getElementById('input-email');
const username = document.getElementById('input-uname');
const password = document.getElementById('input-pwd');

const firstNameErr = document.getElementById('err-first-name');
const lastNameErr = document.getElementById('err-last-name');
const phoneNoErr = document.getElementById('err-phone-no');
const emailErr = document.getElementById('err-email');
const usernameErr = document.getElementById('err-uname');
const passwordErr = document.getElementById('err-pwd');

const fistNameValid = function () {
     if (!Validate.isFirstNameValid(firstName, firstNameErr)) {
          return false;
     }
     else {
          return true;
     }
};

const lastNameValid = function () {
     if (!Validate.isLastNameValid(lastName, lastNameErr)) {
          return false;
     }
     else {
          return true;
     }
}

const phoneNoValid = function () {
     if (!Validate.isPhoneNoValid(phoneNo, phoneNoErr)) {
          return false;
     }
     else {
          return true;
     }
}

const emailValid = function () {
     if (!Validate.isEmailValid(email, emailErr)) {
          return false;
     }
     else {
          return true;
     }
}

const usernameValid = function () {
     if (!Validate.isUsernameValid(username, usernameErr)) {
          return false;
     }
     else {
          return true;
     }
}

const passwordValid = function () {
     if (!Validate.isPasswordValid(password, passwordErr)) {
          return false;
     }
     else {
          return true;
     }
}

firstName.addEventListener('keyup', function () {
     fistNameValid();
});

lastName.addEventListener('keyup', function () {
     lastNameValid();
});

phoneNo.addEventListener('keyup', function () {
     phoneNoValid();
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

function isFromValid() {
     if (!fistNameValid() && !lastNameValid() && !phoneNoValid() && !emailValid() && !usernameValid() && !passwordValid()) {
          return false;
     }
     else if (!fistNameValid()) {
          return false;
     }
     else if (!lastNameValid()) {
          return false;
     }
     else if (!phoneNoValid()) {
          return false;
     }
     else if (!emailValid()) {
          return false;
     }
     else if (!usernameValid()) {
          return false;
     }
     else if (!passwordValid()) {
          return false
     }
     else {
          return true;
     }
}

addBtn.addEventListener('click', function (e) {
     e.preventDefault();
     if (isFromValid()) {
          addForm.submit();
     }
})