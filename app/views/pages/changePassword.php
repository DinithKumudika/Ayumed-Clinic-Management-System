<?php require APP_ROOT . '/views/layout/header.php' ?>
<title>Change Password</title>
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
            <h1>Change Password</h1>
        </div>
        <form class="form signup-form" method="POST" id="forgot-pwd-form" action="<?php echo URL_ROOT ?>/user/password/change">
            <h5 class="forgot-header">Enter your new password below</h5>
            <div class="form-body" id="first">
                <div class="form-group">
                    <h5>Password</h5>
                    <input type="password" id="new-password" name="new-password" class="form-input">
                </div>
                <p class="err-signup" id="err-password"></p>
                <div class="form-group">
                    <h5>Repeat Password</h5>
                    <input type="password" id="repeat-new-password" name="repeat-new" class="form-input">
                </div>
                <p class="err-signup" id="err-repeat-password"></p>
                <p class="err-signup" style="text-align: center;font-size: 20px" id="err-invalid"><?php echo $data['error'];?></p>
                <div class="btn change-pwd-btn" id="btn-change-pwd">Reset Password</div>
            </div>
        </form>
    </div>
</div>
<footer>
    <div class="footer"><p class="copyright">&copy;2022 - Ayumed | All Rights Reserved | Developed by Group 17 - IS</p></div>
</footer>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
</body>
</html>
