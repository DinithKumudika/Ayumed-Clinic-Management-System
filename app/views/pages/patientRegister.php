<?php require APP_ROOT . '/views/layout/header.php' ?>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/signup.css">
<title> Doctor SignUp</title>
</head>
<?php
// if(isset($data['error'])){
//      echo "<script>
//      document.getElementById('input-uname').style.borderBottom = '2px solid #DC3545';
//      document.getElementById('input-pwd').style.borderBottom = '2px solid #DC3545'
//      </script>";
// }
// else{
//      echo "<script>
//      document.getElementById('input-uname').style.borderBottom = '2px solid #28A745';
//      document.getElementById('input-pwd').style.borderBottom = '2px solid #28A745'
//      </script>";
// }
?>

<body>
     <div class="container col-2">
          <div class="img-container">
               <img src="<?php echo URL_ROOT; ?>/images/p-signup.jpg" alt="" class="signup-img">
          </div>
          <div class="signup-container">
               <div class="login">
                    <h3>Already a member?<a href="<?php echo URL_ROOT; ?>/user/login_patient"> Log In</a></h3>
               </div>
               <div class="header">
                    <img src="<?php echo URL_ROOT; ?>/images/logo.png" alt="">
                    <h1>Create an Account</h1>
               </div>
               <div class="form-step">
                    <div>
                         <h4 id="form-step-text">step 1 of 3</h4>
                    </div>
                    <div class="step-boxes">
                         <div class="step"></div>
                         <div class="step"></div>
                         <div class="step"></div>
                    </div>
               </div>
               <form class="form signup-form" method="POST" id="signup-form" action="<?php echo URL_ROOT ?>/user/login_doctor">
                    <!-- first form step -->
                    <div class="form-body" id="first">
                         <div class="form-group">
                              <h5>First Name</h5>
                              <input type="text" id="input-fname" name="fist-name" class="form-input">
                         </div>
                         <div class="form-group">
                              <h5>Last Name</h5>
                              <input type="text" id="input-lname" name="last-name" class="form-input">
                         </div>
                         <div class="form-group">
                              <h5>Date of Birth</h5>
                              <input type="date" id="input-date" name="dob" class="form-input">
                         </div>
                         <div class="form-group">
                              <h5>Gender</h5>
                              <div class="input-group">
                                   <input type="radio" id="input-gender" name="gender">
                                   <span>Male</span>
                                   <input type="radio" id="input-gender" name="gender">
                                   <span>Female</span>
                              </div>
                         </div>
                         <div class="form-group">
                              <h5>NIC</h5>
                              <input type="text" id="input-nic" name="nic" class="form-input">
                         </div>
                         <div class="btn next-btn" id="btn-next-1">Next</div>
                    </div>
                    <!-- first form step ends -->

                    <!-- second form step -->
                    <div class="form-body" id="second">
                    <div class="form-group">
                              <h5>Martial Status</h5>
                              <div class="input-group">
                                   <input type="radio" id="input-martial" name="martial-status">
                                   <span>Married</span>
                                   <input type="radio" id="input-martial" name="martial-status">
                                   <span>Single</span>
                              </div>
                         </div>
                         <div class="form-group">
                              <h5>Address</h5>
                              <input type="text" id="input-address" name="address" class="form-input">
                         </div>
                         <div class="form-group">
                              <h5>Email</h5>
                              <input type="email" id="input-email" name="email" class="form-input">
                         </div>
                         <div class="form-group">
                              <h5>Phone no</h5>
                              <input type="text" id="input-phone" name="phone" class="form-input">
                         </div>
                         <div class="btn-group">
                              <div class="btn back-btn" id="btn-back-1">Back</div>
                              <div class="btn next-btn" id="btn-next-2">Next</div>
                         </div>
                    </div>
                    <!-- second form step ends -->
               </form>
          </div>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/signup.js"></script>
</body>

</html>