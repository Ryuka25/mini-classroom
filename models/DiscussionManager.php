<?php 

class DiscussionManager extends Manager {

    public function getAllDiscussion() {
        $result = $this->getAll("Discussions" , 'Discussion');

        return $result;
    }

    public function getDiscussionByID($discussionID) {
        $sql = "SELECT * FROM `Discussions` WHERE `DiscussionID`= :DiscussionID ";

        $query = $this->getDatabase()->prepare($sql);
        $query->bindparam(':DiscussionID', $discussionID);

        $query->execute();
        $dataDiscussion = $query->fetch(PDO::FETCH_ASSOC);

        $result = new Discussion($dataDiscussion);

        return $result;
    }
}