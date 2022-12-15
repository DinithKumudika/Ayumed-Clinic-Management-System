<?php
namespace utils;

abstract class Validate {
     // call to abstract api to validate email is existing one or not
     public static function validateEmail($email){
          $api_key = $_ENV['API_KEY'];

          // initialize cURL
          $ch = curl_init();
          curl_setopt(
               $ch, 
               CURLOPT_URL, 
               'https://emailvalidation.abstractapi.com/v1/?api_key=' . $api_key . '&email=' . $email
          );

          // return contents as variables
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          // set follow redirects to true
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

          // execute request
          $data = curl_exec($ch);

          // close cURL handle
          curl_close($ch);

          return $data;
     }
}  