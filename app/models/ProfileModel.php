<?php

class ProfileModel extends Database
{
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function add($data){

    }
}