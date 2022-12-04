<?php

namespace utils;

abstract class Crypto
{

    public static function createHash($string)
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }

    public static function verifyHash($hash, $string)
    {
        if (password_verify($string, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    public static function hashToken($token, $secret)
    {
        // hash the token using sha256 (SHA-2) hashing algorithm with a secret key
        return hash_hmac('sha256', $token, $secret);
    }
}