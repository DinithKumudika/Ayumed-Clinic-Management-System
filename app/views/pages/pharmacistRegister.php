<!DOCTYPE html>
<head>
    <title> Pharmacist Signup page</title>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/pharmacistRegister.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
</head>
<body>
    <div class="div-main">
        <div class="img-container">
            <img src="<?php echo URL_ROOT; ?>/images/Pharmacistregister.png" alt="" class="signup-img">
        </div>
        <div class="form-container">
        <form action="<?php echo URL_ROOT ?>/user/register_pharm" method="post">
            <div>
            <img src="../images/logo.png" alt="logo" class="logo">
            </div>
            <div>
            <h1>Sign up</h1>
            <hr>
            <input type="text" placeholder="First name" class="form-input" name="f-name" id="f-name">
            <input type="text" placeholder="Last name" class="form-input" name="l-name" id="l-name">
            <input type="email" placeholder="E-mail" class="form-input" name="e-mail" id="e-mail">
            <input type="text" placeholder="Phone no" class="form-input" name="phone" id="phone">
            <input type="text" placeholder="Username" class="form-input" name="username" id="username">
            <input type="password" placeholder="Password" class="form-input" name="password" id="password">
            <input type="submit" value="Sign up" class="button" name="signup">
            </div>
        </form>
        
        <div class="not-member">
            Already a member? <a href="<?php echo URL_ROOT; ?>/user/login_pharm">Login</a>
        </div>
</div>
    </div>
    
</body>
</html>
