<?php

use helpers\Session;
use helpers\Email;
use utils\Crypto;
use utils\Request;
use utils\Generate;
use utils\Url;
use utils\Flash;
use utils\Token;

class User extends BaseController
{

    private $userModel;
    private $verificationModel;
    private $rememberLoginModel;
    private $existingUser;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->rememberLoginModel = $this->model('RememberLoginModel');
        $this->verificationModel = $this->model('VerificationModel');
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

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'user_type' => trim($_POST['user_type']),
                'error' => ''
            ];

            switch ($data['user_type']){
                case "doctor":
                    $this->existingUser = $this->userModel->login($data['username'], $data['password'], 2);
                    break;
                case "staff":
                    $this->existingUser = $this->userModel->login($data['username'], $data['password'], 3);
                    break;
                case "pharm":
                    $this->existingUser = $this->userModel->login($data['username'], $data['password'], 4);
                    break;
                case "admin":
                    $this->existingUser = $this->userModel->login($data['username'], $data['password'], 5);
                    break;
            }

            if ($this->existingUser) {
                $userLoggedIn = $this->userModel->getUser($data['username']);
                $this->createUserSession($userLoggedIn);

                // get client ip
                $user_ip = Request::getIpAddress();

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
                Url::redirectToHome(Session::get('role_id'));
            }
            else {
                $data['error'] = "invalid username or password";
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'user_type' => '',
                'error' => ''
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
            } else {
                $data['password'] = Crypto::createHash($data['password']);

                if ($this->userModel->register($data, 1)) {
                    $age = Generate::age($data['dob']);
                    $OTPCode = Generate::otpCode();
                    $userId = $this->userModel->getUserId(1);
                    $regNo = Generate::regNo($userId);

                    if ($this->userModel->registerPatient($data, $age, $regNo, $OTPCode, $userId)) {
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
        } else {
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

    // action to change password
    public function forgotPassword()
    {
        if (Request::isPost()) {
            Request::removeTags();

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'error' => ''
            ];

            $userExists = $this->userModel->isUserExists($data['username']);

            if ($userExists) {
                $email = new Email($data['email']);
                $email->changePasswordEmail();
            } else {
                $data['error'] = 'invalid username';
            }
        } else {
            $data = [
                'username' => '',
                'email' => '',
                'error' => ''
            ];
        }
        $this->view('pages/forgotPassword', $data);
    }

    // create user session
    public function createUserSession($user)
    {
        Session::set('user_id', $user->user_id);
        Session::set('username', $user->username);
        Session::set('role_id', $user->role_id);
        Session::set('avatar_url', $user->avatar);
    }

    // action to log out users
    public function logout()
    {

        $role_id = Session::get('role_id');
        Flash::setFlash("logout", "Logout success!", Flash::FLASH_SUCCESS);
        Session::unset('user_id');
        Session::unset('username');
        Session::unset('role_id');

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