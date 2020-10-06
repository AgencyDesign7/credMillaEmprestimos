<?php
session_start();
include_once('./Classes.php');

use chatC\{Person, Client, Controller, DataBase, Support};


$name = $_POST['clientName'];
//echo 'From php ' . $name . 'Session ' . session_id();

//$person = new Person(15, session_id(), $_POST["clientName"]);
//echo ((object)$person)->idSession;


$controller = new Controller();
$personData = $controller->ConnectChat(1, session_id(), $name);
var_dump($personData);