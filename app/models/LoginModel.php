<?php

class LoginModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // get no of all currently active patients
    public function getLoggedInPatientCount(){
        $sql = "SELECT * FROM `tbl_logins` WHERE `role_id` = :role_id AND loggedout_at = :logout";
        $this->prepare($sql);

        $params = [
            'role_id' => 1,
            'logout' => NULL
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }

    // get no of all currently active staff members
    public function getLoggedInStaffCount(){
        $sql = "SELECT * FROM `tbl_logins` WHERE `role_id` = :role_id AND loggedout_at = :logout";
        $this->prepare($sql);

        $params = [
            'role_id' => 3,
            'logout' => NULL
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }

    // get no of all currently active pharmacists
    public function getLoggedInPharmacistCount(){
        $sql = "SELECT * FROM `tbl_logins` WHERE `role_id` = :role_id AND loggedout_at = :logout";
        $this->prepare($sql);

        $params = [
            'role_id' => 4,
            'logout' => NULL
        ];

        $this->resultSet($params);

        return $this->rowCount();
    }
}