window.addEventListener('DOMContentLoaded', function (){
    const username = document.getElementById("forgot-username");
    const email = document.getElementById("forgot-email");
    const confirmBtn = document.getElementById("btn-forgot-pwd");
    const usernameErr = document.getElementById("err-username")
    const emailErr = document.getElementById("err-email");
    const forgotPasswordForm = document.getElementById("forgot-pwd-form");

    const usernameValid =  function () {
        if(!Validate.isUsernameValid(username, usernameErr)){
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
    };

    function isForgotFormValid(){
        if(!usernameValid() && !emailValid()){
            return false;
        }
        else if(!usernameValid()){
            return false;
        }
        else if(!emailValid()){
            return false;
        }
        else{
            return true;
        }
    }

    username.addEventListener('keyup',function () {
        usernameValid();
    });

    email.addEventListener('keyup', function () {
        emailValid();
    });

    confirmBtn.addEventListener('click', function () {
       if(isForgotFormValid()){
           forgotPasswordForm.submit();
       }
    });
});