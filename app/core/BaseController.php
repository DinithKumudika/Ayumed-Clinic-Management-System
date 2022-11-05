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

          // get a value of session variable
          public function getSessionVar($name){
               if(!empty($name)){
                    return $_SESSION[$name];
               }
          }

          // set a value of session variable
          public function setSessionVar($name,$value){
               if(!empty($name) && !empty($value)){
                    $_SESSION[$name] = $_SESSION[$value];
               }
          }
     } 