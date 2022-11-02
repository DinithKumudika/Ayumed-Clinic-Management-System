<?php
     //Base controller

     class BaseController{
          // Load model
          protected function model($model){
               require_once '../app/models/' . $model . '.php';

               //Instantiate model
               return new $model();
          }

          // Load view
          protected function view($view, $data=[]){
               if(file_exists('../app/views/' . $view . '.php')){
                    require_once '../app/views/' . $view . '.php';
               }
          }
     }