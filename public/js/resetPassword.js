window.addEventListener('DOMContentLoaded', function (){
    const resetPasswordForm = document.getElementById("reset-pwd-form");
    const resetPasswordBtn = document.getElementById("btn-reset-pwd");
    const password = document.getElementById("new-password");
    const passwordRepeat = document.getElementById("repeat-new-password");

    const passwordErr = document.getElementById('err-password');
    const passwordRepeatErr = document.getElementById('err-repeat-password');

    const passwordValid =  function () {
        if(!Validate.isPasswordValid(password, passwordErr)){
            return false;
        }
        else{
            return true;
        }
    }

    const passwordMatched =  function () {
        if(!Validate.isPasswordMatch(password, passwordRepeat, passwordRepeatErr)){
            return false;
        }
        else{
            return true;
        }
    }

    function isResetFormValid(){
        if(!passwordValid() && !passwordMatched()){
            return false;
        }
        else if(!passwordValid()){
            return false;
        }
        else if(!passwordMatched()){
            return false;
        }
        else{
            return true;
        }
    }

    password.addEventListener('keyup',function () {
        passwordValid();
    });

    passwordRepeat.addEventListener('keyup', function () {
        passwordMatched();
    });

    resetPasswordBtn.addEventListener('click', function (e) {
        e.preventDefault();

        if(isResetFormValid()){
            resetPasswordForm.submit();
        }
    });
});

