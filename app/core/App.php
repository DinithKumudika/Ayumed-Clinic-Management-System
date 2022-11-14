<?php
     // Core App class
     // Create the url and loads base controller
     // url format: /controller/action/params 
     
     class App {
          protected $controller;
          protected $action;
          protected $params = [];

          public function __construct(){
               $url = $this->parseURL();

               // get controller from url
               $this->controller = $this->getController($url);
               unset($url[0]); 

               //require the controller
               require_once '../app/controllers/'. $this->controller . '.php';

               //Instantiate controller class
               $this->controller = new $this->controller;

               // get method from url
               $this->action = $this->getAction($url);
               unset($url[1]);

               //get parameters from url
               $this->params = $this->getParams($url);

               call_user_func_array([$this->controller,$this->action],$this->params);

               //start session
               Session::init();
     }

     private function getController($url){
          if(file_exists('../app/controllers/' . ucwords($url[0]). '.php' )){
               $controller = ucwords($url[0]);     
          }
          else{
               $controller = "Home";
          }
          return $controller;
     }

     private function getAction($url){
          if(isset($url[1])){
               if(method_exists($this->controller, $url[1])){
                    $action = $url[1];   
               }
               else{
                    $action = "error";
               }
          }
          else{
               $action = "index";
          }
          return $action;
     }

     private function getParams($url){
          if(isset($url)){
               return array_values($url);
          }
          else{
               return [];
          }
     }

     private function parseURL()
          {
               if (isset($_GET['url'])){
                    $url = rtrim($_GET['url'], '/');
                    $url = filter_var($url, FILTER_SANITIZE_URL);
                    $url = explode('/', $url);
                    return $url;
               }
          }
     
} 