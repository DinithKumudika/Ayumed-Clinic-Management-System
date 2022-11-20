<?php

class Login extends BaseController
{
     public function __construct()
     {
     }

     public function index()
     {
          $this->view('pages/pharmacistlogin');
     }

     public function error(){
          $this->view('404');
     }
}