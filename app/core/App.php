<?php
     // Core App class
     // Create the url and loads base controller
     // url format: /controller/method/params 
     
     class App {
          protected $controller;
          protected $method;
          protected $params = [];

          public function __construct(){
               $url = $this->getURL();

               // get controller from url
               $this->controller = $this->getController($url);
               unset($url[0]); 

               //require the controller
               require_once '../app/controllers/'. $this->controller . '.php';

               //Instantiate controller class
               $this->controller = new $this->controller;

               // get method from url
               $this->method = $this->getMethod($url);
               unset($url[1]);

               //get parameters from url
               $this->params = $this->getParams($url);

               call_user_func_array([$this->controller,$this->method],$this->params);
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

     private function getMethod($url){
          if(isset($url[1])){
               if(method_exists($this->controller, $url[1])){
                    $method = $url[1];   
               }
               else{
                    $method = "error";
               }
          }
          else{
               $method = "index";
          }
          return $method;
     }

     private function getParams($url){
          if(isset($url)){
               return array_values($url);
          }
          else{
               return [];
          }
     }

     private function getURL()
          {
               if (isset($_GET['url'])){
                    $url = rtrim($_GET['url'], '/');
                    $url = filter_var($url, FILTER_SANITIZE_URL);
                    $url = explode('/', $url);
                    return $url;
               }
          }
     
} 