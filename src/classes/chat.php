<?php

//https://stackoverflow.com/questions/27814416/php-session-inaccessible-on-other-pages

if(!isset($_SESSION)){ session_start();}

include_once('./Classes.php');

use chatC\{Person, Client, Controller, DataBase, Support};
$db = new DataBase();

if(isset($_POST['checkStart'])){
    if ($_POST['checkStart'] === 'Auth'){
        if(isset($_SESSION['mode']) ){
            echo json_encode(array('auth' => true));
        }else{
            echo json_encode(array('auth' => false));
        }

    }
}
if(isset($_POST['request'])){

if($_POST['request'] === 'enterChatSupport'){
    if($_POST['login'] && $_POST['password'])
    {
        $user = $_POST['login'];
        $password = $_POST['password'];
        $posts = $db->FetchAllData('SELECT * FROM `supportlogin` WHERE `login`="admin"');
        if($posts){
            foreach($posts as $post){
                $ResultLogin = strcmp($user, $post->login);
                $ResultPassword = password_verify($password ,$post->password);
                if($ResultLogin === 0 && $ResultPassword === true){
                    echo json_encode(array('auth' => true));
                    $_SESSION['mode'] = 1;
                }else{
                    echo json_encode(array('auth' => false));
                }
            }
            
        }else{
            echo json_encode(array('error' => "usuario ou senha incorreto"));
        }
    }

}



if($_POST['request'] === 'enterChatClient'){
    $_SESSION['clientName'] = $_POST['clientName'];
    $_SESSION['emailClient'] = $_POST['email'];
    $infosClient = array('name' => $_POST['clientName'], 'email' => $_POST['email'], 'mode' => $_SESSION['mode'] = 0);
    echo json_encode($infosClient, JSON_FORCE_OBJECT);
}
if($_POST['request'] === 'sendMessageChat'){
    $timeZone = new DateTimeZone('Brazil/East');
    $dateTime = new DateTime();
    $dateTime->setTimezone($timeZone);
    $infosClient = array('name' => $_SESSION['clientName'], 'email' => $_SESSION['emailClient'], 'message' => $_POST['Message'], 'dateTime' => $dateTime->format('H:i:s'), 'definedAuth' => $_SESSION['mode']);
    try{

        echo json_encode($infosClient, JSON_FORCE_OBJECT);
        
    }catch(\Exception $e){
        echo "Error: " + $e;
    }
}
}





// $db = new DataBase();
// $posts = $db->FetchAllData('SELECT * FROM chat1');

// foreach ($posts as $post) {
//     $myobj = array('name' => $post->name, 'message' => $post->message, 'date_time' => $post->date_time);
//     $objectJson = json_encode($myobj, JSON_FORCE_OBJECT);
//     echo $objectJson;

//     $timeZone = new DateTimeZone('Brazil/East');
//     $dateTime = new DateTime();
//     $dateTime->setTimezone($timeZone);
//     //echo $dateTime->format('Y-m-d H:i:s');
// }

//$name = $_POST['clientName'];
//echo 'From php ' . $name . 'Session ' . session_id();

//$person = new Person(15, session_id(), $_POST["clientName"]);
//echo ((object)$person)->idSession;


// $controller = new Controller();
// $personData = $controller->ConnectChat(1, session_id(), $name);
//var_dump($personData);