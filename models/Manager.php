<?php 

/**
 * This class is associed with all the managerClass
 */
Abstract class Manager {

    /**
     * Connection to the database
     * This variable is static cause we want to store the instance
     */
    private static $_db;

    /**
     * Set a connection to the database
     */
    private static function setDatabase() {

        $DB_HOST = 'localhost';
        $DB_NAME = 'mini_classroom';
        $DB_USERNAME = 'admin';
        $DB_PSWD = 'adminpass';

        self::$_db = new PDO("mysql:hots={$DB_HOST};dbname={$DB_NAME}",$DB_USERNAME, $DB_PSWD);

    }

    /**
     * Get a connection to the database
     */
    protected static function getDatabase() {
        if (self::$_db == null) {
            self::setDatabase();
        }

        return self::$_db;
    }

    /**
     * Most Common query in all models
     */
    public function getAll($table, $objectAssoccied) {

        $result = array();

        $sql = "SELECT * FROM ".$table." ;";

        $query = Manager::getDatabase()->prepare($sql);
        $query->execute();


        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new $objectAssoccied($data);
        }

        $query->closeCursor();

        return $result;
    }
}