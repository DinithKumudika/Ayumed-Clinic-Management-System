<?php

use helpers\Session;
use utils\Flash;
use utils\Url;

class Staff extends BaseController
{
    private $rememberLoginModel;

    public function __construct()
    {
        $this->rememberLoginModel = $this->model('RememberLoginModel');

        if (!Session::isLoggedIn()) {
            Url::rememberRequestedPage();
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login/staff');
        }
        else{

        }
    }

    public function index()
    {
        $this->view('pages/staffMem/index');
    }

    public function addPatient(){

    }

    public function error()
    {
        $this->view('404');
    }
}