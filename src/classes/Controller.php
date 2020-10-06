<?php

namespace chatC;
session_start();
include_once('./Classes.php');



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

    function ConnectChat($id, $session_id, $name)
    {
        return new Person($id, $session_id, $name);
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
