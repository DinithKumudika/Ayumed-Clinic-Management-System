<?php require APP_ROOT . '/views/layout/header.php' ?>
<title>Verify Email</title>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
     <div class="container">
          <div class="message-container">
               <div class="heading">
                    <div class="logo">
                         <img src="<?php echo URL_ROOT ?>/images/logo.png" alt="">
                    </div>
                    <div class="heading-text">
                         <h1>Welcome to Ayumed</h1>
                         <h2>Email Verification</h2>
                    </div>
               </div>
               <div class="message-body">
                    <div class="email-logo">
                         <img src="<?php echo URL_ROOT ?>/images/email-1.gif" alt="">
                    </div>
                    <div class="text">
                         <h3>OTP code has been send to the email you've provided. To complete registration, please check the inbox or spam folder
                              and enter the OTP code you received below
                         </h3>
                         <p class="err" id="otp-err"></p>
                         <form action="" method="POST" id="otp-form">
                              <input type="text" name="otp" id="otp-input">
                              <div class="btn otp-btn" id="otp-btn">Verify</div>
                         </form>
                    </div>
               </div>
          </div>
     </div>     
     <?php require APP_ROOT . '/views/layout/footer.php' ?>
     <script src="<?php echo URL_ROOT; ?>/js/Validate.js"></script>

     <!-- client side OTP validation -->
     <script>
          const otpField = document.getElementById('otp-input');
          const verifyBtn = document.getElementById('otp-btn');
          const otpErr = document.getElementById('otp-err');
          const otpForm = document.getElementById('otp-form');
          
          function isOTPFormValid(){
               const otpValid = Validate.isOTPValid(otpField, otpErr);
               if(!otpValid){
                    return false;
               }
               else{
                    return true;
               }
          }

          verifyBtn.addEventListener('click', function(){
               if(isOTPFormValid()){
                    otpForm.submit();
               }
          });
     </script>   
</body>
</html>