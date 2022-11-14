<?php

abstract class Request{

     public static function isPost(){
          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               return true;
          }
          else{
               return false;
          }
     }

     public static function isGet(){
          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               return true;
          }
          else{
               return false;
          }
     }
     
     public static function inputPost($input){
          if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
               return trim(strip_tags($_POST[$input]));
          }   
     }
     
     public static function inputGet($input){
          if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get"){
               return trim(strip_tags($_GET[$input]));
          }
     }
}



