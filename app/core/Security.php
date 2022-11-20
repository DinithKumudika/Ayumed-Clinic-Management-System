<?php

abstract class Security{

     public static function createHash($string){
          return password_hash($string,PASSWORD_DEFAULT);
     }

     public static function verifyHash($hash, $string){
          if(password_verify($string, $hash)){
               return true;
          }
          else{
               return false;
          }
     }

     public function accVerification(){

     }
}