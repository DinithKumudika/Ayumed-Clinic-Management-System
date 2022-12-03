<?php
namespace utils;
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
          if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get"){
               return true;
          }
          else{
               return false;
          }
     }

     public static function removeTags(){
          foreach ($_POST as $key => $value) {
               $_POST[$key] = strip_tags($value);
          }
     }
}



