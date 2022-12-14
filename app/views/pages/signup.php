<?php require APP_ROOT . '/views/layout/header.php' ?>
     <title>Signup</title>
</head>
<body>
     <div class="container">
          <div class="ayumed-logo">
               <img src="<?php echo URL_ROOT ?>/images/logo.png" alt="">
               <span>Clinic Management System</span>
          </div>
          <div><h2 class="title">SELECT USER TYPE TO SIGNUP</h2></div>
          <div class="login-option-container">
               <div class="login-opt opt-patient">
                    <a href="<?php echo URL_ROOT?>/user/register_patient">
                         <div class="logo-container">
                              <i class="fa-solid fa-hospital-user"></i>
                         </div>
                         <div class="opt-text"><h4>Patient</h4></div>
                    </a>
               </div>
               <div class="login-opt opt-doctor">
                    <a href="<?php echo URL_ROOT?>/user/register_doctor">
                         <div class="logo-container">
                              <i class="fa-solid fa-user-doctor"></i>
                         </div>
                         <div class="opt-text"><h4>Doctor</h4></div>
                    </a>
               </div>
               <div class="login-opt opt-pharm">
                    <a href="<?php echo URL_ROOT?>/user/register_pharm">
                         <div class="logo-container">
                              <i class="fa-solid fa-prescription-bottle-medical"></i>
                         </div>
                         <div class="opt-text"><h4>Pharmacist</h4></div>
                    </a>
               </div>
               <div class="login-opt opt-staff">
                    <a href="<?php echo URL_ROOT?>/user/register_staff">
                         <div class="logo-container">
                              <i class="fa-solid fa-user-nurse"></i>
                         </div>
                         <div class="opt-text"><h4>Clinic Staff</h4></div>
                    </a>
               </div>
               <div class="login-opt opt-admin">
                    <a href="<?php echo URL_ROOT?>/user/register_admin">
                         <div class="logo-container">
                              <i class="fa-solid fa-screwdriver-wrench"></i>
                         </div>
                    </a>
                    <div class="opt-text"><h4>Admin</h4></div>
               </div>
          </div>
     </div>
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
</body>