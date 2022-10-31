<?php require APP_ROOT . '/views/layout/header.php' ?>

<body>
     <div class="container col-2">
          <div class="img-container">
               <img src="<?php echo URL_ROOT; ?>/images/login.jpg" alt="" class="login-img">
          </div>
          <div class="login-container">
               <form class="form login-form">
                    <h2>Log In</h2>
                    <div class="form-group">
                         <!-- <div class="icon">
                              <i class="fas fa-user"></i>
                         </div> -->
                         <div class="input-group">
                              <input type="text" name="" id="" class="form-control">
                              <h5>Username</h5>
                         </div>
                    </div>
                    <div class="form-group">
                         <!-- <div class="icon">
                              <i class="fas fa-lock"></i>
                         </div> -->
                         <div class="input-group">   
                              <input type="password" name="" id="input-pwd" class="form-control">
                              <h5>Password</h5>
                              <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i>
                         </div>
                    </div>
                    <!-- <div class="form-group">
                         <div class="show-pwd-check row">
                              <input type="checkbox" name="" id="">
                              <h5>Show Password</h5>
                         </div>
                    </div> -->
                    <div class="forgot-pwd">
                         <a href="">Forgot Password?</a>
                    </div>
                    <input type="submit" class="btn login-btn" value="login">
               </form>
          </div>
     </div>
     <script src="<?php echo URL_ROOT; ?>/public/js/login.js"></script>
</body>

</html>