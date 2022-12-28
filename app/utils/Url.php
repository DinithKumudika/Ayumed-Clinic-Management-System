<?php
namespace utils;
use helpers\Session;
abstract class Url{
     public static function redirect($location){
          header("Location: " .URL_ROOT. '/' . $location);
     }

     public static function redirectToRequested($location){
         header("Location: " . $location);
     }

     public static function redirectToHome($roleId){
          switch ($roleId) {
               case 1:
                    self::redirect('patient/index');
                    break;
               case 2:
                    self::redirect('doctor/index');
                    break;
               case 3:
                    self::redirect('staff/index');
                    break;
               case 4:
                    self::redirect('pharmacist/index');
                    break;
               case 5:
                    self::redirect('admin/index');
                    break;
               default:
                    self::redirect('user/login');
                    break;
          }
     }

     public static function rememberRequestedPage(){
         $page_url = $_SERVER['REQUEST_URI'];
         Session::set('return', $page_url);
     }

     public static function getReturnPage(){
             return Session::get('return');
     }
}



