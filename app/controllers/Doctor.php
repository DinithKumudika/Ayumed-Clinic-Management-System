<?php

class Doctor extends BaseController{

     public function index(){
<<<<<<< HEAD
          if(!Session::isSet('user_id')){
               Url::redirect('user/login_doctor');
          }
          else{
               $this->view('pages/doctor/index');
=======
          if(Session::isSet('user_id')){
               $this->view('pages/doctor/index');
               
          }
          else{
               Url::redirect('User/login_doctor');
>>>>>>> main
          } 
     }

     public function error(){
          $this->view('404');
     }
<<<<<<< HEAD
}
=======
}
>>>>>>> main
