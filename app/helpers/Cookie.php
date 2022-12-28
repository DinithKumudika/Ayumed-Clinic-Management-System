<?php

namespace helpers;

abstract class Cookie
{
    // set a cookie
    public static function set($name, $value, $expiry = 0, $path = '/'){
        $expires_at = time() + $expiry;
        setcookie($name, $value, $expires_at, $path);
    }

    // get cookie value
    public static function get($name){
        if(isset($_COOKIE[$$name])){
            return $_COOKIE[$name];
        }
    }

    // check if a cookie exists or not
    public static function exists($name){
        if(isset($_COOKIE[$name])){
            return true;
        }
        else{
            return false;
        }
    }

    // delete a cookie
    public static function delete($name, $path = '/'){
        self::set($name,'', time() - 3600, $path);
    }
}