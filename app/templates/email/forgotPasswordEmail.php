<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>test mail template</title>
</head>

<body style="font-family: sans-serif">
<table style="text-align: center; margin: auto;" width="70%">
    <tr>
        <th><img src="https://i.ibb.co/pPGky3c/logo.png" alt="logo" border="0" style="width: 200px; height: 200px" /></th>
    </tr>
    <tr>
        <td><h2 style="color: green">Dear {TO_NAME},</h2></td>
    </tr>
    <tr>
        <td>
            <h3>Your request for account password change has been received. Please click on the below button to reset your password</h3>
        </td>

    </tr>
    <tr>
        <td>
            <a href="{URL}" style="text-decoration: none;color: white;">
                <div style='background-color: #19A627;padding: 10px 20px; color: white; border: 0px solid black; border-radius: 5px; width: 400px; margin: auto;'>Reset Password</div>
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <h2 style="margin-top: 20px;">Or</h2>
        </td>
    </tr>
    <tr>
        <td>
            <h3>Follow this link to reset your password</h3>
            <h4><a href="{URL}">Click Here</a></h4>
        </td>
    </tr>
    <tr>
        <td>
            <p style="font-size: 20px">Thank You!</p>
        </td>
    </tr>
</table>
</body>

</html>
