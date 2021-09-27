<?php 
include_once('Model.php');

class Message extends Model {

    private $attachedDiscussion;
    private $attachedFile;
    private $legend;
    private $messageID;
    private $sendByStudent;
    private $sendDateTime;


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
    
    public function getSenders() {
        return $this->sendByStudent;
    }

    public function getMessage() {
        return $this->legend;
    }
}