<?php 

class SchoolClassManager extends Manager {

    /**
     * @return array : storing all SchoolClass information in object
     */
    public static function getAllSchoolClass() {

        return Manager::getAll("SchoolClass", 'SchoolClass');

    }

    /**
     * Add a new School Class with $data
     */
    public static function addSchoolClass($data) {

        extract($data);

        $sql = "INSERT INTO `SchoolClass` (`classLevel`) VALUES (:classLevel)";

        $query = Manager::getDatabase()->prepare($sql);
        $query->bindparam(':classLevel', $classLevel);
        $query->execute();

        return true;
    }

    /**
     * Remove a School Class with the specified $classLevel
     */
    public static function removeSchoolClass($classLevel) {

        $sql = "DELETE FROM `SchoolClass` WHERE `SchoolClass`.`classLevel` = :classLevel";

        $query = Manager::getDatabase()->prepare($sql);

        $query->bindparam(':classLevel', $classLevel);
        $query->execute();

        return true;
    }

    /**
     * Get a specific School Class with the specified $classLevel
     */
    public static function getSchoolClass($classLevel) {

        $allSchoolClass = SchoolClassManager::getAllSchoolClass();

        foreach($allSchoolClass as $key=>$schoolClass) {
            if ($schoolClass->getClassLevel() == $classLevel)
                return $schoolClass;
        }

        return 0;
    }


}