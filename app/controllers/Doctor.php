<?php

class Doctor extends BaseController{

     public function index(){
          if(!Session::isSet('user_id')){
               Url::redirect('user/login_doctor');
          }
          else{
               $this->view('pages/doctor/index');
          } 
     }

     public function error(){
          $this->view('404');
     }
}
