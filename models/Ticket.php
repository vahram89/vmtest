<?php
namespace models;

use vendor\vmcore\ActiveRecord;

class Ticket extends ActiveRecord {

    public $table = 'tickets';

    const STATUS_NEW = 1;
    const STATUS_PROCESSED = 2;
    const STATUS_ERROR = 3;

    public $statusData = [
        self::STATUS_NEW => 'Новый',
        self::STATUS_PROCESSED => 'Обработанный',
        self::STATUS_ERROR => 'Ошибочный',
    ];

    public $fields = ['number', 'tracking_number', 'status', 'sent_date', 'user_id', 'journal_id', 'enter_date'];

    public function findById($id) {

        $ticketTable = $this->table;

        $sql = "SELECT $ticketTable.*, users.name as user_name FROM $ticketTable LEFT JOIN users ON users.id = $ticketTable.user_id  WHERE $ticketTable.id=:id";
        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }

    public function findByGroupId($id) {

        $ticketTable = $this->table;
        $sql = "SELECT $ticketTable.*, users.name as user_name, journals.title as journal_title FROM $ticketTable LEFT JOIN users ON users.id = $ticketTable.user_id LEFT JOIN journals ON journals.id = $ticketTable.journal_id  WHERE $ticketTable.group_id=:group_id";

        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->execute(['group_id' => $id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function update($postData, $id) {


        $sql = "UPDATE ".$this->table." SET ";
        $updateArray = [];

        $i = 0;
        foreach ($postData as $key =>  $data) {
            if(in_array($key, $this->fields)) {
                if($i != 0) {
                    $sql .= ", ";
                }
                $sql .= "$key=:$key";
                $updateArray[$key] = $data;
                $i++;
            }

        }

        $sql .= " WHERE id=:id";
        $updateArray['id'] = $id;
        $stmt = $this->dbConnect()->prepare($sql);

        return $stmt->execute($updateArray);

    }

    public function searchByDate($startDate, $endDate) {

        $sql = "SELECT enter_date AS ticket_date, COUNT(id) AS enter_count,
              (SELECT COUNT(id) FROM tickets AS cTicket WHERE cTicket.status = 2 AND cTicket.enter_date = dTicket.enter_date) AS proced_tickets,
              (SELECT COUNT(id) FROM tickets AS cTicket WHERE cTicket.status != 2 AND cTicket.enter_date = dTicket.enter_date) AS not_proced_tickets,
              (SELECT COUNT(id) FROM tickets AS cTicket WHERE cTicket.status = 2 AND cTicket.enter_date < dTicket.enter_date) AS procit_ticket_till
            FROM tickets AS dTicket 
            WHERE enter_date BETWEEN :start_date AND :end_date 
            GROUP BY enter_date";

        $stmt = $this->dbConnect()->prepare($sql);
        $stmt->execute(['start_date' => $startDate, 'end_date' => $endDate]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}