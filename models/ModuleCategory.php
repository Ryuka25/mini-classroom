<?php 
include_once('Model.php');

class ModuleCategory extends Model {
    
    private $moduleCategoryCode;
    private $name;
    private $picture;


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

    public function getModuleCategoryCode() {
        return $this->moduleCategoryCode;
    }

    public function getName() {
        return $this->name;
    }
}