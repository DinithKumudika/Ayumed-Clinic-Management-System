<?php require APP_ROOT . '/views/layout/header.php' ?>

<body>
     <div class="container">
          <img src="<?php echo URL_ROOT; ?>/images/login.jpg" alt="" class="login-img">
          <div class="login-container">
               <form class="form login-form">
                    <h2>Log In</h2>
                    <div class="form-group">
                         <div class="icon">
                              <i class="fas fa-user"></i>
                         </div>
                         <div>
                              <h5>Username</h5>
                              <input type="text" name="" id="" class="form-control">
                         </div>
                    </div>
                    <div class="form-group">
                         <div class="icon">
                              <i class="fas fa-lock"></i>
                         </div>
                         <div>
                              <h5>Password</h5>
                              <input type="password" name="" id="" class="form-control">
                         </div>
                    </div>
                    <div class="form-group">
                         <input type="checkbox" name="" id="">
                         <h5>Show Password</h5>
                    </div>
                    <a href="">Forgot Password?</a>
                    <input type="submit" class="btn" value="login">
               </form>
          </div>
     </div>
     <script src="<?php URL_ROOT; ?>/public/js/login.js"></script>
</body>

</html>