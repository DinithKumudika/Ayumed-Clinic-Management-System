<?php

class PharmacistModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // add new pharmacist
    public function add($phoneNo, $userId){
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

    // get all pharmacists
    public function getAll(){
        $sql = "SELECT 
            P.`Phone_No`,
            P.`status`,
            U.`first_name`, 
            U.`last_name`, 
            U.`email`, 
            U.`username`  
            FROM `tbl_pharmacists` AS P INNER JOIN `tbl_users` AS U ON P.`user_id` = U.`user_id`";

        $pharmacists = $this->queryAll($sql);

        if($this->rowCount()>0){
            return $pharmacists;
        }
        else{
            return false;
        }
    }

    // get pharmacist id by user id
    public function getPharmacistId($userId){
        $sql = "SELECT * FROM `tbl_pharmacists` WHERE `user_id` = :id";
        $this->prepare($sql);
        $params = [
            'id'=>$userId
        ];
        $row = $this->result($params);

        if($this->rowCount()>0){
            return $row->id;
        }
        else{
            return false;
        }
    }

    // get pharmacist details by user id
    public function getPharmacist($userId){
        $sql = "SELECT * FROM `tbl_pharmacists` WHERE `user_id` = :id";
        $this->prepare($sql);
        $params = [
            'id'=>$userId
        ];
        $patient = $this->result($params);

        if($this->rowCount()>0){
            return $patient;
        }
        else{
            return false;
        }
    }

    // get no of pharmacists registered in the system
    public function getCount(){
        $sql = "SELECT * FROM `tbl_pharmacists`";
        $this->queryAll($sql);
        return $this->rowCount();
    }
}