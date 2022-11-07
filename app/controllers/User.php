<?php

class User extends BaseController{

     public $userModel;

     public function __construct()
     {
          $this->userModel = $this->model('UserModel');
     }

     public function login_doctor(){

          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               //filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);

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
                         redirect('doctor/index');  
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

          $this->view('pages/login', $data); 
     }

     public function login_pharmacist(){
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
                         redirect('pharmacist/index');  
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

     public function createUserSession($user){
          Session::set('user_id',$user->user_id);
          Session::set('username',$user->username);
          Session::set('role_id',$user->role_id);
     }

     public function register(){

     }

     public function logout(){

          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               Session::unset('user_id');
               Session::unset('username');
               Session::unset('role_id');
               Session::destroy();
               redirect('user/login_doctor');
          } 
     }

     public function error(){
          $this->view('404');
     }
}