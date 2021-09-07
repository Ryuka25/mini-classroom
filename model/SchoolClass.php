<?php

class SchoolClass {

    public $classLevel;


    /**
     * Read : get Schoolclass with the specified $classLevel
     */
    public function __construct($classLevel) {
        
        // TODO : Create a Select request to get data about $classLevel

        // TODO : Atribute all values from the database to $this->properties

    }

    /**
     * Create : create SchoolClass with specified $classLevel
     */
    public function create($classLevel) {

        // TODO : Verification of a valid classLevel function

        // TODO : Create a request to add new $classLevel

    }

    /**
     * Update : change schoolClassData with the specified $classLevel
     */
    public function update($classLevel) {

        $schoolClass = $this->get($classLevel);

        // TODO : Attribute to $schoolClass the new update

        // TODO : Sync $this->properties = $schoolClass->properties

    }

    /**
     * Delete : delete a specified $classLevel
     */
    public function delete($classLevel) {

        $schoolClass = $this->get($classLevel);

        // TODO : Query that delete the curent class
    }
}

?>