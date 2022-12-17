<?php

use helpers\Session;
use utils\Flash;
use utils\Url;

class Staff extends BaseController
{

    public function __construct()
    {
        if (!Session::isLoggedIn()) {
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login_staff');
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