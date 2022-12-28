<?php

use helpers\Session;
use utils\Url;
use utils\Flash;

class Pharmacist extends BaseController{

    private $rememberLoginModel;

    public function __construct(){
        $this->rememberLoginModel = $this->model('RememberLoginModel');

        if (!Session::isLoggedIn()) {
            Url::rememberRequestedPage();
            Flash::setFlash("login_first", "Please login before accessing that page", Flash::FLASH_INFO);
            Url::redirect('user/login/pharm');
        }
        else{

        }
    }

     public function index(){
         $this->view('pages/pharmacist/index');
     }

     public function error(){
          $this->view('404');
     }
}

?>