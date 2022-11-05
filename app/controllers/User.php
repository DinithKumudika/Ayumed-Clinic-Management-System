<?php

class User extends BaseController{

     public $userModel;

     public function __construct()
     {
          $this->userModel = $this->model('UserModel');
     }

     public function login(){

          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               //filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);

               $data = [
                    'username'=>trim($_POST['username']),
                    'password'=>trim($_POST['password']),
                    'error'=> ''
               ];

               if(!empty($data['username']) && !empty($data['password'])){
                    $userLoggedIn = $this->userModel->login($data['username'], $data['password']);

                    if($userLoggedIn){
                         $this->createUserSession($userLoggedIn);
                         redirect('Home/index');  
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

     public function createUserSession($user){
          $this->setSessionVar('user_id',$user->user_id);
          $this->setSessionVar('username',$user->username);
          $this->setSessionVar('role_id',$user->role_id);
     }

     public function register(){

     }

     public function logout(){
          session_unset($_SESSION['user_id']);
          session_unset($_SESSION['username']);
          session_unset($_SESSION['role_id']);
          session_destroy();
          redirect('Users/login');
     }

     public function error(){
          $this->view('404');
     }
}