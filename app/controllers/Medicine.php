<?php
use utils\Request;
use utils\Url;
use utils\Flash;
use utils\Generate;
use helpers\Session;


class Medicine extends BaseController{
     public $pharmacistModel;
     public $medicineModel;

     public function __construct()
     {
          if(!Session::isLoggedIn()){
               Url::redirect('user/login_pharm');
          }
          $this->pharmacistModel = $this->model('PharmacistModel');
          $this->medicineModel = $this->model('MedicineModel');
     }

     // public function index(){
     //      $this->view('pages/pharmacist/viewmedicines');
     // }

     public function add(){

           // get pharmacist id of the currently logged in pharmacist
        $pharmacistId = $this->pharmacistModel->getPharmacistId(Session::get('user_id'));
           
          if(Request::isPost()){
               Request::removeTags();

               $data = [
                    'name'=>trim($_POST['name']),
                    'weight'=>trim($_POST['weight']),
                    'unit'=>trim($_POST['add-unit']),
                    'category'=>trim($_POST['add-category']),
                    'quantity'=>trim($_POST['quantity']),
                    // 'availability'=>trim($_POST['add-availability']),
                    'error'=> ''
               ];
               //TODO : fix
               $isExistingMedicine = $this->medicineModel->isMedicineExists($data['name']);

               if($isExistingMedicine){
                    $data['error'] = 'medicine already exists';
               }
               else{
                    if($this->medicineModel->add($data)){
                         //$userId = $this->userModel->getUserId(Session::get('role_id'));
                         // echo "hari";
                         Url::redirect('medicine/index');
                    }
                    else{
                         echo "erooooooooor";
                    }
               }
          }
          else{
               $data = [
                    'name'=>'',
                    'weight'=>'',
                    'unit'=>'',
                    'category'=>'',
                    'quantity'=>'',
                    // 'availability'=>'',
                    'error'=> ''
               ];
          }

           $this->view('pages/pharmacist/addmedicines',$data);
      }

     public function index()
     {
     // get pharmacist id of the currently logged in pharmacist
        $pharmacistId = $this->pharmacistModel->getPharmacistId(Session::get('user_id'));

          $medicines = $this->medicineModel->viewAll($pharmacistId);

          if($medicines){
               $data['medicines']= $medicines;
          }
          else{

          }
           $this->view('pages/pharmacist/viewmedicines',$data);
      }

     public function error(){
          $this->view('404');
     }
}
