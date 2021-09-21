<?php 
include_once('Model.php');

class Post extends Model {

    private $postID;
    private $title;
    private $publicationDateTime;
    private $category;
    private $deadline;
    private $legend;
    private $moduleID;
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