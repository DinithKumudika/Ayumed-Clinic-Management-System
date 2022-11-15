class Validate{

     // empty input validation
     static isRequired(inputField){
          if(inputField.value.trim() === ''){
               return true;
          }
          else{
               return false;
          }
     }

     // input length validation
     static isBetween(inputField, min, max){
          if(inputField.value.length < min || inputField.value.length >  max){
               return false;
          }
          else{
               return true;
          }
     }

     // first name validation
     static isFirstNameValid(inputField, messageEl){

          /* 
               validation rule:
               characters should be only letters in uppercase or lowercase
               should not include white spaces
          */
          const nameRegex = /^[A-Za-z]+$/;

          if(this.isRequired(inputField)){
               this.error(inputField, messageEl, "*first name is required");
               return false;
          }
          else if(!nameRegex.test(inputField.value)){
               this.error(inputField, messageEl, "*invalid first name");
               return false;
          }
          else{
               this.success(inputField, messageEl);
               return true;
          }
     }

     // last name validation
     static isLastNameValid(inputField, messageEl){

          /* 
               validation rule:
               characters should be only letters in uppercase or lowercase
               should not include white spaces
          */
          const nameRegex = /^[A-Za-z]+$/;

          if(this.isRequired(inputField)){
               this.error(inputField, messageEl, "*last name is required");
               return false;
          }
          else if(!nameRegex.test(inputField.value)){
               this.error(inputField, messageEl, "*invalid last name");
               return false;
          }
          else{
               this.success(inputField, messageEl);
               return true;
          }
     }

     static isDOBValid(inputField, messageEl){
          if(this.isRequired(inputField)){
               this.error(inputField, messageEl, "*date of birth is required");
               return false;
          }
          else{
               this.success(inputField, messageEl);
               return true;
          }
     }

     // username validation
     static isUsernameValid(username){
          const usernameRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

          if(usernameRegex.test(username)){
               return true;
          }
          else{
               return false;
          }
     }

     // password validation
     static isPasswordValid(password, passwordField){
          /*
               validation rule:
               at least one lowercase character
               at least one uppercase character
               at least one number
               at least one special character(!,@,#,$,%,^,&,*)
               eight characters or longer
           */
          const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})$/;
          if(this.isRequired(password)){

          }
          else if(passwordRegex.test(password)){
               return true;
          }
          else{
               return false;
          }
     }

     // email validation
     static isEmailValid(email){
          const emailRegex = /[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]/;

          if(emailRegex.test(email)){
               return true;
          }
          else{
               return false;
          }
     }

     // phone number validation
     static isPhoneNoValid(phoneNo){
          /*
               validation rule:
               must contain only number of 10 digits
               must not have white spaces
          */
          const phoneRegex = /^[0-9]*$/;
          
          if(!phoneRegex.test(phoneNo)){
               return false;
          }
          else if(phoneNo.value.length !== 10){
               return false;
          }
          else{
               return true;
          }
     }

     // NIC validation
     static isNicValid(inputField, messageEl){
          /* 
               validation rule:
               must not contain white spaces
               must have either 12 numbers or 10 numbers including letter 'v'
          */
          const nicRegex = /\s/;
          const lastChar = inputField.value.charAt(inputField.value.length-1).toUpperCase();

          if(this.isRequired(inputField)){
               this.error(inputField, messageEl, "*NIC is required");
               return false;
          }
          else if(!nicRegex.test(inputField.value) && (inputField.value.length !== 12 || (inputField.value.length !== 10 && lastChar !== "V"))){
               this.error(inputField, messageEl, "*NIC is invalid");
               return false;
          }
          else{
               this.success(inputField, messageEl);
               return true;
          }
     }

     // confirm password validation
     static isPasswordMatch(password, confirmPassword){
          if(password  === confirmPassword){
               return true;
          }
          else{
               return false;
          }
     }

     static success(inputField, element){
          inputField.style.border = "2px solid #28A745";
          element.innerHTML = "";
     }

     static error(inputField, element, errMessage){
          inputField.style.border = "2px solid #DC3545";
          element.innerHTML = errMessage;
     }
}