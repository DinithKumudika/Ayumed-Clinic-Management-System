<!DOCTYPE html>
<html>
     <?php require APP_ROOT . '/views/layout/header.php' ?>
     <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/pharmacistlogin.css">
     <title>Pharmacist Login</title>
</head>

<body>
     <div class="container">
          <div class="grid-container">
               <div class="item1 grid-row">
                    <form action="login.php" method="post" id="form" class="login-form grid-row">
                         <img src="<?php echo URL_ROOT; ?>/images/logo.png" alt="logo" class="logo">
                         <div class=" form-content">
                              <h1 class="topic">Pharmacist Login</h1>
                              <h4>Username</h4>
                              <input type="text" id="username" class="form-input" placeholder="username" />
                              <p id="username_error"></p>
                         </div>
                         <div class=" form-content">
                              <h4>Password</h4>
                              <input type="password" id="password" class="form-input" placeholder="password" />
                              <p id="password_error"></p>
                         </div>

                         <div class="checkbox">
                              <input type="checkbox" id="rememebr_me" value="remember" /><label>Remember me</label> <input type="checkbox" id="show_password" onclick="myFunction()" value="show" /><label>Show
                                   password</label>
                         </div>

                         <div>
                              <input type="submit" class="login-btn" value="Log in" id="login-btn" onclick="validate()" />
                         </div>
                         <div class="link forgot-password"><a href="reset password">Forgot password?</a></div>
                         <div class="link sign-up">Not a member?<a href="signup.php">Sign up</a></div>
                    </form>
               </div>
          </div>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/pharmacistlogin.js"></script>
</body>
</html>
