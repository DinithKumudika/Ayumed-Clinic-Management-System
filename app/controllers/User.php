<?php

use helpers\Session;
use helpers\Email;
use utils\Crypto;
use utils\Request;
use utils\Generate;
use utils\Url;
use utils\Flash;

class User extends BaseController{

     public $userModel;
     public $verificationModel;

     public function __construct()
     {
          $this->userModel = $this->model('UserModel');
          $this->verificationModel = $this->model('VerificationModel');
     }

     public function index(){
          $this->view('pages/login');
     }

     public function register(){
          $this->view('pages/signup');
     }

     public function login_doctor(){

          if(Request::isPost()){

               Request::removeTags();
               $data = [
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'remember_me' => trim($_POST['remember_me']),
                    'error'=> ''
               ];

              $isValidUser = $this->userModel->login($data['username'], $data['password']);

              if($isValidUser){
                  $userLoggedIn = $this->userModel->getUser($data['username']);
                  $this->createUserSession($userLoggedIn);
                  Url::redirect('doctor/index');
              }
              else{
                  $data['error'] = "invalid username or password";
              }
          }
          else{
               $data = [
                    'username'=>'',
                    'password'=>'',
                    'remember_me' => '',
                    'error'=> ''
               ];
          }

          $this->view('pages/doctorLogin', $data); 
     }

     public function login_pharm(){
          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               
               Request::removeTags();

               $data = [
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'error'=> ''
               ];

               if(!empty($data['username']) && !empty($data['password'])){
                    $userLoggedIn = $this->userModel->login($data['username'], $data['password']);

                    if($userLoggedIn){
                         $this->createUserSession($userLoggedIn);
                         Url::redirect('Pharmacist/index');  
                    }
                    else{
                         $data['error'] = "invalid username or password";
                    }
               }
          }
          else{
               $data = [
                    'username'=>'',
                    'password'=>'',
                    'error'=> ''
               ];
          }

          $this->view('pages/pharmacistLogin', $data); 
     }

     public function login_patient(){

         if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){

             filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);

             $data = [
                 'username'=>trim($_POST['userName']),
                 'password'=>trim($_POST['password']),
                 'error'=> ''
             ];

             if(!empty($data['username']) && !empty($data['password'])){
                 $isValidUser = $this->userModel->login($data['username'], $data['password']);

                 if($isValidUser){
                     $userLoggedIn = $this->userModel->getUser($data['username']);
                     $this->createUserSession($userLoggedIn);
                     Url::redirect('patient/index');
                 }
                 else{
                     $data['error'] = "invalid username or password";
                 }
             }
         }
         else{
             $data = [
                 'username'=>'',
                 'password'=>'',
                 'error'=> ''
             ];
         }

         $this->view('pages/patientLogin', $data);
     }

     public function login_staff(){

     }

     public function login_admin(){
          
     }

     public function register_patient(){

          if(Request::isPost()){
               Request::removeTags();

               $data = [
                    'first_name'=>trim($_POST['fist-name']),
                    'last_name'=>trim($_POST['last-name']),
                    'dob'=>trim($_POST['dob']),
                    'gender'=>trim($_POST['gender']),
                    'nic'=>trim($_POST['nic']),
                    'martial-status'=>trim($_POST['martial-status']),
                    'address'=>trim($_POST['address']),
                    'email'=>trim($_POST['email']),
                    'phone'=>trim($_POST['phone']),
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'error'=> ''
               ];

               $userExists = $this->userModel->isUserExists($data['username']);

               if($userExists){
                    $data['error'] = 'username is already taken';
               }
               else{
                    $data['password'] = Crypto::createHash($data['password']);

                    if($this->userModel->register($data, 1)){
                         $age = Generate::age($data['dob']);
                         $OTPCode = Generate::otpCode();
                         $userId = $this->userModel->getUserId(1);
                         $regNo = Generate::regNo($userId);

                         if($this->userModel->registerPatient($data, $age, $regNo, $OTPCode, $userId)){
                             $email = new Email($data['email']);
                             $email->sendVerificationEmail($data['first_name'], $OTPCode);
                             // redirect to OTP verification view
                             Url::redirect('user/verify');
                         }
                    }
               }
          }
          else{
               $data = [
                    'first_name'=>'',
                    'last_name'=>'',
                    'dob'=>'',
                    'gender'=>'',
                    'nic'=>'',
                    'martial-status'=>'',
                    'address'=>'',
                    'email'=>'',
                    'phone'=>'',
                    'username'=>'',
                    'password'=>'',
                    'error'=> ''
               ];
          }
          $this->view('pages/patientRegister',$data);
     }

     public function verify(){ 
          if(Request::isPost()){
               Request::removeTags();

               $data = [
                    'otp'=>trim($_POST['otp']),
                    'error'=>'',
                    'status'=> ''
               ];

               $verifiedPatient = $this->verificationModel->verifyOTP($data['otp']);

               if($verifiedPatient){
                    if($this->verificationModel->verify($verifiedPatient->id)){
                        // set verification successful flash message
                        Flash::setFlash("verify","Your account has been verified",Flash::FLASH_SUCCESS);
                        // redirect to the login of patient
                        Url::redirect('user/login_patient');
                    }
                    else{
                        // set verification failed flash message
                        Flash::setFlash("verify","Account verification failed!",Flash::FLASH_DANGER);
                        // redirect to the signup of patient
                        Url::redirect('user/register_patient');
                    }
               }
               else{
                    $data['error'] = "Invalid OTP";
               }
          }
          else{
               $data = [
                    'otp'=>'',
                    'error'=>'',
                    'status'=>''
               ];
          }
          $this->view('pages/signupVerification', $data);
     }

     public function forgotPassword(){
         if(Request::isPost()){
             Request::removeTags();

             $data = [
                 'username' => trim($_POST['username']),
                 'email' => trim($_POST['email']),
                 'error' => ''
             ];

             $userExists = $this->userModel->isUserExists($data['username']);

             if($userExists){
                 $email = new Email($data['email']);
                 $email->changePasswordEmail();
             }
             else{
                 $data['error'] = 'invalid username';
             }
         }
         else{
             $data = [
                 'username' => '',
                 'email' => '',
                 'error' => ''
             ];
         }
         $this->view('pages/forgotPassword', $data);
     }

     public function createUserSession($user){
          Session::set('user_id',$user->user_id);
          Session::set('username',$user->username);
          Session::set('role_id',$user->role_id);
     }
     //TODO: fix not redirecting to login page
     public function logout($role_id){
          if(Request::isPost()){
               Flash::setFlash("logout","Logout success!",Flash::FLASH_INFO);

               Session::unset('user_id');
               Session::unset('username');
               Session::unset('role_id');

               switch ($role_id) {
                    case 1:
                         Url::redirect('user/login_patient');
                         break;
                    case 2:
                         Url::redirect('user/login_doctor');
                         break;
                    case 3:
                         Url::redirect('user/login_staff');
                         break;
                    case 4:
                         Url::redirect('user/login_pharm');
                         break;
                    case 5:
                         Url::redirect('user/login_admin');
                         break;
                    default:
                         Url::redirect('user/index');
                         break;
               }
          } 
     }

     public function error(){
          $this->view('404');
     }
}