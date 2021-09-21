<?php 

class Post extends Model {

    private $postID;
    private $title;
    private $publicationDateTime;
    private $category;
    private $deadline;
    private $legend;
    private $moduleID;
    private $accountID;


    /***********/
    /* SETTERS */
    /***********/


    public function setPostID($newPostID) {
        $this->postID = $newPostID;
    }

    public function setTitle($newTitle) {
        $this->title = $newTitle;
    }

    public function setPublicationDateTime($newPublicationDateTime) {
        $this->publicationDateTime = $newPublicationDateTime;
    }

    public function setCategory($newCategory) {
        $this->category = $newCategory;
    }

    public function setDeadline($newDeadline) {
        $this->deadline = $newDeadline;
    }

    public function setLegend($newLegend) {
        $this->legend = $newLegend;
    }

    public function setModuleID($newModuleID) {
        $this->moduleID = $newModuleID;
    }

    public function setAccountID($newAccountID) {
        $this->accountID = $newAccountID;
    }


    /***********/
    /* GETTERS */
    /***********/


    public function getPostID() {
        return $this->postID;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPublicationDateTime() {
        return $this->publicationDateTime;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    public function getLegend() {
        return $this->legend;
    }

    public function getModuleID() {
        return $this->moduleID;
    }

    public function getAccountID() {
        return $this->accountID;
    }

}