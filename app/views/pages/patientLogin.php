<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT?>/css/patientLogin.css">
<title>Patient Login</title>
</head>

<body>
<?php echo \utils\Flash::flash('logout'); ?>
<?php echo \utils\Flash::flash("login_first") ?>

<div class="main">

<div class="leftSide">

<img class="side_image" src="<?php echo URL_ROOT ?>/images/side_image.svg" alt="Side Image">

</div>

<div class="rightSide">

<p class="newUserGuide">New User? <a href="<?php echo URL_ROOT ?>/user/register/patient">Sign Up</a></p>

<div class="logoBox"><img class="ayuLogo" src="<?php echo URL_ROOT ?>/images/logo.png" alt="ayumedLogo"></div>
<div class="headingBox"><p class="login">Login</p></div>

<div class="formOuterGroup">

    <form action="<?php echo URL_ROOT?>/user/login/patient" method="POST" id="login-form">
        <input type="radio" name="user_type" class="user_type" value="patient" checked>
        <div class="formInnerGroup">
            <label for="userName" class="label1">User Name</label>
            <input type="text" id=userName name="username" >
            <p class="err-uname err_msg"><?php echo $data['error_uname'] ?></p>
        </div>
        
        <div class="formInnerGroup">
            <label for="password" class="label1">Password</label>
            <input type="password" id=password name="password" >
            <p class="err-pwd err_msg"><?php echo $data['error_pwd'] ?></p>
        </div>


        <div class="formInnerGroup">
            <label for="rememberMe" class="label2">Remember me</label>
            <input type="checkbox" id=rememberMe name="rememberMe">
        </div>
    
        <!--<input type="submit" class="login_btn" id="submit" name="submit" value="LOGIN">-->
        <div class="login_btn" id="btn-login">LOGIN</div>

        <a class="passwordGuide"href="#">Forgot Password?</a>

    </form>
</div>
</div>

</div>

<script src="<?php echo URL_ROOT; ?>/js/patient_login.js"></script>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
</body>
</html>