<?php
/* handles tokens in application */
namespace utils;
class Token
{
    protected $token;
    protected $hashedToken;

    public function __construct($token_value = null){
        $secret = $_ENV['TOKEN_SECRET_KEY'];

        if($token_value){
            $this->token = $token_value;
        }
        else{
            // create a token with 32 characters
            $this->token = bin2hex(random_bytes(16));
        }
        $this->hashedToken = Crypto::hashToken($this->token, $secret);
    }

    public function getHashedToken(){
        return $this->hashedToken;
    }

    public static function csrfToken(){
        return md5(uniqid(mt_rand(),true));
    }

    public function getTokenValue(){
        return $this->token;
    }
}