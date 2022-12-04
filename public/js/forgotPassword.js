window.addEventListener('DOMContentLoaded', function (){
    const username = document.getElementById("forgot-username");
    const email = document.getElementById("forgot-email");
    const confirmBtn = document.getElementById("btn-forgot-pwd");
    const usernameErr = document.getElementById("err-username")
    const emailErr = document.getElementById("err-email");
    const forgotPasswordForm = document.getElementById("forgot-pwd-form");

    function isForgotFormValid(){
        const usernameValid =  function () {
            if(Validate.isRequired(username)){
                Validate.error(username, usernameErr, "*username is required");
                return false;
            }
            else{
                Validate.success(username, usernameErr);
                return true;
            }
        }
        const emailValid = Validate.isEmailValid(email, emailErr);

        if(!usernameValid() && !emailValid){
            return false;
        }
        else if(!usernameValid()){
            return false;
        }
        else if(!emailValid){
            return false;
        }
        else{
            return true;
        }
    }

    confirmBtn.addEventListener('click', function () {
       if(isForgotFormValid()){
           forgotPasswordForm.submit();
       }
    });
});