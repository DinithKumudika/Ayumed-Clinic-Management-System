const showPasswordBtn = document.getElementById('show-pwd');
const passwordInput = document.getElementById('input-pwd');
let isShowing = false;

// show password option
showPasswordBtn.addEventListener('click',()=>{
     if (!isShowing){
          showPasswordBtn.classList.remove("fa-eye");
          showPasswordBtn.classList.add("fa-eye-slash");
          passwordInput.type = "text";
          isShowing = true;
     }
     else{
          showPasswordBtn.classList.remove("fa-eye-slash");
          showPasswordBtn.classList.add("fa-eye");
          passwordInput.type = "password";
          isShowing = false;
     }
});

//input validation