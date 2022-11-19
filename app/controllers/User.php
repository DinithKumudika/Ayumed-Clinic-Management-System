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

               foreach ($_POST as $key => $value) {
                    $_POST[$key] = strip_tags($value);
               }

               $data = [
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'error'=> ''
               ];

               if(!empty($data['username']) && !empty($data['password'])){
                    $userLoggedIn = $this->userModel->login($data['username'], $data['password']);

                    if($userLoggedIn){
                         $this->createUserSession($userLoggedIn);
                         Url::redirect('doctor/index');  
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

          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               Session::unset('user_id');
               Session::unset('username');
               Session::unset('role_id');
               Session::destroy();
               Url::redirect('user/login_doctor');
          } 
     }

     public function error(){
          $this->view('404');
     }
}