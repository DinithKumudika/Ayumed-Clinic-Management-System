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
    protected $template_html;
    protected $template_text;

    const TEMPLATE_PATH_EMAIL = APP_ROOT . '/templates/email/';

    public function __construct($email)
    {
        $this->receiver = $email;
        $this->sender = $_ENV['SMTP_USER'];
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();                                     //Send using SMTP
        $this->mail->Host = $_ENV['SMTP_HOST'];                //Set the SMTP server to send through
        $this->mail->SMTPAuth = true;                            //Enable SMTP authentication
        $this->mail->Username = $_ENV['SMTP_USER'];                   //SMTP username
        $this->mail->Password = $_ENV['SMTP_PASSWORD'];                 //SMTP password
        $this->mail->SMTPSecure = $_ENV['SMTP_ENCRYPT'];                           //Enable implicit TLS encryption
        $this->mail->Port = $_ENV['SMTP_PORT'];                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }

    public function setEmail($subject)
    {
        try {
            $this->mail->setFrom($this->sender, 'Ayumed');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function setContent($template, $data)
    {
        if(file_exists($template)){
            $content = file_get_contents($template);

            $swap_data = $data;

            foreach ($swap_data as $key => $val){
               $content = str_replace($key, $val, $content);
            }
        }
        else {
            $content = false;
        }
        return $content;
    }

    // send OTP verification email
    public function sendVerificationEmail($receiverName, $OTPCode)
    {
        try {
            $this->mail->setFrom($this->sender, 'Ayumed');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "Ayumed Account Verification";

            $this->template_html = self::TEMPLATE_PATH_EMAIL . "otpEmail.php";

            $email_body = $this->setContent(
                $this->template_html,
                [
                    "{TO_NAME}" => $receiverName,
                    "{OTP}" => $OTPCode,
                ]
            );

            if(!$email_body){
                echo "no template found";
            }
            else{
                $this->mail->Body = $email_body;
            }

            $this->mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function changePasswordEmail($name, $url)
    {
        try {
            $this->mail->setFrom($this->sender, 'Ayumed');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "Ayumed - Account Password Reset";

            $this->template_html = self::TEMPLATE_PATH_EMAIL . "forgotPasswordEmail.php";
            $this->template_text = self::TEMPLATE_PATH_EMAIL . "forgotPasswordEmail.txt";

            $email_body = $this->setContent(
                $this->template_html,
                [
                    "{TO_NAME}" => $name,
                    "{URL}" => $url
                ]
            );

            $email_alt_body = $this->setContent(
                $this->template_text,
                [
                    "{TO_NAME}" => $name,
                    "{URL}" => $url
                ]
            );

            if(!$email_body){
                echo "no template found";
            }
            else{
                $this->mail->Body = $email_body;
            }

            $this->mail->AltBody = $email_alt_body;
            $emailSent = $this->mail->send();

            if ($emailSent) {
                Flash::setFlash('forgot_password', 'Password reset email sent. check your inbox or spam folder', Flash::FLASH_SUCCESS);
            }
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function registrationEmail($name, $username, $password)
    {
        try {
            $this->mail->setFrom($this->sender, 'Ayumed');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "Ayumed - Account Registration";

            $this->template_html = self::TEMPLATE_PATH_EMAIL . "registrationEmail.php";

            $email_body = $this->setContent(
                $this->template_html,
                [
                    "{TO_NAME}" => $name,
                    "{USERNAME}" => $username,
                    "{PASSWORD}" => $password
                ]
            );

            if(!$email_body){
                echo "no template found";
            }
            else{
                $this->mail->Body = $email_body;
            }

            $emailSent = $this->mail->send();

            if ($emailSent) {
                Flash::setFlash('mail_sent', 'User credentials has been sent to the user', Flash::FLASH_SUCCESS);
            }
            else{
                Flash::setFlash('mail_sent', 'problem with sending the email', Flash::FLASH_WARNING);
            }
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }

    }
}
