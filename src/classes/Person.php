<?php

namespace chatC;

class Person
{

    private $id;
    public $idSession;
    public $name;
    function __construct($id, $idSession, $name)
    {
        $this->id = $id;
        $this->idSession = $idSession;
        $this->name = $name;
    }

    function __destruct()
    {
        $this->FinishChat();
    }

    function SendMensage($name, $mensage)
    {
        $db = new DataBase();
        $db->Connect();
    }

    function FinishChat()
    {
    }
}
