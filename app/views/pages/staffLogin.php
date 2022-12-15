<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" type="text/css" href="<?php echo URL_ROOT; ?>/css/staffLogin.css">
<title>Staff Login</title>
</head>
<body>
<div class="main">
    <div class="left">
    </div>
    <div class="right">
        <h1> Welcome to Ayumed Clinical Management System </h1>
        <div>
            <center><img src="<?php echo URL_ROOT?>/images/logo.png" width="150px" height="150px"></center>
        </div>
        <div class="form" id="staff-login-form">
            <form action="<?php echo URL_ROOT ?>/user/login_staff" method="POST">
                <div>
                    <label for="username"> Username </label>
                    <input type="text" name="Username" placeholder="Username" id="username">
                </div>
                <p style="color: red" id="error-username"></p>
                <br/>
                <div>
                    <label for="password"> Password </label>
                    <input type="password" name="Password" placeholder="Password" id="password">
                </div>
                <p style="color: red" id="error-password"></p>
                <p style="color: red"><?php echo $data['error']; ?>></p>
                <br/><br/><br/><br/>
                <center>
                    <button type="submit" id="login-btn">LOGIN</button>
                </center>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo URL_ROOT; ?>/js/staffLogin.js"></script>
</body>
</html>