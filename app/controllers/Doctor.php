<?php

use helpers\Session;
use utils\Url;
use utils\Flash;

class Doctor extends BaseController
{

    private $rememberLoginModel;

    public function __construct()
    {
        $this->rememberLoginModel = $this->model('RememberLoginModel');

        if (!Session::isLoggedIn()) {
            Url::rememberRequestedPage();

            if(isset($_COOKIE['remember_me'])){
                $cookie = $_COOKIE['remember_me'];

                $rememberedLogin = $this->rememberLoginModel->findByToken($cookie);

                if (!$rememberedLogin) {
                    Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
                    Url::redirect('user/login/doctor');
                }
            }
            else{
                Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
                Url::redirect('user/login/doctor');
            }
        }
    }

    public function index()
    {
        $this->view('pages/doctor/index');
    }

    public function error()
    {
        $this->view('404');
    }
}