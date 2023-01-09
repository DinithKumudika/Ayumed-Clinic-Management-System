<?php

class UserModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getUserPassword($username, $roleId)
    {
        if ($this->isUserExists($username, $roleId)) {
            $sql = "SELECT `password` FROM `tbl_users` WHERE `username` = :user AND `role_id` = :role_id";

            $this->prepare($sql);

            $params = [
                'user' => $username,
                'role_id' => $roleId
            ];

            $row = $this->result($params);

            if ($this->rowCount() > 0) {
                return $row->password;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function register($data, $roleId)
    {
        $sql = "INSERT INTO `tbl_users`(`first_name`,`last_name`,`email`,`username`,`password`,`avatar`,`role_id`) 
                    VALUES (
                        :first_name, 
                        :last_name, 
                        :email, 
                        :username, 
                        :password,
                        :avatar_url,
                        :role_id
                    )";

        $this->prepare($sql);

        $params = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $data['password'],
            'avatar_url' => URL_ROOT . "/images/profile.jpg",
            'role_id' => $roleId
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return  false;
        }
    }

    public function getUser($username, $roleId = null)
    {
        if ($roleId == null){
            $sql = "SELECT * FROM `tbl_users` WHERE `username` = :user";
            $this->prepare($sql);

            $params = [
                'user' => $username
            ];
        }
        else{
            $sql = "SELECT * FROM `tbl_users` WHERE `username` = :user AND `role_id` = :role_id";
            $this->prepare($sql);

            $params = [
                'user' => $username,
                'role_id' => $roleId
            ];
        }

        $user = $this->result($params);

        if ($this->rowCount() > 0) {
            return $user;
        } else {
            return false;
        }
    }

    public function isUserExists($username, $roleId = null)
    {
        if ($roleId == null){
            $sql = "SELECT * FROM `tbl_users` WHERE `username` = :user";
            $this->prepare($sql);

            $params = [
                'user' => $username
            ];
        }
        else{
            $sql = "SELECT * FROM `tbl_users` WHERE `username` = :user AND `role_id` = :role_id";

            $this->prepare($sql);

            $params = [
                'user' => $username,
                'role_id' => $roleId
            ];
        }

        $user = $this->result($params);

        if ($this->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserId($username)
    {
        $sql = "SELECT * FROM `tbl_users` WHERE `username` = :username";
        $this->prepare($sql);

        $params = [
            'username' => $username,
        ];

        $user = $this->result($params);

        if ($this->rowCount() > 0) {
            return $user->user_id;
        } else {
            return  false;
        }
    }

    public function recordLogin($user_id, $username, $role_id, $ip_addr){
        $sql = "INSERT INTO `tbl_logins`(`user_id`, `username`, `role_id`, `ip_address`) 
                VALUES (:user_id, :username, :role_id, :ip_addr)";

        $this->prepare($sql);

        $params = [
            'user_id' => $user_id,
            'username' => $username,
            'role_id'=> $role_id,
            'ip_addr' => $ip_addr
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return false;
        }
    }

    public function setLogOut($user_id, $time_login, $time_logout){
        $sql = "UPDATE `tbl_logins` SET `loggedout_at` = :logout_time WHERE `user_id` = :user_id AND `logged_at` = :login_time";
        $this->prepare($sql);

        $params = [
            'logout_time' => $time_logout,
            'user_id' => $user_id,
            'login_time' => $time_login
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return false;
        }
    }

    public function passwordReset($token_hash, $expires_at, $user_id){
        $sql = "UPDATE `tbl_users` SET `password_reset_hash` = :token_hash, `password_reset_expiry` = :expires_at WHERE `user_id` = :user_id";
        $this->prepare($sql);
        $params = [
            'token_hash' => $token_hash,
            'expires_at' => $expires_at,
            'user_id' => $user_id
        ];

        if($this->execute($params)){
            return true;
        }
        else{
            return false;
        }
    }

    public function getUserByResetToken($hashed_token){
        $sql = "SELECT * FROM `tbl_users`WHERE `password_reset_hash` = :token_hash";
        $this->prepare($sql);

        $params = [
            'token_hash' => $hashed_token
        ];

        $row = $this->result($params);

        if($this->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function resetPassword($password, $user_id){
        $sql = "UPDATE `tbl_users` 
                SET `password` = :password,
                    `password_reset_hash`= NULL, 
                    `password_reset_expiry` = NULL 
                WHERE `user_id` = :user_id";
        $this->prepare($sql);
        $params = [
            'password' => $password,
            'user_id' => $user_id
        ];

        if($this->execute($params)){
            return true;
        }
        else{
            return false;
        }
    }
}
