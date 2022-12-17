<?php

use helpers\Session;
use utils\Url;

class Pharmacist extends BaseController{

     public function index(){
          // if(!Session::isSet('user_id')){
          //      Url::redirect('user/login_pharm');
          // }
          $this->view('pages/pharmacist/index');
          // else{
          //      $this->view('pages/pharmacist/index');
          // }
     }

     public function error(){
          $this->view('404');
     }
}
?>