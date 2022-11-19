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
                         <h3>To complete registration please check the inbox or spam folder of the email you've provided in the registration.
                              Enter the OTP code below
                         </h3>
                         <form action="" method="post" id="otp-form">
                              <input type="text" name="" id="otp-input">
                              <div class="btn otp-btn">Verify</div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
          
     <?php require APP_ROOT . '/views/layout/footer.php' ?>   
</body>
</html>