<?php

class Pharmacist extends BaseController{

     public function index(){
          if(!Session::isSet('user_id')){
               Url::redirect('user/login_pharm');
          }
          else{
               $this->view('pages/pharmacist/index');
          }
     }

     public function error(){
          $this->view('404');
     }
}
