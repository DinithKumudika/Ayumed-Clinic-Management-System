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

     public static function getIpAddress(){
         // to get shared ISP IP address
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
             $ip_addr = $_SERVER['HTTP_CLIENT_IP'];
         }
         // to get IPs passing through proxy servers
         elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
             $ip_addr = $_SERVER['HTTP_X_FORWARDED_FOR'];
         }
         // to get ip is from the remote address
         else{
             $ip_addr = $_SERVER['REMOTE_ADDR'];
         }
         return $ip_addr;
     }
}



