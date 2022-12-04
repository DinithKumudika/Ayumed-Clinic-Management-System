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
               <form class="form signup-form" method="POST" id="forgot-pwd-form" action="<?php echo URL_ROOT ?>/user/register_patient">
                    <div class="form-body" id="first">
                         <div class="form-group">
                              <h5>Username</h5>
                              <input type="text" id="forgot-username" name="username" class="form-input">
                         </div>
                        <p class="err-signup" id="err-username"></p>
                         <div class="form-group">
                              <h5>Email</h5>
                              <input type="email" id="forgot-email" name="email" class="form-input">
                         </div>
                         <p class="err-signup" id="err-email"></p>
                         <p class="err-signup" style="text-align: center;font-size: 20px" id="err-invalid"><?php echo $data['error'];?></p>
                        <div class="btn forgot-pwd-btn" id="btn-forgot-pwd">Confirm</div>
                    </div>
               </form>
          </div>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
     <script src="<?php echo URL_ROOT; ?>/js/signup.js"></script>
</body>

</html>
