<?php
namespace models;

use vendor\vmcore\ActiveRecord;
use models\Follower;

class Journal extends ActiveRecord {

    public $table = 'journals';

    public function getUserJournals($userId) {

        $follower = new Follower();
        $journalTable = $this->table;
        $followerTable = $follower->table;

        $sql = "SELECT $journalTable.* FROM $journalTable LEFT JOIN $followerTable ON $followerTable.journal_id = $journalTable.id WHERE $followerTable.user_id =:userId";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}