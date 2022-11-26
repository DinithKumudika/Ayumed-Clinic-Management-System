<?php

namespace utils;

abstract class Flash
{
    protected const FLASH = "FLASH_MESSAGES";

    // flash message types
    public const  FLASH_DANGER = "danger";
    public const  FLASH_WARNING = "warning";
    public const  FLASH_INFO = "info";
    public const  FLASH_SUCCESS = "success";

    // set flash message
    public static function setFlash($key, $message, $type){

        // remove flash messages with the same key
        if(isset($_SESSION[self::FLASH][$key])){
            unset($_SESSION[self::FLASH][$key]);
        }

        $_SESSION[self::FLASH][$key] = [
            'message' => $message,
            'type' => $type
        ];
    }

    // display flash message
    public static function flash($key){
        if(!isset($_SESSION[self::FLASH][$key])){
            return false;
        }

        // get message from the session
        $flash_message = $_SESSION[self::FLASH][$key];

        // remove flash message
        unset($_SESSION[self::FLASH][$key]);

        // display flash message
        //return "<div class='flash flash-". $flash_message['type'] ."'>". $flash_message['message'] ."</div>";

        return "<script type='text/javascript'>
            Swal.fire({
                position: 'top-end',
                icon: '".$flash_message['type']."',
                title: '".$flash_message['message']."',
                showConfirmButton: false,
                time: 2000
            });
        </script>";
    }
}