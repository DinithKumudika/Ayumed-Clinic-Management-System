<?php

class OrderModel extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    // get all the orders completed in a day
    public function getDailyCompletedCount(){

    }
}