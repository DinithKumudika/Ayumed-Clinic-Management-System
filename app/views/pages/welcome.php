<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/welcomeScreen.css">
<title>Ayumed | Clinic Management System</title>
</head>
<body>
<div class="welcome-container">
    <div class="logo">
        <img src="<?php echo URL_ROOT ?>/images/logo.png" alt="logo">
    </div>
    <div class="welcome-header">
        <div>Ayumed</div>
        <div><span>Clinic Management System</span></div>
    </div>
    <div class="welcome-btn-group">
        <div class="welcome-btn welcome-login"><a href="<?php echo URL_ROOT ?>/user/login">Log In</a></div>
        <div class="welcome-btn welcome-signup"><a href="<?php echo URL_ROOT ?>/user/register">Sign Up</a></div>
    </div>
</div>
<div class="footer"><p class="copyright">&copy;2022 - Ayumed | All Rights Reserved | Developed by Group 17 - IS</p></div>
<script>

</script>
</body>
</html>
