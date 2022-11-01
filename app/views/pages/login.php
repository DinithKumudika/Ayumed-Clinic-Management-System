<?php require APP_ROOT . '/views/layout/header.php' ?>

<body>
     <div class="container col-2">
          <div class="img-container">
               <img src="<?php echo URL_ROOT; ?>/images/login.jpg" alt="" class="login-img">
          </div>
          <div class="login-container">
               <form class="form login-form" method="POST" id="login-form">
                    <h2>Log In</h2>
                    <div class="form-group">
                         <div class="input-group">
                              <input type="text" name="" id="input-uname" class="form-control">
                              <h5 class="">Username</h5>   
                         </div>
                         <p class="err-uname err-login"></p>
                    </div>
                    <div class="form-group">
                         <div class="input-group">   
                              <input type="password" name="" id="input-pwd" class="form-control">
                              <h5 class="">Password</h5>
                              <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i>
                         </div>
                         <p class="err-pwd err-login"></p>
                    </div>
                    <div class="forgot-pwd">
                         <a href="">Forgot Password?</a>
                    </div>
                    <input type="submit" class="btn login-btn" value="login" id="btn-login">
               </form>
          </div>
     </div>
     <script src="<?php echo URL_ROOT; ?>/public/js/login.js"></script>
</body>

</html>