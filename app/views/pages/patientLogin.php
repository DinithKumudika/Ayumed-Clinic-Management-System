<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT?>/css/patientLogin.css">
<title>Patient Login</title>
</head>
<body>
<?php echo \utils\Flash::flash('verify'); ?>
<?php echo \utils\Flash::flash('logout'); ?>
<?php echo \utils\Flash::flash("login_first") ?>
<div class="leftSide">
<!--    <img class="side_image" src="--><?php //echo URL_ROOT ?><!--/images/side_image.svg" alt="Side Image">-->
</div>
<div class="rightSide">
    <p class="newUserGuide">New User? <a href="#">Sign Up</a></p>

    <div class="logoBox"><img class="ayuLogo" src="<?php echo URL_ROOT ?>/images/logo.png" alt="ayumedLogo"></div>
    <div class="headingBox"><p class="login">Login</p></div>


    <div class="formOuterGroup">

        <form action="<?php echo URL_ROOT?>/user/login_patient" method="post">

            <div class="formInnerGroup">
                <label for="userName" class="label1">User Name</label>
                <input type="text" id= "userName" name="userName" placeholder="Enter your user name">
            </div>

            <div class="formInnerGroup">
                <label for="password" class="label1">Password</label>
                <input type="password" id= "password" name="password" placeholder="Enter your password">
            </div>

            <div class="formInnerGroup">
                <label for="rememberMe" class="label2">Remember me</label>
                <input type="checkbox" id=rememberMe" name="rememberMe">
            </div>

            <input type="submit" class="login_btn" name="submit" value="LOGIN">

            <a class="passwordGuide"href="#">Forgot Password?</a>

        </form>
    </div>
</div>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
</body>
</html>