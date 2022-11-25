<?php
use helpers\Session;
use utils\Url;

class Appointment extends BaseController{

    public function __construct()
    {
//        if(!Session::isLoggedIn()){
//            Url::redirect('user/login_doctor');
//        }
    }

    public function index(){
        $this->view('pages/doctor/index');
    }

    public function add(){

    }

    public function error(){
        $this->view('404');
    }
}
