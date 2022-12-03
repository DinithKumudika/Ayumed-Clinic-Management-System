<!DOCTYPE html>
<head>
    <title> Pharmacist Signup page</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/pharmacistRegister.css">
    <script src="https://kit.fontawesome.com/3a188ddf79.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
</head>
<body>
<div class="div-main">
        <div class="img-container">
            <img src="<?php echo URL_ROOT; ?>/images/Pharmacistregister.png" alt="" class="signup-img">
        </div>
     <div class="form-container">
        <form action="<?php echo URL_ROOT ?>/user/register_pharm" method="post">
        <div>
            <img src="../images/logo.png" alt="logo" class="logo">
            </div>
            <div>
            <h2>Create An Account</h2>
            <hr>
            <div>
            <input type="text" placeholder="First name" class="form-input" name="f-name" id="f-name">
            </div>
            <p class="err-reg" id="err-fname"></p>
            <div>
            <input type="text" placeholder="Last name" class="form-input" name="l-name" id="l-name">
            </div>
            <p class="err-reg" id="err-lname"></p>
            <div>
            <input type="email" placeholder="E-mail" class="form-input" name="e-mail" id="e-mail">
            </div>
            <p class="err-reg" id="err-email"></p>
            <div>
            <input type="text" placeholder="Phone no" class="form-input" name="phone" id="phone">
            </div>
            <p class="err-reg" id="err-phone"></p>
            <div>
            <input type="text" placeholder="Username" class="form-input" name="username" id="username">
            </div>
            <p class="err-reg" id="err-username"></p>
            <div>
            <input type="password" placeholder="Password" class="form-input" name="password" id="password">
            <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i> 
            </div>
            <p class="err-reg" id="err-password"></p>
            <div>
            <input type="password" placeholder="Confirm password"  class="form-input" name="confirm_password"  id="confirm_password" />
            <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd-repeat"></i>    
            </div>
            <p class="err-reg" id="err-confirmpassword"></p>
 
           <!-- <input type="submit" value="Sign up" class="signup_button" name="signup" id="signup-btn"> -->
            <div class="signup_button" id="signup-btn">Register</div>
            </div>
           
        
        </form>
        
        <div class="not-member">
            Already a member? <a href="<?php echo URL_ROOT; ?>/user/login_pharm">Login</a>
        </div>
</div>
    </div>
</div>
    <script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
    <script src="<?php echo URL_ROOT; ?>/js/pharmacistRegister.js"></script>   
</body>
</html>
