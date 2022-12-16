<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/3a188ddf79.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/pharmacistlogin.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
    <title>login page</title>
</head>

<?php
     if(isset($data['error'])){
          echo "<script>
          document.getElementById('username').style.borderBottom = '2px solid #DC3545';
          document.getElementById('password').style.borderBottom = '2px solid #DC3545'
          </script>";
     }
     else{
          echo "<script>
          document.getElementById('username').style.borderBottom = '2px solid #28A745';
          document.getElementById('password').style.borderBottom = '2px solid #28A745'
          </script>";
     }
?>

<body>
<!-- <div class="container"> -->
    <div class="grid-container">
           
        <div class="item1">
            <div class="img-container">
            <img src="<?php echo URL_ROOT; ?>/images/pharmacist.png" alt="" class="login-img">
            </div>
            <div class="form-container">
                <form action="<?php echo URL_ROOT; ?>/user/login_pharm" method="post" id="form" class="login-form ">
                    <img src="../images/logo.png" alt="logo" class="logo">
                    <h1 class="topic">Pharmacist Login</h1>
                    <hr>
                    <div class=" form-content">
                        <h4>Username</h4>
                        <input type="text" id="username" name="username" class="form-input" placeholder="username" />
                        <p class="username_error"></p>
                    </div>
                    <div class="form-content">
                        <h4>Password</h4>
                        <input type="password" id="password" name="password" class="form-input" placeholder="password" />
                        <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i> 
                        <p class="password_error"></p>   
                    </div>

                    <!-- <div class="checkbox">
                      <input type="checkbox" id="show_password" onclick="myFunction()" value="show" /><label>Show password</label>
                    </div>  -->

                    <!-- <div>
                       <input type="submit" class="login-btn" value="Log in" id="login-btn"  onclick="validate()" />
                    </div> -->
                    <p class="password_error username_error"><?php echo $data['error'] ?></p>
                    <div class="login-btn" id="btn-login">Login</div>
                    <!-- <div class="forgot-password"><a href="reset password">Forgot password?</a></div> -->
                    <div class="sign-up">Not a member?<a href="<?php echo URL_ROOT?>/user/Register_pharm">Sign up</a></div>
                   
                <!-- <div class="back-btn-container">
                <button class="back-btn">
                <i class="fa-solid fa-backward back-icon"></i></i><a class="back-link" href="<?php echo URL_ROOT?>/user/login">Back</a>
                </button> 
                </div> -->
                </form>
              
            </div>
        </div>
    </div>
<!-- </div> -->
    <script src="<?php echo URL_ROOT; ?>/js/pharmacistlogin.js"></script>
</body>

</html>

