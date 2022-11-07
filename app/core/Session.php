<?php

abstract class Session{
     //start session
     public static function init(){
          @session_start();
     }


     // set a value of session variable
     public static function set($key,$value){
          if(!empty($key) && !empty($value)){
               $_SESSION[$key] = $value;
          }
     }

     // get a value of session variable
     public static function get($key){
          if(!empty($key)){
               return $_SESSION[$key];
          }
     }

     //check whether session variable is set or not
     public static function isSet($key){
          if(isset($_SESSION[$key])){
               return true;
          }
          else{
               return false;
          }
     }


     //unset session variables
     public static function unset($key){
          if(!empty($key)){
               unset($_SESSION[$key]);
          }
     }

     //destroy session
     public static function destroy(){
          session_destroy();
     }
}