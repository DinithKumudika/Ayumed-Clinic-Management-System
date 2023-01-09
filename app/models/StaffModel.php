<?php

class StaffModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function add($staff_no, $user_id){
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

    public function getAll(){
        $sql = "SELECT 
            S.`staff_reg_no`,
            U.`user_id`,
            U.`first_name`, 
            U.`last_name`, 
            U.`email`, 
            U.`username`, 
            S.`status` 
            FROM `tbl_staff` AS S INNER JOIN `tbl_users` AS U ON S.`user_id` = U.`user_id`";

        $staffMembers = $this->queryAll($sql);

        if($this->rowCount()>0){
            return $staffMembers;
        }
        else{
            return false;
        }
    }

    // get no of clinic staff members registered in the system
    public function getCount(){
        $sql = "SELECT * FROM `tbl_staff`";
        $this->queryAll($sql);
        return $this->rowCount();
    }

    // get staff member id by user id
    public function getStaffMemberId($userId){
        $sql = "SELECT * FROM `tbl_staff` WHERE `user_id` = :id";
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

    // get staff member details by user id
    public function getStaffMember($userId){
        $sql = "SELECT * FROM `tbl_staff` WHERE `user_id` = :id";
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
}