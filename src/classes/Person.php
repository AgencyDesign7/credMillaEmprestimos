<?php

namespace chatC;

class Person
{

    private $id;
    private $idSession;
    private $name;
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
    }

    function FinishChat()
    {
    }
}
