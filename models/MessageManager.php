<?php 

class MessageManager extends Manager {

    public function getAllMessageByDiscussion($attachedDiscussion) {

        $sql = "SELECT * FROM `Messages` WHERE `attachedDiscussion`= :attachedDiscussion";
        $query = $this->getDatabase()->prepare($sql);

        $query->bindparam(":attachedDiscussion", $attachedDiscussion);
        $query->execute();

        $result = array();

        while ($messageData = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Message($messageData);
        }

        return $result;
    }

    public function addNewMessage($addData) {
        
        extract($addData);

        $sql = "INSERT INTO `Messages` (`messageID`, `sendDateTime`, `legend`, `attachedFile`, `sendByStudent`, `attachedDiscussion`) 
        VALUES (NULL, NULL, :legend , NULL, :sendByStudent, :attachedDiscussion)";

        $query = $this->getDatabase()->prepare($sql);
        $query->bindparam(":legend", $legend);
        $query->bindparam(":sendByStudent", $sendByStudent);
        $query->bindparam(":attachedDiscussion", $attachedDiscussion);

        $query->execute();

        return 0;
    }
}