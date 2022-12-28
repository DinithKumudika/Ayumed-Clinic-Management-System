<?php
// Email class interacting with PHPMailer to send email
namespace helpers;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use utils\Flash;

class Email
{

     protected $receiver;
     protected $sender;
     protected $mail;
     protected $template;

     public function __construct($email)
     {
          $this->receiver = $email;
          $this->sender = $_ENV['SMTP_USER'];
          $this->mail = new PHPMailer();
          $this->mail->isSMTP();                                     //Send using SMTP
          $this->mail->Host       = $_ENV['SMTP_HOST'];                //Set the SMTP server to send through
          $this->mail->SMTPAuth   = true;                            //Enable SMTP authentication
          $this->mail->Username   = $_ENV['SMTP_USER'];                   //SMTP username
          $this->mail->Password   = $_ENV['SMTP_PASSWORD'];                 //SMTP password
          $this->mail->SMTPSecure = $_ENV['SMTP_ENCRYPT'];                           //Enable implicit TLS encryption
          $this->mail->Port       = $_ENV['SMTP_PORT'];                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     }

     // send OTP verification email
     public function sendVerificationEmail($receiverName, $OTPCode)
     {
          $this->template = APP_ROOT . "/templates/email.php";

          try {
               $this->mail->setFrom($this->sender, 'Ayumed');
               $this->mail->addAddress($this->receiver);
               $this->mail->addReplyTo($this->sender);

               $this->mail->isHTML(true);
               $this->mail->Subject = "Ayumed Account Verification";

               if (file_exists($this->template)) {
                    $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>" . file_get_contents($this->template) .
                         "<br>
                    <h4 style='text-align: center;'>The verification code is : <b>" . $OTPCode . "<b></h4>";
               } else {
                    $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>
                    <h2 style='color: #19A627;'>Welcome To Ayumed</h2>
                    <h4>Before using our service there is one more little thing to do. Please use the below OTP to verify your account.</h4>
                    <h3 style='color: #19A627;'>Thank You!</h3>
                    <h4 style='text-align: center;'>The verification code is : <b>" . $OTPCode . "<b></h4>";
               }
               $this->mail->send();
          }
          catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
          }
     }

     public function changePasswordEmail($name)
     {
          try {
               $this->mail->setFrom($this->sender, 'Ayumed');
               $this->mail->addAddress($this->receiver);
               $this->mail->addReplyTo($this->sender);

               $this->mail->isHTML(true);
               $this->mail->Subject = "Ayumed - Account Password Reset";

               $this->mail->Body = "<h1 style='color: #19A627; text-align: center'>Account Password Reset</h1>
                    <h2 style='margin-top: 40px;'>Dear,". $name ."</h2>
                    <h4>Your request for account password change has been received. Please click on the below button to reset your password</h4>
                    <div style='background-color: #19A627;padding: 5px 10px; color: white; border: 0px solid black; border-radius: 5px'>Reset Password</div>
                    <h4>Or</h4>
                    <h4>Follow this link to reset your pasword</h4>
                    <h5><a href=''>Click Here</a></h5>
                    <h3 style='color: #19A627;'>Thank You!</h3>";

               $emailSent = $this->mail->send();

               if ($emailSent) {
                    Flash::setFlash('forgot_password', 'Password reset email sent. check your inbox or spam', Flash::FLASH_SUCCESS);
               }
          } catch (Exception $e) {
               echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
          }
     }
}
