<?php 
include_once('Model.php');

class Discussion extends Model {

    private $discussionID;
    private $creationDateTime;
    private $name;
    private $accountID;

    
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