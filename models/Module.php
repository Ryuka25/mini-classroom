<?php
include_once('Model.php');

class Module extends Model {

    private $moduleID;
    private $name;
    private $description;
    private $picture;
    private $moduleCategoryCode;


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