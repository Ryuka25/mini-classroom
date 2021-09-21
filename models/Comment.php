<?php 
include_once('Model.php');

class Comment extends Model {

    private $commentID;
    private $creationDateTime;
    private $legend;
    private $attachedFile;
    private $accountID;
    private $postID;

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