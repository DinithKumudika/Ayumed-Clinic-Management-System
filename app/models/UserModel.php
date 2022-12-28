<?php

use utils\Crypto;
use utils\Token;
use utils\Validate;

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

    public function registerPatient($data, $age, $regNo, $code, $user_id)
    {
        $sql = "INSERT INTO `tbl_patients`(`NIC`,`DOB`,`age`,`gender`,`phone_no`,`address`,`martial_status`,`reg_no`, 
                    `otp_code`, `verification_status`, `user_id`) 
                    VALUES (
                         :nic,
                         :dob,
                         :age,
                         :gender,
                         :phone_no,
                         :address,
                         :martial_status,
                         :reg_no,
                         :otp_code,
                         :verification_status,
                         :user_id
                    )";

        $this->prepare($sql);

        $params = [
            'nic' => $data['nic'],
            'dob' => $data['dob'],
            'age' => $age,
            'gender' => $data['gender'],
            'phone_no' => $data['phone'],
            'address' => $data['address'],
            'martial_status' => $data['martial-status'],
            'reg_no' => $regNo,
            'otp_code' => $code,
            'verification_status' => false,
            'user_id' => $user_id
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return  false;
        }
    }

    //A temporary table. Just for the interim presentation.
    public function registerDoctor($data, $user_id)
    {
        $sql = "INSERT INTO `tbl_doctors`(`NIC`,`phone_no`,`user_id`) 
        VALUES (
             :nic,
             :phone_no,
             :user_id
        )";

        $this->prepare($sql);

        $params = [
            'nic' => $data['nic'],
            'phone_no' => $data['phone'],
            'user_id' => $user_id
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return  false;
        }
    }

    public function registerStaff($staff_no, $user_id)
    {
        $sql = "INSERT INTO `tbl_staff`(`staff_reg_no`,`status`,`user_id`) 
        VALUES (
             :staff_reg_no,
             :status,
             :user_id
        )";

        $this->prepare($sql);

        $params = [
            'staff_reg_no' => $staff_no,
            'status' => NULL,
            'user_id' => $user_id
        ];

        if ($this->execute($params)) {
            return true;
        } else {
            return  false;
        }
    }

    public function registerPharmacist($phoneNo, $userId)
    {
        $sql = "INSERT INTO `tbl_pharmacists`(`user_id`, `Phone_No`) 
        VALUES (
                :user_id,
                :Phone_No
        )";

        $this->prepare($sql);

        $params = [
            'user_id' => $userId,
            'Phone_No' => $phoneNo
        ];

        if ($this->execute($params)) {
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
}
