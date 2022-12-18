<?php
namespace utils;
abstract class Url{
     public static function redirect($location){
          header("Location: " .URL_ROOT. '/' . $location);
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
                    self::redirect('staffMem/index');
                    break;
               case 4:
                    self::redirect('pharmacist/index');
               case 5:
                    self::redirect('admin/index');
               default:
                    self::redirect('user/login');
                    break;
          }
     }
}



