<?php

class Patient extends BaseController{

     public $appointmentModel;

     public function __construct()
     {
          $this->appointmentModel = $this->model('AppointmentModel');
     }

     public function index(){
//          $userId = Session::get('user_id');
//          $appointments = $this->appointmentModel->viewAll($userId);

//          $data = [
//               'appointments'=>$appointments
//          ];
          
          $this->view('pages/patient/index');
     }

     public function error(){
          $this->view('404');
     }
}