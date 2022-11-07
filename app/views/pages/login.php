
<!DOCTYPE html>
<html lang="en">
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/login.css">
     <title> Doctor Login</title>
</head>
<?php
     if(isset($data['error'])){
          echo "<script>
          document.getElementById('input-uname').style.borderBottom = '2px solid #DC3545';
          document.getElementById('input-pwd').style.borderBottom = '2px solid #DC3545'
          </script>";
     }
     else{
          echo "<script>
          document.getElementById('input-uname').style.borderBottom = '2px solid #28A745';
          document.getElementById('input-pwd').style.borderBottom = '2px solid #28A745'
          </script>";
     }
?>
<body>
     <div class="container col-2">
          <div class="img-container">
               <img src="<?php echo URL_ROOT; ?>/images/login.jpg" alt="" class="login-img">
          </div>
          <div class="login-container">
               <form class="form login-form" method="POST" id="login-form" action="<?php echo URL_ROOT ?>/user/login_doctor">
                    <h2>Log In</h2>
                    <div class="form-group">
                         <div class="input-group">
                              <input type="text" name="username" id="input-uname" class="form-control">
                              <h5 class="">Username</h5>   
                         </div>
                         <p class="err-uname err-login"></p>
                    </div>
                    <div class="form-group">
                         <div class="input-group">   
                              <input type="password" name="password" id="input-pwd" class="form-control">
                              <h5 class="">Password</h5>
                              <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i>
                         </div>
                         <p class="err-pwd err-login"></p>
                    </div>
                    <div class="forgot-pwd">
                         <a href="">Forgot Password?</a>
                    </div>
                    <p class="err-login"><?php echo $data['error'] ?></p>
                    <div class="btn login-btn" id="btn-login">login</div>
                    <!-- <input type="submit" class="btn login-btn" value="login" id="btn-login" onsubmit="return isValidated()"> -->
               </form>
          </div>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/login.js"></script>
</body>
</html>