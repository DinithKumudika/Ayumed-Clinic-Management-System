<?php

class ProfileModel extends Database
{
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function updateUserDetails($data, $user_id){
        $sql = "UPDATE `tbl_users` 
                SET `first_name` = :first_name, `last_name` = :last_name, `email` = :email, `username` = :username
                WHERE `user_id` = :user_id";

        $this->prepare($sql);

        $params = [
            'first_name' => $data['first_name'],
            'last_name' => $data ['last_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'user_id' => $user_id
        ];

        if($this->execute($params)){
            return true;
        }
        else {
            return false;
        }
    }

    public function updatePatientDetails($data, $user_id){
        $sql = "UPDATE `tbl_patients` 
                SET `DOB` = :dob,`age` = :age, `phone_no` = :phone_no, `address` = :address, `whatsapp` = :whatsapp, `sms` = :sms, `email` = :email 
                WHERE `user_id` = :user_id";

        $this->prepare($sql);

        $params = [
            'dob' => $data['dob'],
            'age' => $data['age'],
            'phone_no' => $data['phone_no'],
            'address' => $data['address'],
            'whatsapp' => $data['whatsapp_notification'],
            'sms' => $data['sms_notification'],
            'email' => $data['email_notification'],
            'user_id' => $user_id
        ];

        if($this->execute($params)){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateAvatar($img_path, $user_id){
        $sql = "UPDATE `tbl_users` SET `avatar` = :avatar WHERE `user_id` = :user_id";
        $this->prepare($sql);

        $params = [
            'avatar' => $img_path,
            'user_id' => $user_id
        ];

        if($this->execute($params)){
            return true;
        }
        else {
            return false;
        }
    }

    public function getNotificationMethods($user_id){
        $sql = "SELECT `whatsapp`, `sms`, `email` FROM `tbl_patients` WHERE `user_id` = :user_id";
        $this->prepare($sql);

        $params = [
            'user_id' => $user_id
        ];

        $notificationMethods = $this->result($params);

        if ($this->rowCount() > 0) {
            return $notificationMethods;
        } else {
            return false;
        }
    }

    public function getAvatar($user_id)
    {
        $sql = "SELECT `avatar` FROM `tbl_users` WHERE `user_id` = :id";
        $this->prepare($sql);

        $params = [
            'id' => $user_id
        ];

        $avatar_url = $this->result($params);

        if ($this->rowCount() > 0) {
            return $avatar_url->avatar;
        } else {
            return false;
        }
    }
}