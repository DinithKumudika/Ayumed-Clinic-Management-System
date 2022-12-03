<?php
namespace libs;
use utils\Generate;
class Appointment
{
    private $date;
    private $time;
    private $reason;
    private $refNo;

    public function __construct($date, $time, $reason){
        $this->date = $date;
        $this->time = $time;
        $this->reason = $reason;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTime(){
        return $this->time;
    }

    public function getReason(){
        return $this->reason;
    }

    public function  getRefNo(){
        return $this->refNo;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function setTime($time){
        $this->time = $time;
    }

    public function setReason($reason){
        $this->reason = $reason;
    }
}