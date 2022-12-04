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
         <?php echo \utils\Flash::flash("login_first") ?>
          <div class="img-container">
               <img src="<?php echo URL_ROOT; ?>/images/login.jpg" alt="" class="login-img">
          </div>
          <div class="login-container">
               <form class="form login-form" method="POST" id="login-form" action="<?php echo URL_ROOT ?>/user/login_doctor">
                   <div class="login-form-header">
                       <img src="<?php echo URL_ROOT ?>/images/logo.png" alt="logo" id="logo">
                       <h2>Log In</h2>
                   </div>
                    <div class="form-group">
                         <div class="input-group">
                              <input type="text" name="username" id="input-uname" class="form-control">
                              <h5 class="lbl-uname">Username</h5>   
                         </div>
                         <p class="err-uname err-login"></p>
                    </div>
                    <div class="form-group">
                         <div class="input-group">   
                              <input type="password" name="password" id="input-pwd" class="form-control">
                              <h5 class="lbl-pwd">Password</h5>
                              <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i>
                         </div>
                         <p class="err-pwd err-login"></p>
                    </div>
                   <div class="remember-me">
                       <input type= "checkbox" name="remember_me" id="remember_me_check">
                       <span>Remember Me</span>
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