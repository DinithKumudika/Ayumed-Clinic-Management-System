<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<<<<<<< Updated upstream
    <link rel="stylesheet" href="login.css" />
=======
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/public/css/pharmacistlogin.css">
>>>>>>> Stashed changes
    <title>login page</title>
</head>

<body>
    <div class="container">
        <div class="grid-container">
            <div class="item1 grid-row">
<<<<<<< Updated upstream
                <form action="pharmacistlogin.php" method="post" id="form" class="login-form grid-row">
                    <img src="images/logo.png" alt="logo" class="logo">
                    <div class=" form-content">
                        <h1 class="topic">Pharmacist Login</h1>
                        <h4>Username</h4>
                        <input type="text" id="username" class="form-input" placeholder="username" />
=======
                <form action="<?php echo URL_ROOT; ?>/user/pharmacistlogin" method="post" id="form" class="login-form grid-row">
                    <img src="../images/logo.png" alt="logo" class="logo">
                    <div class=" form-content">
                        <h1 class="topic">Pharmacist Login</h1>
                        <h4>Username</h4>
                        <input type="text" id="username" name="username" class="form-input" placeholder="username" />
>>>>>>> Stashed changes
                        <p id="username_error"></p>
                    </div>
                    <div class=" form-content">
                        <h4>Password</h4>
<<<<<<< Updated upstream
                        <input type="password" id="password" class="form-input" placeholder="password" />
=======
                        <input type="password" id="password" name="password" class="form-input" placeholder="password" />
>>>>>>> Stashed changes
                        <p id="password_error"></p>
                    </div>

                    <div class="checkbox">
                        <input type="checkbox" id="rememebr_me" value="remember" /><label>Remember me</label> <input
                            type="checkbox" id="show_password" onclick="myFunction()" value="show" /><label>Show
                            password</label>
                    </div>

                    <div>
<<<<<<< Updated upstream
                        <input type="submit" class="login-btn" value="Log in" id="login-btn" onclick="validate()" />
=======
                       <input type="submit" class="login-btn" value="Log in" id="login-btn"  onclick="validate()" />
>>>>>>> Stashed changes
                    </div>
                    <div class="link forgot-password"><a href="reset password">Forgot password?</a></div>
                    <div class="link sign-up">Not a member?<a href="signup.php">Sign up</a></div>
                </form>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>

</html>