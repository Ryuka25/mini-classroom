<?php 

class AccountMinManager extends Manager {

    public static function getAllAccountMin() {
        $result = Manager::getAll("AccountsMin", "AccountMin");

        return $result;
    }

    public static function getAccountMinByName($name) {

        $sql = "SELECT * FROM `AccountMin` WHERE `AccountMin`.`name` = :name";
        $query = Manager::getDatabase()->prepare($sql);
        $query->bindParam(':name', $name);
        $query->execute();

        while ($accountMinData = $query->fetch(PDO::FETCH_ASSOC)) {
            $schoolClass = new SchoolClass($accountMinData);
        };

        $query->closeCursor();
        return $schoolClass;
    }
}