<?php
namespace chatC;

if(!isset($_SESSION)){ session_start();}

use \DateTimeZone;
use \DateTime;

class Controller
{
    private $db = null;
    private $db2 = null;
    private $queueChats = array();
    private $currentConnected;

    function __construct()
    {
        $this->db = new DataBase();
        $this->db2 = new DataBase2();
    }

    function __destruct()
    {
    }

    function ConnectChatQueue($Client)
    {
        $this->db->insertData('INSERT INTO queue_users(name, session, date_time) VALUES (?,?,?)', [$Client->getName(), $Client->getidSession(), $this->getDataTime('Y-m-d H:i:s')]);

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
        return ($this->getDataTime('Y').'_'.$datasQueue[0]->session);
    }

    function Connect_client_with_support($clientSession){
        $roomName = ($this->getDataTime('Y'). '_'.$clientSession);
        $this->db->insertData('CREATE TABLE ' . $roomName .' (id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name varchar(100) NOT NULL, email varchar(100) NOT NULL, message text NOT NULL, last_time TIME NOT NULL, definedAuth int(11) NOT NULL)', []);
        return $roomName;
    }

    function UpdateQueue()
    {
    }

    function SelectRoom($nameRoom){
        return  $this->db2->FetchAllData('SELECT * FROM ' .$nameRoom, []);
    }

    function UpdateChat($sessionClient){
        $roomName = ($this->$this->getDataTime('Y'). '_'.$sessionClient);
        return  $this->db->FetchAllData('SELECT * FROM ' .$roomName, []);
    }

    function getDataTime($format){
        $timeZone = new DateTimeZone('Brazil/East');
        $dateTime = new DateTime();
        $dateTime->setTimezone($timeZone);
        return $dateTime->format($format);
    }

    function GetIpAndress($ip){
        $this->db->insertData('INSERT INTO visitors(ip, date_time) VALUES (?,?)', [$ip, $this->getDataTime('Y-m-d H:i:s')]);
    }
}
