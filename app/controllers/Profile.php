<?php

use helpers\Session;
use utils\Flash;
use utils\Url;
use utils\Generate;

class Profile extends BaseController
{
    private $userModel;
    private $patientModel;

    public function __construct (){

        if(!Session::isLoggedIn()){
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login_patient');
        }
        else{
            $this->userModel = $this->model("UserModel");
            $this->patientModel = $this->model("PatientModel");
        }
    }

    public function index($userId){
        $roleId = Session::get('role_id');

        $user = $this->userModel->getUser(Session::get('username'));
        $data['user'] = $user;

        if($roleId == 1){
            $patient = $this->patientModel->getPatient($userId);
            $patient->DOB = Generate::changeDOBFormat($patient->DOB);

            $data['patient'] = $patient;
            $this->view('pages/patient/profile',$data);
        }
    }

    public function add(){

    }

    public function edit($userId){
        $roleId = Session::get('role_id');
        $user = $this->userModel->getUser(Session::get('username'));
        $data['user'] = $user;
        if($roleId == 1){
            $patient = $this->patientModel->getPatient($userId);
            $data['patient'] = $patient;
            $this->view('pages/patient/editProfile',$data);
        }
    }

    public function error()
    {
        $this->view('404');
    }
}