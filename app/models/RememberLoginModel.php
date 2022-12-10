<?php
use utils\Token;
class RememberLoginModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function remember($hashedToken, $userId, $expTime){

        $sql = "INSERT INTO `tbl_remembered` (`token_hash`,`user_id`,`expires_at`) 
                   VALUES (
                        :hashed_token, 
                        :user_id, 
                        :expires_at
                   )";

        $this->prepare($sql);

        $params = [
            'hashed_token'=>$hashedToken,
            'user_id'=>$userId,
            'expires_at'=> date('Y-m-d H:i:s', $expTime)
        ];

        if($this->execute($params)){
            return true;
        }
        else{
            return false;
        }
    }


    public function findByToken($token){
        $token = new Token($token);
        $tokenHash = $token->getHashedToken();
        $sql = "SELECT * FROM `tbl_remembered` WHERE `token_hash` = :token_hash";
        $this->query($sql);

        $params = [
            'token_hash'=>$tokenHash
        ];

        $validToken = $this->result($params);

        if($this->rowCount()>0){
            return $validToken;
        }
        else{
            return false;
        }
    }
}