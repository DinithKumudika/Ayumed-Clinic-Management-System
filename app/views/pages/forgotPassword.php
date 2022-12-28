<?php require APP_ROOT . '/views/layout/header.php' ?>
<title>Forgot Password</title>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/forgotPassword.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
     <div class="container col-2">
          <div class="img-container">
               <img src="<?php echo URL_ROOT; ?>/images/forgot.jpg" alt="" class="signup-img">
          </div>
          <div class="signup-container">
               <div class="header">
                    <img src="<?php echo URL_ROOT; ?>/images/logo.png" alt="">
                    <h1>Forgot Password</h1>
               </div>
               <form class="form signup-form" method="POST" id="forgot-pwd-form" action="<?php echo URL_ROOT ?>/user/password/forgot">
                   <h5 class="forgot-header">An email will be sent to you with instructions on how to reset your password</h5>
                    <div class="form-body" id="first">
                         <div class="form-group">
                              <h5>Username</h5>
                              <input type="text" id="forgot-username" name="username" class="form-input" value="<?php echo $data['username'] ?>">
                         </div>
                        <p class="err-signup" id="err-username"></p>
                        <p class="err-signup" id="err-invalid-uname"><?php echo $data['error_uname'];?></p>
                         <div class="form-group">
                              <h5>Email</h5>
                              <input type="email" id="forgot-email" name="email" class="form-input" value="<?php echo $data['email'] ?>">
                         </div>
                         <p class="err-signup" id="err-email"></p>
                         <p class="err-signup" id="err-invalid-email"><?php echo $data['error_email'];?></p>
                        <div class="btn forgot-pwd-btn" id="btn-forgot-pwd">Confirm</div>
                    </div>
               </form>
          </div>
     </div>
     <footer>
         <div class="footer"><p class="copyright">&copy;2022 - Ayumed | All Rights Reserved | Developed by Group 17 - IS</p></div>
     </footer>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
     <script src="<?php echo URL_ROOT; ?>/js/forgotPassword.js"></script>
</body>
</html>
