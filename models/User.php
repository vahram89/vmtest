<?php
namespace models;

use vendor\vmcore\ActiveRecord;

class User extends ActiveRecord {

    public $table = 'users';

    public function getFollowers($term) {

        $sql = "SELECT * FROM ".$this->table. " WHERE name LIKE ?";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->execute(["%$term%"]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}