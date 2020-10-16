<?php
namespace chatC;

if(!isset($_SESSION)){ session_start();}

use \DateTimeZone;
use \DateTime;

class Controller
{
    private $db = null;
    private $queueChats = array();
    private $currentConnected;

    function __construct()
    {
        $this->db = new DataBase();
    }

    function __destruct()
    {
    }

    function ConnectChatQueue($Client)
    {
        $timeZone = new DateTimeZone('Brazil/East');
        $dateTime = new DateTime();
        $dateTime->setTimezone($timeZone);
        $this->db->insetData('INSERT INTO queue_users(name, session, date_time) VALUES (?,?,?)', [$Client->getName(), $Client->getidSession(), $dateTime->format('Y-m-d h:i:s')]);

    }

    function CountQueue()
    {
        return $this->db->FetchAllData('SELECT * FROM queue_users', []);
    }

    function FinishChat($idCurrent)
    {
        $this->queueChats = $this->queueChats . array_diff($this->queueChats, $idCurrent);
        $this->UpdateQueue();
    }

    function NextQueue()
    {
        $datasQueue = $this->db->FetchAllData('SELECT * FROM queue_users', []);
    }

    function UpdateQueue()
    {
    }
}
