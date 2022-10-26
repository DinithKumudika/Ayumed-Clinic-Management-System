<?php
     //Base controller

     class BaseController{
          // Load model
          public function model($model){
               require_once '../app/models/' . $model . '.php';

               //Instantiate model
               return new $model();
          }

          // Load view
          public function view($view, $data = []){
               if(file_exists('../app/views/' . $view . '.php')){
                    require_once '../app/views/' . $view . '.php';
               }
          }
     }