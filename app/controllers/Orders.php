<?php
use utils\Request;
use utils\Url;
use utils\Flash;
use utils\Generate;
use helpers\Session;


class Orders extends BaseController{
     public $pharmacistModel;
     public $orderModel;

     public function __construct()
     {
          if(!Session::isLoggedIn()){
               Url::redirect('user/login_pharm');
          }
          $this->pharmacistModel = $this->model('PharmacistModel');
          $this->orderModel = $this->model('OrderModel');
     }

     public function index()
     {
     // get pharmacist id of the currently logged in pharmacist
        $pharmacistId = $this->pharmacistModel->getPharmacistId(Session::get('user_id'));

          $orders = $this->orderModel->viewAll($pharmacistId);

          if($orders){
               $data['orders']= $orders;
          }
          else{

          }
           $this->view('pages/Pharmacist/orders',$data);
      }

     public function error(){
          $this->view('404');
     }
}