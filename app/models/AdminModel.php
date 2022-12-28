<?php

class AdminModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // get no of patients registered in the system
    public function getAllPatients(){
        $sql = "SELECT * FROM `tbl_users` WHERE `role_id`= :role_id";
        $this->prepare($sql);

        $params = [
            'role_id' => 1
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }

    // get no of clinic staff members registered in the system
    public function getAllStaff(){
        $sql = "SELECT * FROM `tbl_users` WHERE `role_id`= :role_id";
        $this->prepare($sql);

        $params = [
            'role_id' => 3
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }

    // get no of pharmacists registered in the system
    public function getAllPharmacists(){
        $sql = "SELECT * FROM `tbl_users` WHERE `role_id`= :role_id";
        $this->prepare($sql);

        $params = [
            'role_id' => 4
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }

    // get all the users registered in the system
    public function getAllUsers(){
        $sql = "SELECT * FROM `tbl_users`";
        $this->queryAll($sql);

        return $this->rowCount();
    }

    // get all currently active patients
    public function getActivePatients(){
        $sql = "SELECT * FROM `tbl_logins` WHERE `role_id` = :role_id AND loggedout_at = :logout";
        $this->prepare($sql);

        $params = [
            'role_id' => 1,
            'logout' => NULL
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }
    // get all currently active staff members
    public function getActiveStaff(){
        $sql = "SELECT * FROM `tbl_logins` WHERE `role_id` = :role_id AND loggedout_at = :logout";
        $this->prepare($sql);

        $params = [
            'role_id' => 3,
            'logout' => NULL
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }

    // get all currently active pharmacists
    public function getActivePharmacists(){
        $sql = "SELECT * FROM `tbl_logins` WHERE `role_id` = :role_id AND loggedout_at = :logout";
        $this->prepare($sql);

        $params = [
            'role_id' => 4,
            'logout' => NULL
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }

    // get all the patients registered in a day
    public function getDailyPatients(){

    }

    // get all the appointments made in a day
    public function getDailyAppointments(){

    }

    // get all the prescriptions issued in a day
    public function getDailyPrescriptions(){

    }

    // get all the orders completed in a day
    public function getDailyOrders(){

    }
}