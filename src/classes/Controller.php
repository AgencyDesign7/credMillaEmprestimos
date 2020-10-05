<?php

session_start();

namespace chatC;

include 'Person.php';
include 'Client.php';
include 'Controller.php';
include 'DataBase.php';
include 'Support.php';

use chatC\Person;



$name = $_POST['clientName'];
//echo 'From php ' . $name . 'Session ' . session_id();

$person = new Person(15, session_id(), $_POST["clientName"]);


class Controller
{

    private $queueChats = array();
    private $currentConnected;

    function __construct()
    {
    }

    function __destruct()
    {
    }

    function ConnectChat()
    {
        $id = ($this->CountQueue() + 1);
        array_push($this->queueChats, new Person($id, session_id(), $_POST['name']));
    }

    function CountQueue()
    {
        return count($this->queueChats);
    }

    function FinishChat($idCurrent)
    {
        $this->queueChats = $this->queueChats . array_diff($this->queueChats, $idCurrent);
        $this->UpdateQueue();
    }

    function NextQueue()
    {
    }

    function UpdateQueue()
    {
    }
}
