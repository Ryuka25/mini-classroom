<?php 
include_once('Model.php');

class Shedule extends Model {

    private $sheduleID;
    private $sheduleDate;
    private $startTime;
    private $finishTime;
    private $schoolRoom;
    private $accountID;
    private $classLevel;
    private $moduleID;

    
    /**
    * SETTERS for all keys
    */
    public function set($key, $value) {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        }
    }


    /**
    * GETTERS for all keys
    */
    public function get($key) {
        return $this->$key;
    }
    
}