<?php

use helpers\Session;
use utils\Url;
use utils\Flash;

class Doctor extends BaseController{

     public function __construct()
     {
          if(!Session::isLoggedIn()){
               Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
               Url::redirect('user/login_doctor');
          }
     }

     public function index(){
          $this->view('pages/doctor/index');
     }

     public function error(){
          $this->view('404');
     }
}