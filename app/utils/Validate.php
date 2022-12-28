<?php

namespace utils;
use utils\Response;
use utils\Crypto;

abstract class Validate
{
    // call to abstract api to validate email is existing one or not
    public static function validateEmail($email)
    {
        $api_key = $_ENV['API_KEY'];

        // initialize cURL
        $curl = curl_init();

        $params = http_build_query([
            'api_key' => $api_key,
            'email' => $email
        ]);

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://emailvalidation.abstractapi.com/v1/?' . $params,
            // return contents as variables
            CURLOPT_RETURNTRANSFER => true,
            // set follow redirects to true
            CURLOPT_FOLLOWLOCATION => true
        ]);

        // execute request and get response
        $res = curl_exec($curl);

        // close cURL handle
        curl_close($curl);

        // return response data as associative array
        $response = new Response($res);
        $data = $response->toAssoc();

        $status = $data["deliverability"];

        if ($status == "UNDELIVERABLE") {
            return [
                'status' => false,
                'error' => "email doesn't exist"
            ];
        }
        else if($status == "DELIVERABLE"){
            return [
                'status' => true,
                'error' => ""
            ];
        }
    }

    public static function validatePassword($password, $hash)
    {
        if(!Crypto::verifyHash($hash, $password)){
            return [
                'status' => false,
                'error' => "*invalid Password"
            ];
        }
        else{
            return [
                'status' => true,
                'error' => ""
            ];
        }
    }
}
