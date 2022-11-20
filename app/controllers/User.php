<?php

class User extends BaseController{

     public $userModel;

     public function __construct()
     {
          $this->userModel = $this->model('UserModel');
     }

     public function login(){
          $this->view('pages/login');
     }

     public function register(){
          $this->view('pages/signup');
     }

     public function login_doctor(){

          if(Request::isPost()){
<<<<<<< HEAD

               foreach ($_POST as $key => $value) {
                    $_POST[$key] = strip_tags($value);
               }
=======
               //filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
               Request::removeTags();

               $data = [
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'error'=> ''
               ];

               $userLoggedIn = $this->userModel->login($data['username'], $data['password']);

               if($userLoggedIn){
                    $this->createUserSession($userLoggedIn);
                    Url::redirect('Doctor/index');  
               }
               else{
                    $data['error'] = "invalid username or password";
                         
               }
          }
          else{
               $data = [
                    'username'=>'',
                    'password'=>'',
                    'error'=> ''
               ];
          }

          $this->view('pages/doctorLogin', $data); 
     }

     public function login_pharm(){
          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               
               Request::removeTags();
>>>>>>> main

               $data = [
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'error'=> ''
               ];

               if(!empty($data['username']) && !empty($data['password'])){
                    $userLoggedIn = $this->userModel->login($data['username'], $data['password']);

                    if($userLoggedIn){
                         $this->createUserSession($userLoggedIn);
<<<<<<< HEAD
                         Url::redirect('doctor/index');  
=======
                         Url::redirect('Pharmacist/index');  
>>>>>>> main
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

<<<<<<< HEAD
          $this->view('pages/doctorLogin', $data); 
     }

     public function login_pharm(){
          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);

               $data = [
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'error'=> ''
               ];

               if(!empty($data['username']) && !empty($data['password'])){
                    $userLoggedIn = $this->userModel->login($data['username'], $data['password']);

                    if($userLoggedIn){
                         $this->createUserSession($userLoggedIn);
                         Url::redirect('pharmacist/index');  
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

          $this->view('pages/pharmacistlogin', $data); 
     }

     public function login_patient(){
          
     }

     public function login_staff(){
=======
          $this->view('pages/pharmacistLogin', $data); 
     }

     public function login_patient(){
          
     }

     public function login_staff(){

     }
>>>>>>> main

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

               $isExistingUser = $this->userModel->isUserExists($data['username'],$data['password']);

               if($isExistingUser){
                    $data['error'] = 'user already exists';
               }
               else{
                    $data['password'] = Crypto::createHash($data['password']);
                    if($this->userModel->register($data, 1)){
                         $age = Generate::age($data['dob']);
                         $OTPCode = Generate::verificationCode($data['email']);

                         $userId = $this->userModel->getUserId(1);
                         $regNo = Generate::regNo($userId);
                         $this->userModel->registerPatient($data, $age, $regNo, $OTPCode);
                         Url::redirect('user/verify');
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

     public function createUserSession($user){
          Session::init();
          Session::set('user_id',$user->user_id);
          Session::set('username',$user->username);
          Session::set('role_id',$user->role_id);
     }

     public function login_admin(){
          
     }

     public function createUserSession($user){
          Session::set('user_id',$user->user_id);
          Session::set('username',$user->username);
          Session::set('role_id',$user->role_id);
     }

     public function register_patient(){
          if(Request::isPost()){
               
          }
          $this->view('pages/patientRegister');
     }

     public function register_pharm(){
          if(Request::isPost()){
               
          }
          $this->view('pages/pharmacistRegister');
     }
     
     public function logout(){
<<<<<<< HEAD

          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
=======
          if(Request::isPost()){
>>>>>>> main
               Session::unset('user_id');
               Session::unset('username');
               Session::unset('role_id');
               Session::destroy();
               Url::redirect('user/login_doctor');
          } 
<<<<<<< HEAD
=======
     }

     public function verify(){
          $this->view('pages/signupVerification');
>>>>>>> main
     }

     public function error(){
          $this->view('404');
     }
}