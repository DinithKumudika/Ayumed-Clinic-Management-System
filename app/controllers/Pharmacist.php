<?php
use utils\Url;
use utils\Flash;
use utils\Generate;
use helpers\Session;

class Pharmacist extends BaseController{

     public function __construct(){
     }

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
