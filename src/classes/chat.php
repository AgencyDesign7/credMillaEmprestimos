<?php

//https://stackoverflow.com/questions/27814416/php-session-inaccessible-on-other-pages

if (!isset($_SESSION)) {
    session_start();
}

// session_unset();
$Error = "Nada";
include_once('./Classes.php');
// session_unset();

use chatC\{Person, Client, Controller, DataBase, Support};

$db = new DataBase();
$Controller = new Controller();

if (isset($_POST['checkStart'])) {
    if ($_POST['checkStart'] === 'Auth') {
        if (isset($_SESSION['mode'])) {
            echo json_encode(array('auth' => true));
        } else {
            echo json_encode(array('auth' => false));
        }
    }
}
if (isset($_POST['request'])) {

    if($_POST['request'] === 'updateChat'){
        $datas = "";

        if($_SESSION['mode'] === 1){

            $datas = $db->FetchAllData('SELECT * FROM supportlogin WHERE login=?', [$_SESSION['login']]);
            $datas = $db->FetchAllData('SELECT * FROM '. $datas[0]->currentRoom, []);
        }else{
            
            $datas = array((object) array( "currentRoom" => $_SESSION['ChatRoom']));
            $datas = $db->FetchAllData('SELECT * FROM '. $datas[0]->currentRoom, []);
            
        }
        
        //$data = $db->FetchAllData('SELECT * FROM supportlogin WHERE login=?', [$_SESSION['login']]);
        //$data = $Controller->UpdateChat($data->currentRoom);
        //echo $data->currentRoom;

            //$db->updateData('UPDATE supportlogin SET currentRoom='.$Controller->NextQueue() .' WHERE login = ?', [$user]);

        foreach($datas as $data){
            //Working: send all data from db
            $array_teste = json_encode(array('id' => $data->id, 'name' => $data->name, 'message' => $data->message, 'dateTime' => $data->last_time, 'definedAuth' => $data->definedAuth), JSON_FORCE_OBJECT);
            echo  $array_teste ."*";
            
        }
        
    }

    if ($_POST['request'] === 'enterChatSupport') {
        if ($_POST['login'] && $_POST['password']) {
            $_SESSION['login'] = $_POST['login'];
            $password = $_POST['password'];
            $posts = $db->FetchAllData('SELECT * FROM `supportlogin` WHERE `login`= ?', [$_POST['login']]);
            if ($posts) {
                foreach ($posts as $post) {
                    $ResultLogin = strcmp($_SESSION['login'], $post->login);
                    $ResultPassword = password_verify($password, $post->password);
                    if ($ResultLogin === 0 && $ResultPassword === true) {
                        echo json_encode(array('auth' => true));
                        $_SESSION['mode'] = 1;
                        $_SESSION['name'] = $post->name;
                        $_SESSION['email'] = $post ->email;
                        
                        if($_POST['status'] === true){
                            $db->updateData('UPDATE supportlogin SET online=true WHERE login = ?', [$_SESSION['login']]);
                        }
                        

                    } else {
                        echo json_encode(array('auth' => false));
                    }
                }
            } else {
                echo json_encode(array('error' => "usuario ou senha incorreto"));
            }
        }
    }

    if($_POST['request'] === 'countdb'){
        //echo $Controller->CountQueue();
        
    }

    if ($_POST['request'] === 'enterChatClient') {
        $_SESSION['name'] = $_POST['clientName'];
        $_SESSION['email'] = $_POST['email'];
        $infosUser = array('name' =>  $_SESSION['name'], 'email' =>  $_SESSION['email'], 'mode' => $_SESSION['mode'] = 0);
        

        $Client = new Client($_SESSION['name'], session_id());
        $Controller->ConnectChatQueue($Client);

        echo json_encode($infosUser, JSON_FORCE_OBJECT);

        $_SESSION['ChatRoom'] = $Controller->NextQueue();
    }
    if ($_POST['request'] === 'sendMessageChat') {
        if($_SESSION['mode'] === 1){

            $data = $db->FetchAllData('SELECT * FROM supportlogin WHERE login=?', [$_SESSION['login']]);
        }else{
            
            $data = array((object) array( "currentRoom" => $_SESSION['ChatRoom']));
        }
        

        $timeZone = new DateTimeZone('Brazil/East');
        $dateTime = new DateTime();
        $dateTime->setTimezone($timeZone);
        $infosUser = array('name' => $_SESSION['name'], 'email' => $_SESSION['email'], 'message' => $_POST['Message'], 'dateTime' => $dateTime->format('H:i:s'), 'definedAuth' => $_SESSION['mode']);
        $db->insertData('INSERT INTO '.$data[0]->currentRoom. ' (name, email, message, last_time, definedAuth) VALUE (?,?,?,?,?)', [$_SESSION['name'], $_SESSION['email'], $_POST['Message'], $dateTime->format('H:i:s'), $_SESSION['mode']]);
        try {

            echo json_encode($infosUser, JSON_FORCE_OBJECT);
        } catch (\Exception $e) {
            echo json_encode(array("Error: " => $e));
        }
    }

    if($_POST['request'] === 'infoQueue'){
        if($_SESSION["mode"] === 1){
            $data = $db->FetchAllData('SELECT * FROM queue_users', []);
            foreach($data as $d){
                $result = json_encode(array('name' => $d->name), JSON_FORCE_OBJECT);
                echo $result . '*';
            }
        }else{
            $name = $_SESSION['name'];
            $sessionId = session_id();
            $data = $db->FetchAllData('SELECT * FROM queue_users', []);
            $result = array_search($sessionId, array_column($data, 'session'));
            if(gettype($result) === 'boolean'){
                echo "";
            }else{
                echo 'Aguarde, em breve você será atendido... você é  '.$result .'º da fila';
            }
            //echo array_search($sessionId, array_column($data, 'session'));
        }
        
    }

    if($_POST['request'] === 'ckeck-online'){
    
        $datas = $db->FetchAllData('SELECT * FROM supportlogin', []);
        foreach($datas as $data){
           
            
            if($data->online === 1){
                $resultJson = json_encode(array('id' => $data->id, 'name' => $data->name, 'status'=> $data->online), JSON_FORCE_OBJECT);
                if($data->online > 1){
                    echo $resultJson . "*";
                }else{
                    echo $resultJson;
                }
                
            }else{
                echo json_encode(array('status' => 0) ,JSON_FORCE_OBJECT);
                session_unset();
            }
        }
    }

    if($_POST['request'] === 'initChat'){
        $clientsQueue = $Controller->CountQueue();
        $message = "wrong answer";
        //get the first person in list queue
        //create room for chat
        if(count($clientsQueue) === 0){
            echo json_encode(array('clients'=> false));
            exit();
        }
        
        $res = $Controller->SelectRoom($Controller->Connect_client_with_support($clientsQueue[0]));
        $result = $db->insertData("UPDATE supportlogin SET currentRoom=? WHERE login=?", [$Controller->NextQueue(), $_SESSION['login']]);
        if($result === 1){ //sucess
            //delete user from queue
            $Client = $db->FetchAllData("SELECT * FROM queue_users WHERE session=?", [$clientsQueue[0]->session]);
            
            $queryResult = $db->insertData('INSERT INTO `roomsupport` (`name`, `session`, `date_time`) VALUES (?,?,?)', [$clientsQueue[0]->name, $clientsQueue[0]->session, $clientsQueue[0]->date_time]);
            echo $queryResult;
            if($queryResult === 1){//sucess
                $db->insertData("DELETE FROM queue_users WHERE session=?", [$clientsQueue[0]->session]); 
            }else{
                echo json_encode(array('error'=> "Error inserir usuario chatroom"));
            }
        }else{

        }
        //Check if room has been created
        
        //Connect client in the chat

    }

    if($_POST['request'] === 'finishChat'){
        $MessageFinishChat = "Chat finalizado...";
        $resultSupport = $db->FetchAllData("SELECT * FROM supportlogin WHERE login=?", [$_SESSION['login']]);
        if(count($resultSupport) === 1){
            if($resultSupport[0]->currentRoom === ""){
                echo json_encode(array('Error' => "NO DATA ROOM"), JSON_FORCE_OBJECT);
            }
            exit();
           $db->insertData("INSERT INTO ".$resultSupport[0]->currentRoom." (name, email, message, last_time, definedAuth) VALUES (?,?,?,?,?)", ["System", "suport@suport.com.br", $MessageFinishChat, $Controller->getDataTime('H:i:s'), 2]);
        }
        $result = $db->insertData("UPDATE supportlogin SET currentRoom=? WHERE login=?", ["", $_SESSION['login']]);
        echo json_encode(array('EndChat' => true), JSON_FORCE_OBJECT);
    }

    if($_POST['request'] === 'closeChat'){
        if(isset($_SESSION)){
            session_unset();
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