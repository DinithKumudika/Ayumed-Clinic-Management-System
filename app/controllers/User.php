<?php

use helpers\Session;
use helpers\Email;
use utils\Crypto;
use utils\Request;
use utils\Generate;
use utils\Url;
use utils\Flash;
use utils\Token;
use utils\Validate;

class User extends BaseController
{

    private $userModel;
    private $verificationModel;
    private $rememberLoginModel;
    private $patientModel;
    private $roleId;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->rememberLoginModel = $this->model('RememberLoginModel');
        $this->verificationModel = $this->model('VerificationModel');
        $this->patientModel = $this->model('PatientModel');
    }

    public function index()
    {
        $this->view('pages/welcome');
    }

    public function login($user_type = null)
    {

        if (Session::isLoggedIn() || isset($_COOKIE['remember_me'])) {
            Url::redirectToHome(Session::get('role_id'));
        }

        if (Request::isPost()) {

            Request::removeTags();

            // get csrf token from the form
            $token = filter_input(INPUT_POST,'csrf', FILTER_SANITIZE_STRING);

            // redirect to 405 error page if csrf token is not present
            if(!$token || $token !== Session::get('csrf_token')){
                $this->view('405');
            }
            else{
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'user_type' => trim($_POST['user_type']),
                    'error_uname' => '',
                    'error_pwd' => ''
                ];

                switch ($data['user_type']){
                    case "patient":
                        $this->roleId = 1;
                        break;
                    case "doctor":
                        $this->roleId = 2;
                        break;
                    case "staff":
                        $this->roleId= 3;
                        break;
                    case "pharm":
                        $this->roleId= 4;
                        break;
                    case "admin":
                        $this->roleId= 5;
                        break;
                }

                $user = $this->userModel->getUser($data['username'], $this->roleId);

                if ($user) {
                    $hashedPassword = $this->userModel->getUserPassword($user->username, $this->roleId);
                    $validPassword = Validate::validatePassword($data['password'], $hashedPassword);

                    if($validPassword['status']){
                        // get client ip
                        $user_ip = Request::getIpAddress();
                        // create user session
                        $this->createUserSession($user);
                        // add user log with login time and client ip address
                        $this->userModel->recordLogin(Session::get('user_id'), Session::get('username'), Session::get('role_id'), $user_ip);

                        if (isset($_POST['remember_me'])) {
                            $data['remember_me'] = true;
                            $token = new Token();
                            $hashed_token = $token->getHashedToken();
                            $exp_time = time() + 60 * 60 * 24;

                            if ($this->rememberLoginModel->remember($hashed_token, Session::get('user_id'), $exp_time)) {
                                $remember_token = $token->getTokenValue();
                                setcookie('remember_me', $remember_token, $exp_time, '/');
                            }
                        }

                        Flash::setFlash('login_success', 'Login successful', Flash::FLASH_SUCCESS);

                        // return to the previously requested page
                        if(Session::isSet('return')){
                            $returnToPage = Url::getReturnPage();
                            Session::unset('return');
                            Url::redirectToRequested($returnToPage);
                        }
                        else{
                            Url::redirectToHome(Session::get('role_id'));
                        }
                    }
                    else{
                        $data['error_pwd'] = $validPassword['error'];
                    }
                }
                else {
                    $data['error_uname'] = "*invalid username";
                }
            }
        }
        else {
            // save csrf token in the session
            Session::set('csrf_token', Token::csrfToken());
            $data = [
                'username' => '',
                'password' => '',
                'user_type' => '',
                'error_uname' => '',
                'error_pwd' => ''
            ];
        }

        if($user_type == "patient"){
            $this->view('pages/patientLogin', $data);
        }
        else {
            $this->view('pages/login', $data);
        }
    }

    public function register()
    {

        if (Request::isPost()) {
            Request::removeTags();

            // get csrf token from the form
            $token = filter_input(INPUT_POST,'csrf', FILTER_SANITIZE_STRING);

            // redirect to 405 error page if csrf token is not present
            if(!$token || $token !== Session::get('csrf_token')){
                $this->view('405');
            }
            else{
                $data = [
                    'first_name' => trim($_POST['fist-name']),
                    'last_name' => trim($_POST['last-name']),
                    'dob' => trim($_POST['dob']),
                    'gender' => trim($_POST['gender']),
                    'nic' => trim($_POST['nic']),
                    'martial-status' => trim($_POST['martial-status']),
                    'address' => trim($_POST['address']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'error' => ''
                ];

                $userExists = $this->userModel->isUserExists($data['username']);

                if ($userExists) {
                    $data['error'] = 'username is already taken';
                }
                else {
                    $data['password'] = Crypto::createHash($data['password']);

                    if ($this->userModel->register($data, 1)) {
                        $age = Generate::age($data['dob']);
                        $OTPCode = Generate::otpCode();
                        $userId = $this->userModel->getUserId($data['username']);
                        $regNo = Generate::regNo($userId);

                        if ($this->patientModel->add($data, $age, $regNo, $OTPCode, $userId)) {
                            $email = new Email($data['email']);
                            $email->sendVerificationEmail($data['first_name'], $OTPCode);
                            // redirect to OTP verification view
                            Url::redirect('user/verify');
                        }
                        else{
                            Flash::setFlash("reg_error", "something went wrong", Flash::FLASH_WARNING);
                            Url::redirect('user/register');
                        }
                    }
                }
            }
        } else {
            // save csrf token in the session
            Session::set('csrf_token', Token::csrfToken());
            $data = [
                'first_name' => '',
                'last_name' => '',
                'dob' => '',
                'gender' => '',
                'nic' => '',
                'martial-status' => '',
                'address' => '',
                'email' => '',
                'phone' => '',
                'username' => '',
                'password' => '',
                'error' => ''
            ];
        }
        $this->view('pages/patientRegister', $data);
    }

    // action to verify user account using OTP
    public function verify()
    {
        if (Request::isPost()) {
            Request::removeTags();

            $data = [
                'otp_num_1' => trim($_POST['otp_1']),
                'otp_num_2' => trim($_POST['otp_2']),
                'otp_num_3' => trim($_POST['otp_3']),
                'otp_num_4' => trim($_POST['otp_4']),
                'otp_num_5' => trim($_POST['otp_5']),
                'error' => '',
                'status' => ''
            ];

            $otp = $data['otp_num_1'] . $data['otp_num_2'] . $data['otp_num_3'] . $data['otp_num_4'] . $data['otp_num_5'];

            $verifiedPatient = $this->verificationModel->verifyOTP($otp);

            if ($verifiedPatient) {
                if ($this->verificationModel->verify($verifiedPatient->id)) {
                    // set verification successful flash message
                    Flash::setFlash("verify", "Your account has been verified", Flash::FLASH_SUCCESS);
                    // redirect to the login of patient
                    Url::redirect('user/login_patient');
                } else {
                    // set verification failed flash message
                    Flash::setFlash("verify", "Account verification failed!", Flash::FLASH_DANGER);
                    // redirect to the signup of patient
                    Url::redirect('user/register_patient');
                }
            } else {
                $data['error'] = "Invalid OTP";
            }
        } else {
            $data = [
                'otp_num_1' => '',
                'otp_num_2' => '',
                'otp_num_3' => '',
                'otp_num_4' => '',
                'otp_num_5' => '',
                'error' => '',
                'status' => ''
            ];
        }
        $this->view('pages/signupVerification', $data);
    }

    // action to change/forgot password
    public function password($action, $reset_token = null)
    {
        // forgot password action
        if($action == "forgot" && $reset_token == null){
            $this->passwordForgot();
        }
        // reset password action
        else if($action == "reset" && $reset_token != null){
            $this->passwordReset($reset_token);
        }
        // invalid param
        else{
            $this->view('404');
        }
    }

    public function passwordForgot(){
        if (Request::isPost()) {
            Request::removeTags();

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'error_uname' => '',
                'error_email' => ''
            ];

            // check username for database
            $userExists = $this->userModel->isUserExists($data['username']);
            // check email using abstract email api
            $validEmail = Validate::validateEmail($data['email']);

            if (!$userExists) {
                $data['error_uname'] = 'invalid username';
            }

            if (!$validEmail['status']){
                $data['error_email'] = $validEmail['error'];
            }

            if($userExists && $validEmail['status']){
                $user = $this->userModel->getUser($data['username']);
                $token = new Token();
                $hashed_token = $token->getHashedToken();
                // token expires after 1 hour
                //TODO:fix unix time issue
                date_default_timezone_set('Asia/Colombo');
                $expires_at = date("Y-m-d H:i:s",time() + 60 * 60);

                if($this->userModel->passwordReset($hashed_token, $expires_at, $user->user_id)){
                    $reset_url = URL_ROOT . "/user/password/reset/" . $token->getTokenValue();
                    $email = new Email($data['email']);
                    // send email with password reset URL
                    $email->changePasswordEmail($user->first_name, $reset_url);
                }
            }
        } else {
            $data = [
                'username' => '',
                'email' => '',
                'error_uname' => '',
                'error_email' => ''
            ];
        }
        $this->view('pages/forgotPassword', $data);
    }

    public function passwordReset($reset_token){
        $data['token_invalid'] = false;
        $token = new Token($reset_token);
        // get user by reset token
        $user = $this->userModel->getUserByResetToken($token->getHashedToken());

        if($user){
            // token is invalid if it has been expired
            if(!strtotime($user->password_reset_expiry) > time()){
                $data['token_invalid'] = true;
            }
        }
        else{
            // token is invalid if there aren't any users associated with the token
            $data ['token_invalid'] = true;
        }

        if(Request::isPost()){
            Request::removeTags();

            $data['token'] = $reset_token;
            $data['password'] = trim($_POST['new-password']);
            $data['error'] = '';
            // hash the new password
            $hashed_password = Crypto::createHash($data['password']);

            // check if new password and old password are the same
            $invalid_password = Validate::validatePassword($data['password'], $user->password);

            if($invalid_password['status']){
                $data['error'] = "new password can't be same as old one";
            }

            if(!$data['token_invalid']){
                // change old password to new one
                if($this->userModel->resetPassword($hashed_password, $user->user_id)){
                    $role = '';
                    switch ($user->role_id){
                        case 1:
                            $role = "patient";
                            break;
                        case 2:
                            $role = "doctor";
                            break;
                        case 3:
                            $role = "staff";
                            break;
                        case 4:
                            $role = "pharm";
                            break;
                    }
                    Url::redirect('user/login/'.$role);
                }
            }
        }
        else{
            $data['token'] = $reset_token;
            $data['password'] = '';
            $data['error'] = '';
        }
        $this->view('pages/changePassword', $data);
    }

    // create user session
    public function createUserSession($user)
    {
        Session::set('user_id', $user->user_id);
        Session::set('username', $user->username);
        Session::set('role_id', $user->role_id);
        Session::set('time_login', Generate::currentDateTime());
        Session::set('avatar_url', $user->avatar);
    }

    // action to log out users
    public function logout()
    {

        $role_id = Session::get('role_id');

        // set user's logout time in user log
        $this->userModel->setLogOut(
            Session::get('user_id'),
            Session::get('time_login'),
            Generate::currentDateTime()
        );

        Flash::setFlash("logout", "Logout success!", Flash::FLASH_SUCCESS);
        Session::unset('user_id');
        Session::unset('username');
        Session::unset('role_id');
        Session::unset('time_login');

        switch ($role_id) {
            case 1:
                Url::redirect('user/login/patient');
                break;
            case 2:
                Url::redirect('user/login/doctor');
                break;
            case 3:
                Url::redirect('user/login/staff');
                break;
            case 4:
                Url::redirect('user/login/pharm');
                break;
            case 5:
                Url::redirect('user/login/admin');
                break;
            default:
                Url::redirect('user/index');
                break;
        }
    }

    public function error()
    {
        $this->view('404');
    }
}