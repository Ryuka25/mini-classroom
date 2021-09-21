<?php

class Module {

    private $moduleID;
    private $name;
    private $description;
    private $picture;
    private $moduleCategoryCode;


    /***********/
    /* SETTERS */
    /***********/

    
    public function setModuleID($newModuleID) {
        $this->moduleID = $newModuleID;
    }

    public function setName($newName) {
        $this->name = $newName;
    }
    
    public function setDescription($newDescription) {
        $this->description = $newDescription;
    }

    public function setPicture($newPicture) {
        $this->picture = $newPicture;
    }

    public function setModuleCategoryCode($newModuleCategoryCode) {
        $this->moduleCategoryCode = $newModuleCategoryCode;
    }    


    /***********/
    /* GETTERS */
    /***********/

    public function getModuleID() {
        return $this->moduleID;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getModuleCategoryCode() {
        return $this->moduleCategoryCode;
    }

}