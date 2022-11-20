<?php

class Medicine extends BaseController{
     public $medicineModel;

     public function index(){
          $this->view('pages/pharmacist/medicines');
     }

     public function add(){
          $this->view('pages/pharmacist/addMedicines');
     }

     public function error(){
          $this->view('404');
     }
}