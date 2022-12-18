const otpInputs = document.querySelectorAll('.input-boxes input');
const verifyBtn = document.getElementById('otp-btn');
const otpForm = document.getElementById('otp-form');

window.addEventListener('load', function (){
    otpInputs[0].focus();
});

otpInputs.forEach(function (input, index1){
    input.addEventListener("keyup", function (e){
        // current number input
        const currentInput = input;
        // next number input
        const nextInput = input.nextElementSibling;
        // previous number input
        const prevInput = input.previousElementSibling;

        // clear input if input has more than one number
        if(currentInput.value.length > 1){
            currentInput.value = "";
        }

        if(nextInput && nextInput.hasAttribute("disabled") && currentInput.value.length !== ""){
            nextInput.removeAttribute("disabled");
            nextInput.focus();
        }

        if(e.key === "Backspace"){
            otpInputs.forEach(function (input, index2) {
              if(prevInput && index1 <= index2){
                  input.setAttribute("disabled", true);
                  currentInput.value = "";
                  prevInput.focus();
              }
            });
        }

        //if all the inputs are not empty active the verify button
        if(!otpInputs[4].disabled && otpInputs[4].value !== ""){
            verifyBtn.classList.add("btn-active");
        }
        else{
            verifyBtn.classList.remove("btn-active");
        }
    });
});

verifyBtn.addEventListener('click', function (){
    if(verifyBtn.classList.contains("btn-active")){
        otpForm.submit();
    }
});

