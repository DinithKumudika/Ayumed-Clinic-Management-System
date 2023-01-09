<?php

namespace utils;
/* wrapper class to handle responses */
class Response
{
    private $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function getStatusCode(){
        return http_response_code();
    }

    public function toJson(){
        return json_encode($this->data);
    }

    public function isJson(){
        $result = json_decode($this->data);

        if(json_last_error() === JSON_ERROR_NONE){
            return true;
        }
        else{
            return false;
        }
    }

    public function toObj(){
        if($this->isJson()){
            return json_decode($this->data);
        }
    }

    public function toAssoc(){
        if($this->isJson()){
            return json_decode($this->data, true);
        }
    }
}