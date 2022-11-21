<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Email Template</title>
</head>
<style>
     body{
          box-sizing: border-box;
          margin: 0;
          font-family:Verdana, Geneva, Tahoma, sans-serif;
          background-color: lightgray;
     }

     .container{
          background-color: white;
          margin-top: 30px;
          margin-left: 10%;
          margin-right:10%;
          border-radius: 10px;
          border: 2px solid #09a81885;
          box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
          -webkit-box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
          -moz-box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
     }

     img{
          width: 150px;
          height: 150px;
     }

     .container div h2{
          color: #19A627;
     }

     .container div h3{
          color: #19A627;
     }

     .container div h4{
          margin-left: 20px;
          margin-right: 20px;
     }
</style>
<body>
     <div class="container">
          <div><img src="<?php echo URL_ROOT ?>/images/logo.png" alt=""></div>
          <div><h2><b>Welcome To Ayumed</b></h2></div>
          <div><h4>Before using our service there is one more little thing to do. Please use the below OTP to verify your account.</h4></div>
          <div><h3>Thank You!</h3></div>
     </div>
</body>
</html>