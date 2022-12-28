<?php
namespace utils;
abstract class Request{

    public const CONTENT_TYPE_JSON = 'application/json';
    public const HEADER_CONTENT_TYPE = 'Content-Type';
    public const HEADER_LOCATION = 'location';

    public static function  getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

     public static function isPost(){
          if(self::getMethod() == "post"){
               return true;
          }
          else{
               return false;
          }
     }

     public static function isGet(){
          if(self::getMethod() == "get"){
               return true;
          }
          else{
               return false;
          }
     }

     public static function setHeader($header, $header_value){
            header($header . ': ' . $header_value);
     }

     public static function getBody(){
        $data = [];

        if(self::isGet()){
            foreach ($_GET as $key=>$value){
                $data[$key] = filter_input(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

         if(self::isPost()){
             foreach ($_POST as $key=>$value){
                 $data[$key] = filter_input(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
             }
         }

         return $data;
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



