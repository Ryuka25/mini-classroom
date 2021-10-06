<?php 
include_once('Model.php');

class Account extends Model {

    private $accountID;
    private $address;
    private $adminAccess;
    private $associedSchoolClass;
    private $firstName;
    private $lastName;
    private $password;
    private $phoneNumber;
    private $picture;
    private $type;

    
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