<?php require APP_ROOT . '/views/layout/header.php' ?>
<title>Doctor SignUp</title>
<link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/signup.css">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
               <form class="form signup-form" method="POST" id="signup-form" action="<?php echo URL_ROOT ?>/user/register_patient">
                    <!-- first form step -->
                    <div class="form-body" id="first">
                         <div class="form-group">
                              <h5>First Name</h5>
                              <input type="text" id="input-fname" name="fist-name" class="form-input" placeholder="Ex: Dinith">         
                         </div>
                         <p class="err-signup" id="err-fname"></p>
                         <div class="form-group">
                              <h5>Last Name</h5>
                              <input type="text" id="input-lname" name="last-name" class="form-input" placeholder="Ex: Kumudika">
                         </div>
                         <p class="err-signup" id="err-lname"></p>
                         <div class="form-group">
                              <h5>Date of Birth</h5>
                              <input type="date" id="input-dob" name="dob" class="form-input" placeholder="Ex-: 12/18/1999">
                         </div>
                         <p class="err-signup" id="err-dob"></p>
                         <div class="form-group">
                              <h5>Gender</h5>
                              <div class="input-group">
                                   <input type="radio" name="gender" value="Male" checked>
                                   <span>Male</span>
                                   <input type="radio" name="gender" value="Female">
                                   <span>Female</span>
                              </div>
                         </div>
                         <div class="form-group">
                              <h5>NIC</h5>
                              <input type="text" id="input-nic" name="nic" class="form-input" placeholder="Ex-: 197419202757 or 918652347v">
                         </div>
                         <p class="err-signup" id="err-nic"></p>
                         <div class="btn next-btn" id="btn-next-1">Next</div>
                    </div>
                    <!-- first form step ends -->

                    <!-- second form step -->
                    <div class="form-body" id="second">
                         <div class="form-group">
                              <h5>Martial Status</h5>
                              <div class="input-group" id="radio-martial">
                                   <input type="radio" name="martial-status" value="Married" checked>
                                   <span>Married</span>
                                   <input type="radio" name="martial-status" value="not Married">
                                   <span>Single</span>
                              </div>
                         </div>
                         <div class="form-group">
                              <h5>Address</h5>
                              <input type="text" id="input-address" name="address" class="form-input" placeholder="Ex: No.22/1, Gamunu road, Nugegoda">
                         </div>
                         <p class="err-signup" id="err-address"></p>
                         <div class="form-group">
                              <h5>Email</h5>
                              <input type="email" id="input-email" name="email" class="form-input" placeholder="Ex: dinithkumudika@gmail.com">
                         </div>
                         <p class="err-signup" id="err-email"></p>
                         <div class="form-group">
                              <h5>Phone no</h5>
                              <input type="tel" id="input-phone" name="phone" class="form-input" placeholder="Ex: 0729913456">
                         </div>
                         <p class="err-signup" id="err-phone"></p>
                         <div class="btn-group">
                              <div class="btn back-btn" id="btn-back-1">Back</div>
                              <div class="btn next-btn" id="btn-next-2">Next</div>
                         </div>
                    </div>
                    <!-- second form step ends -->

                    <!-- third form step -->
                    <div class="form-body" id="third">
                         <div class="form-group">
                              <h5>Username</h5>
                              <input type="text" id="input-uname" name="username" class="form-input" placeholder="Ex: dinith123">
                         </div>
                         <p class="err-signup" id="err-uname"></p>
                         <div class="form-group">
                              <h5>Password</h5>
                              <input type="password" id="input-pwd" name="password" class="form-input" placeholder="Ex: Dinith@123">
                              <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd"></i>
                         </div>
                         <p class="err-signup" id="err-password"></p>
                         <div class="form-group">
                              <h5>Confirm Password</h5>
                              <input type="password" id="input-pwd-repeat" name="password-repeat" class="form-input" placeholder="Ex: Dinith@123">
                              <i class="fa-solid fa-eye show-pwd-icon" id="show-pwd-repeat"></i>
                         </div>
                         <p class="err-signup" id="err-password-repeat"></p>
                         <p class="err-signup"><?php echo $data['error'] ?></p>
                         <div class="form-group">
                             <div class="g-recaptcha" data-siteky="<?php echo $_ENV['SITE_KEY']; ?>"></div>
                         </div>
                         <div class="btn-group">
                              <div class="btn back-btn" id="btn-back-2">Back</div>
                              <div class="btn next-btn" id="btn-signup">Signup</div>
                         </div>
                    </div>
                    <!-- third form step ends -->
               </form>
          </div>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>  
     <script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>
     <script src="<?php echo URL_ROOT; ?>/js/signup.js"></script>   
</body>

</html>