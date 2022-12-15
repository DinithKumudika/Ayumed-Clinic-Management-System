<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/staffRegister.css">
<title>Staff Sign Up</title>
</head>
<body>
<div id="registration">
    <?php echo \utils\Flash::flash("reg_error");  ?>
    <h2>
        <div class="sec-name">Sign Up</div>
    </h2>
    <div class="reg-page">
        <div>
            <div>
                <form action="<?php echo URL_ROOT ?>/user/register_staff" method="POST" class="form" id="staff-signup-form">
                    <div>
                        <label for="first_name">First Name</label>
                        <input type="text" placeholder="First Name" name="first_name" id="first_name">
                        <p style="color: red; text-align: center" id="error-fname"></p>
                    </div>
                    <div>
                        <label for="last_name">Last Name</label>
                        <input type="text" placeholder="Last Name" name="last_name" id="last_name">
                        <p style="color: red; text-align: center" id="error-lname"></p>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" id="email">
                        <p style="color: red; text-align: center" id="error-email"></p>
                        <small>We'll never share your email with anyone else.</small>
                    </div>
                    <div>
                        <label for="staff_no">Staff No</label>
                        <input type="text" placeholder="Staff No" name="staff_no" id="staff_no">
                        <p style="color: red; text-align: center" id="error-staff-no"></p>
                    </div>
                    <div>
                        <label for="username">Username</label>
                        <input type="text" placeholder="Username" name="username" id="username">
                        <p style="color: red; text-align: center" id="error-username"></p>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" placeholder="Password" name="password" id="password">
                        <p style="color: red; text-align: center" id="error-password"></p>
                    </div>
                    <div>
                        <label for="c-password">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="c-password" id="c-password">
                        <p style="color: red; text-align: center" id="error-c-password"></p>
                    </div>
                    <div name="signup" id="staff-signup-btn">Sign Up</div>
                    <em style="font-size:10px;">Note - By clicking Sign Up, you agree to our Terms and Policy.</em>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/layout/footer.php' ?>
<script src="<?php echo URL_ROOT; ?>/js/staffRegister.js"></script>
</body>
</html>