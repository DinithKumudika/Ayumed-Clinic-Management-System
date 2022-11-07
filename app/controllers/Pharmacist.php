<?php

class Pharmacist extends BaseController{

     public function index(){
          if(!Session::isSet('user_id')){
               redirect('user/login_pharmacist');
          }
          else{
               $this->view('pages/pharmacist/index');
          }
     }

     public function error(){
          $this->view('404');
     }
}