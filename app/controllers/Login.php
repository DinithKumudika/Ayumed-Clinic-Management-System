<?php

class Login extends BaseController
{
     public function __construct()
     {
     }

     public function index()
     {
          $this->view('pages/login');
     }

     public function error(){
          $this->view('404');
     }
}