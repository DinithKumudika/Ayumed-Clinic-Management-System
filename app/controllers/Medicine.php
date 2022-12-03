<?php
use helpers\Session;
use utils\Url;

class Medicine extends BaseController{
     // public $medicineModel;

     public function __construct(){
     }
 

     public function index(){
          $this->view('pages/pharmacist/index');
     }

     // public function add(){
     //      $this->view('pages/pharmacist/addMedicines');
     // }

     public function error(){
          $this->view('404');
     }
}