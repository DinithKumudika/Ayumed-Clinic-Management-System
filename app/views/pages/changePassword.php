<?php require APP_ROOT . '/views/layout/header.php' ?>
<title>Reset Password</title>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/forgotPassword.css">
</head>
<body>
<div class="container col-2">
    <div class="img-container">
        <img src="<?php echo URL_ROOT; ?>/images/forgot.jpg" alt="" class="signup-img">
    </div>
    <div class="signup-container">
        <div class="header">
            <img src="<?php echo URL_ROOT; ?>/images/logo.png" alt="">
            <h1>Reset Password</h1>
        </div>
        <form class="form signup-form" method="POST" id="reset-pwd-form" action="<?php echo URL_ROOT ?>/user/password/reset/<?php echo $data['token']?>">
            <?php if(isset($data['token_invalid'])){ ?>
                <?php if($data['token_invalid']) { ?>
                    <div class="token-alert">The Password Reset link is expired or invalid.
                        <a href="">request new token</a>
                    </div>
                <?php } ?>
            <?php } ?>
            <h5 class="forgot-header">Enter your new password below</h5>
            <div class="form-body" id="first">
                <div class="form-group">
                    <h5>Password</h5>
                    <input type="password" id="new-password" name="new-password" class="form-input" value="<?php echo $data['password'] ?>">
                </div>
                <p class="err-signup" id="err-password"><?php echo $data['error'] ?></p>
                <div class="form-group">
                    <h5>Repeat Password</h5>
                    <input type="password" id="repeat-new-password" name="repeat-new" class="form-input">
                </div>
                <p class="err-signup" id="err-repeat-password"></p>
                <div style="text-align: left;">
                    <?php if(isset($data['token_invalid'])){ ?>
                        <?php if($data['token_invalid']) { ?>
                            <input type="submit" class="btn change-pwd-btn" id="btn-reset-pwd" value="Reset Password" disabled>
                        <?php } else { ?>
                            <input type="submit" class="btn change-pwd-btn" id="btn-reset-pwd" value="Reset Password">
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>
<footer>
    <div class="footer"><p class="copyright">&copy;2022 - Ayumed | All Rights Reserved | Developed by Group 17 - IS</p></div>
</footer>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/resetPassword.js"></script>
</body>
</html>
