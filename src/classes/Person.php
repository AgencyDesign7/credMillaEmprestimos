<?php

namespace chatC;
use \DateTime;
use \DateTimeZone;
class Person {

    private $id;
    public $idSession;
    public $name;
    
    function __construct($id, $idSession, $name){
        $this->id = $id;
        $this->idSession = $idSession;
        $this->name = $name;

        // $timeZone = new DateTimeZone('Brazil/East');
        // $dateTime = new DateTime();
        // $dateTime->setTimezone($timeZone);

        $db = new DataBase();
        $timeZone = new DateTimeZone('Brazil/East');
        $dateTime = new DateTime();
        $dateTime->setTimezone($timeZone);
        //$db->insetData("INSERT INTO  queue_users (name, session, date_time) VALUES (?,?,?)",[ $name, $idSession, $dateTime->format('Y-m-d H:i:s')]);
        $db->deleteDate('DELETE FROM queue_users WHERE name = ?', [$this->name]);
        // $db->prepare("INSERT INTO queue_users ('name', 'seesion', 'date_time') VALUES (:name, :session, :date_time)");
        // $db->bindParam(':name', $_SESSION['name']);
        // $db->bindParam(':session',session_id());
        // $db->bindParam(':date_time', $dateTime->format('Y-m-d H:i:s'));
    }

    function __destruct()
    {   
       
        //$db->deleteDate('DELETE FROM queue_users WHERE name = ?', [$this->name]);
        
    }

    function SendMessageChat(){

    }
}