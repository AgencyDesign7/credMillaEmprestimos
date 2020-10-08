<?php

//https://stackoverflow.com/questions/27814416/php-session-inaccessible-on-other-pages

if(!isset($_SESSION)){ session_start();}

include_once('./Classes.php');

use chatC\{Person, Client, Controller, DataBase, Support};



$db = new DataBase();
$posts = $db->FetchAllData('SELECT * FROM chat1');

foreach ($posts as $post) {
    $myobj = array('name' => $post->name, 'message' => $post->message, 'date_time' => $post->date_time);
    $objectJson = json_encode($myobj, JSON_FORCE_OBJECT);
    echo $objectJson;

    $timeZone = new DateTimeZone('Brazil/East');
    $dateTime = new DateTime();
    $dateTime->setTimezone($timeZone);
    //echo $dateTime->format('Y-m-d H:i:s');
}

$name = $_POST['clientName'];
//echo 'From php ' . $name . 'Session ' . session_id();

//$person = new Person(15, session_id(), $_POST["clientName"]);
//echo ((object)$person)->idSession;


$controller = new Controller();
$personData = $controller->ConnectChat(1, session_id(), $name);
//var_dump($personData);