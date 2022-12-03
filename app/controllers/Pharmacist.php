<?php
use utils\Request;
use utils\Url;
use utils\Flash;
use utils\Generate;
use helpers\Session;

class Pharmacist extends BaseController{
     public $PharmacistModel;
     public $MedicineModel;

     public function index(){
          if(!Session::isSet('user_id')){
               Url::redirect('user/login_pharm');
          }
          else{
               $this->view('pages/pharmacist/index');
          }
     }

     public function viewmedicines(){

     }

     public function addmedicines(){

     }


     public function error(){
          $this->view('404');
     }
}
