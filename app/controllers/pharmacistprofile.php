<?php

use helpers\Session;
use utils\Flash;
use utils\Url;
use utils\Generate;

class pharmacistprofile extends BaseController
{
    private $userModel;
    private $pharmacistModel;

    public function __construct (){

        if(!Session::isLoggedIn()){
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login_pharm');
        }
        else{
            $this->userModel = $this->model("UserModel");
            $this->pharmacistModel = $this->model("PharmacistModel");
        }
    }

    public function index($userId){
        $roleId = Session::get('role_id');

        $user = $this->userModel->getUser(Session::get('username'));
        $data['user'] = $user;

        if($roleId == 4){
            $pharmacist = $this->pharmacistModel->getPharmacist($userId);
            $pharmacist->DOB = Generate::changeDOBFormat($pharmacist->DOB);

            $data['pharmacist'] = $pharmacist;
            $this->view('pages/Pharmacist/profile',$data);
        }
    }

    public function add(){

    }

    public function edit($userId){
        $roleId = Session::get('role_id');
        $user = $this->userModel->getUser(Session::get('username'));
        $data['user'] = $user;
        if($roleId == 4){
            $pharmacist = $this->PharmacistModel->getPharmacist($userId);
            $data['pharmacist'] = $pharmacist;
            $this->view('pages/Pharmacist/editprofile',$data);
        }
    }

    public function error()
    {
        $this->view('404');
    }
}