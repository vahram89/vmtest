<?php
namespace vendor\vmcore;


class ActiveRecord {

    private static $db = null;

    private $dbName;
    private $dbUser;
    private $dbPass;

    function __construct() {
        require (ROOT . 'common/dbConfig.php');
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
    }

    public function dbConnect() {
        if(is_null(self::$db)) {
            self::$db = new \PDO("mysql:host=localhost;dbname=".$this->dbName, $this->dbUser, $this->dbPass);
        }
        return self::$db;
    }

}