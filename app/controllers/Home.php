<?php
use helpers\Session;
use utils\Url;
class Home extends BaseController
{
     public function __construct()
     {

     }

     public function index()
     {
          $data = [
               'title' => 'Ayumed'
          ];

          $this->view('pages/index', $data);
     }

     public function error(){
          $this->view('404');
     }
}
