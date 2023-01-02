<?php

class PatientModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function add($data, $age, $regNo, $code, $user_id){
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

    public function getPatientId($userId){
        $sql = "SELECT * FROM `tbl_patients` WHERE `user_id` = :id";
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

    public function getPatient($userId){
        $sql = "SELECT * FROM `tbl_patients` WHERE `user_id` = :id";
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

    // get no of patients registered in the system
    public function getCount(){
        $sql = "SELECT * FROM `tbl_patients`";
        $this->queryAll($sql);
        return $this->rowCount();
    }

    // get all the patients registered in a day
    public function getDailyCount(){

    }
}