<!DOCTYPE html>
<html lang="en">
<head>
    <?php require APP_ROOT . '/views/layout/header.php' ?>

    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/doctorRegister.css">


    <title>Doctor Sign Up</title>
</head>
<body>

<div class="main">

    <img src="<?php echo URL_ROOT ?>/images/logo.png" alt=" Ayumed Logo">

    <p class="signup-title">Doctor Sign Up</p>

    <p class="UserGuide">Already have an account? <a href="<?php echo URL_ROOT; ?>/User/login_doctor">Log In</a></p>

    

        <form action="<?php echo URL_ROOT ?>/User/register_doctor" method="POST" class="form" id="signup-form">

            <div class="innerForm">

                <div class= "left_form">

                    <div class=form-control>
                        <label for="userName">User Name</label><br>
                        <input type="text" id="userName" name="userName">
                        <p class="err-signup" id="err-uname"><?php echo $data['error'] ?></p>
                    </div><br>
                    
                    <div class="form-control">
                        <label for="fName">First Name</label><br>
                        <input type="text" id="fName" name="fName">
                        <p class="err-signup" id="err-fname"></p>
                    </div><br>

                    <div class="form-control">
                        <label for="nic">NIC</label><br>
                        <input type="text" id="nic" name="nic">
                        <p class="err-signup" id="err-nic"></p>
                    </div><br>

                    <div class="form-control">
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password">
                        <p class="err-signup" id="err-password"></p>
                    </div><br>

                </div>

                <div class="right_form">

                    <div class="form-control">
                        <label for="email">Email</label><br>
                        <input type="text" id="email" name="email">
                        <p class="err-signup" id="err-email"></p>
                    </div><br>

                    <div class="form-control">
                        <label for="lName">Last Name</label><br>
                        <input type="text" id="lName" name="lName">
                        <p class="err-signup" id="err-lname"></p>
                    </div><br>

                    <div class="form-control">
                        <label for="phone">Phone Number</label><br>
                        <input type="tel" id="phone" name="phone">
                        <p class="err-signup" id="err-phone"></p>
                    </div><br>

                    <div class="form-control">
                        <label for="cpassword">Confirm Password</label><br>
                        <input type="password" id="cpassword" name="cpassword">
                        <p class="err-signup" id="err-password-repeat"></p>
                        
                    </div><br>

                </div>

            </div>
            <!--<input type="submit" id="submit_btn" name="submit_btn" value="Create an Account">-->
            <div class="submit_btn" id="btn-signup">Create an Account</div>
        </form>


    

    
</div>

<?php require APP_ROOT . '/views/layout/footer.php' ?> 
<script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
<script src="<?php echo URL_ROOT; ?>/js/doctor_signup.js"></script>    
</body>
</html>