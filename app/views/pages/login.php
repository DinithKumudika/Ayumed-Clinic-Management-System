    <?php require APP_ROOT . '/views/layout/header.php' ?>
     <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/login.css">
     <title>Login</title>
</head>
<body>
     <div class="container col-2">
         <?php echo \utils\Flash::flash("login_first") ?>
         <?php echo \utils\Flash::flash("logout") ?>
          <div class="img-container">
               <img src="<?php echo URL_ROOT; ?>/images/login.jpg" alt="" class="login-img">
          </div>
          <div class="login-container">
               <form class="form login-form" method="POST" id="login-form" action="">
                   <div class="login-form-header">
                       <img src="<?php echo URL_ROOT ?>/images/logo.png" alt="logo" id="logo">
                       <h2>Log In</h2>
                   </div>
                   <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf_token'] ?>">
                   <div class="user-opt">
                       <div class="user-type-btn btn" id="user-doctor">Doctor</div>
                       <input type="radio" name="user_type" class="user_type" value="doctor" checked>
                       <div class="user-type-btn btn" id="user-staff">Staff</div>
                       <input type="radio" name="user_type" class="user_type" value="staff">
                       <div class="user-type-btn btn" id="user-pharm">Pharmacist</div>
                       <input type="radio" name="user_type" class="user_type" value="pharm">
                       <div class="user-type-btn btn" id="user-admin">Admin</div>
                       <input type="radio" name="user_type" class="user_type" value="admin">
                   </div>
                    <div class="form-group">
                         <div class="input-group">
                             <input type="text" name="username" id="input-uname" class="form-control">
                             <h5 class="lbl-uname">Username</h5>
                         </div>
                         <p class="err-uname err-login"><?php echo $data['error_uname']; ?></p>
                    </div>
                    <div class="form-group">
                         <div class="input-group">   
                              <input type="password" name="password" id="input-pwd" class="form-control">
                              <h5 class="lbl-pwd">Password</h5>
                             <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i>
                         </div>
                         <p class="err-pwd err-login"><?php echo $data['error_pwd']; ?></p>
                    </div>
                   <div class="remember-me">
                       <?php if(isset($_POST['remember_me'])){ ?>
                           <input type= "checkbox" name="remember_me" id="remember_me_check" checked>
                       <?php } else { ?>
                           <input type= "checkbox" name="remember_me" id="remember_me_check">
                       <?php } ?>
                       <span>Remember Me</span>
                   </div>
                    <div class="forgot-pwd">
                         <a href="<?php echo URL_ROOT ?>/user/password/forgot">Forgot Password?</a>
                    </div>
                    <div class="btn login-btn" id="btn-login">login</div>
               </form>
          </div>
     </div>
     <?php
     if(!empty($data['error_uname'])){
         echo "<script type='text/javascript'>
          document.getElementById('input-uname').style.borderBottom = '2px solid #DC3545';
          </script>";
     }
     else{
         echo "<script>
          document.getElementById('input-uname').style.borderBottom = '2px solid #28A745';
          </script>";
     }

     if(!empty($data['error_pwd'])){
         echo "<script>
          document.getElementById('input-pwd').style.borderBottom = '2px solid #DC3545';
          </script>";
     }
     else{
         echo "<script>
          document.getElementById('input-pwd').style.borderBottom = '2px solid #28A745';
          </script>";
     }
     ?>
     <div class="footer"><p class="copyright">&copy;2022 - Ayumed | All Rights Reserved | Developed by Group 17 - IS</p></div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/login.js"></script>
</body>
</html>