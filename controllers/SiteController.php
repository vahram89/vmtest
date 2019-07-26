<?php

use vendor\vmcore\Controller;
use models\Ticket;
use models\Group;
use models\User;
use models\Journal;

class SiteController extends Controller
{

    public function index() {

        $groupModel  = new Group();
        $sql = "SELECT * FROM ".$groupModel->table;

        $groups = $groupModel->dbConnect()->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $this->render('index', ['groups' => $groups]);

    }

    public function group($id) {

        $ticketModel = new Ticket();
        $tickets = $ticketModel->findByGroupId($id);

        $this->render('ticket', ['tickets' => $tickets, 'model' => $ticketModel]);
    }

    public function edit($id) {

        $ticketModel = new Ticket();
        $ticket = $ticketModel->findById($id);


        if($_POST) {
            $postData = $_POST;
            $ticketModel->update($postData, $id);
            $this->redirect('/site/group/'.$ticket['group_id']);
        }

        $journalTable = new Journal();
        $userJournals = [];
        if($ticket['user_id']) {
            $userJournals = $journalTable->getUserJournals($ticket['user_id']);
        }

        $this->render('edit', ['ticket' => $ticket, 'model' => $ticketModel, 'userJournals' => $userJournals]);
    }

    public function followers() {


        if(!empty($_POST['q'])) {
            $followerModel = new User();
            echo json_encode($followerModel->getFollowers($_POST['q']));
        }
        else {
            throw new \http\Exception\BadHeaderException();
        }

    }

    public function journals() {

        if(!empty($_POST['userId'])) {
            $journalModel = new Journal();
            echo json_encode($journalModel->getUserJournals($_POST['userId']));
        }
        else {
            throw new \http\Exception\BadHeaderException();
        }

    }

    public function analytic() {

        $searchData = [];
        $startDate = false;
        $endDate = false;
        if(!empty($this->getParams())) {

            $getData = $this->getParams();

            if(empty($getData['start_date'])) {
                echo 'Start date is required';die;
            }
            else {
                $startDate = $getData['start_date'];
            }

            if(empty($getData['end_date'])) {
                echo 'End date is required';die;
            }
            else {
                $endDate = $getData['end_date'];
            }

            $ticketModel = new Ticket();
            $searchData = $ticketModel->searchByDate($startDate, $endDate);
        }

        $this->render('analytic', ['searchData' => $searchData, 'startDate' => $startDate, 'endDate' => $endDate]);

    }

}