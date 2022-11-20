<?php

class Doctor extends BaseController{

     public function index(){
          if(Session::isSet('user_id')){
               $this->view('pages/doctor/index');
               
          }
          else{
               Url::redirect('User/login_doctor');
          } 
     }

     public function error(){
          $this->view('404');
     }
}
