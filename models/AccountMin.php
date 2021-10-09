<?php 

include('Model.php');

class AccountMin extends Model {

    private $id;
    private $password;
    private $name;

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
    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getPassword() {
        return $this->password;
    }

}