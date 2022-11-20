<!DOCTYPE html>
<head>
    <title>Signup page</title>
    <link rel="stylesheet" href="pharmacistsignup.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <div class="div-main">
        <h1>Sign up</h1>

        <form action="pharmacistsignup.php" method="post">

            <input type="text" placeholder="First name" class="form-input" name="f-name" id="f-name">

            <input type="text" placeholder="Last name" class="form-input" name="l-name" id="l-name">

            <input type="email" placeholder="E-mail" class="form-input" name="e-mail" id="e-mail">

            <input type="text" placeholder="Phone no" class="form-input" name="phone" id="phone">

            <input type="text" placeholder="Username" class="form-input" name="username" id="username">

            <input type="password" placeholder="Password" class="form-input" name="password" id="password">

            <input type="submit" value="Sign up" class="button" name="signup">
        </form>
        <div class="not-member">
            Already a member? <a href="pharmacistlogin.php">Log in</a>
        </div>
    </div>
</body>
</html>