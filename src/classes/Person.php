<?php

$name = $_POST['clientName'];
echo 'From php '.$name . 'Session '. $_SESSION[];


class Person{

    private $id;
    private $idSession;
    private $name;
    function __construct($id, $idSession, $name){
        $this->id = $id;
        $this->idSession = $idSession;
        $this->name = $name;
    }
    
    function __destruct(){

    }

    function SendMensage($name, $mensage){

    }

    function FinishChat(){

    }


}