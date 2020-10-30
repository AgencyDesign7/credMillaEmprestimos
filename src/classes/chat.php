<?php
if (!isset($_SESSION)) {
    session_start();
}


include_once('./Classes.php');

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
            $datas = $db->FetchAllData('SELECT * FROM credmilla_chat_db.'. $datas[0]->currentRoom, []);
        }else{
            
            $datas = array((object) array( "currentRoom" => $_SESSION['ChatRoom']));
            $datas = $db->FetchAllData('SELECT * FROM credmilla_chat_db.'. $datas[0]->currentRoom, []);
            
        }
        
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
            $status = $_POST['status'];
            $_SESSION['status'] = $_POST['status'];
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
                        $_SESSION['permissionsVisitors'] = $post->permissionsVisitors;
                        $_SESSION['permissionsUsers'] = $post->permissionsUsers;
                        $_SESSION['permissionsChat'] = $post->permissionsChat;
                        
                        //reset currentRoom on login
                        $db->insertData("UPDATE supportlogin SET currentRoom=? WHERE login=?", ["", $_SESSION['login']]);
                        if($status === "true"){
                            //change status
                            $db->updateData('UPDATE supportlogin SET online=true WHERE login = ?', [$_SESSION['login']]);
                            $_SESSION['Error_Msg'] = "";
                            $_SESSION['status'] = "true";
                        }
                        

                    } else {
                        echo json_encode(array('auth' => false, 'status' => $status));
                    }
                }
            } else {
                echo json_encode(array('auth' => false, 'error' => "usuario ou senha incorreto"));
            }
        }
    }

    if ($_POST['request'] === 'changeStatus') {
        $statusDb = $db->FetchAllData('SELECT online FROM `supportlogin` WHERE `login`= ?', [$_SESSION['login']]);
        if($statusDb[0]->online === 0){
            $db->updateData('UPDATE supportlogin SET online=true WHERE login = ?', [$_SESSION['login']]);
            $_SESSION['status'] = "true";
            echo json_encode(array('online' => true), JSON_FORCE_OBJECT);
        }else{
            $db->updateData('UPDATE supportlogin SET online=false WHERE login = ?', [$_SESSION['login']]);
            $_SESSION['status'] = "false";
            echo json_encode(array('online' => false), JSON_FORCE_OBJECT);
        }
    }

    if ($_POST['request'] === 'enterChatClient') {
        $_SESSION['name'] = $_POST['clientName'];
        $_SESSION['email'] = $_POST['email'];
        $infosUser = array('name' =>  $_SESSION['name'], 'email' =>  $_SESSION['email'], 'mode' => $_SESSION['mode'] = 0);
        
        $onlineSupport = $db->FetchAllData('SELECT * FROM supportlogin WHERE online=1', []);
        if(!empty($onlineSupport)){
            $Client = new Client($_SESSION['name'], session_id());
            $Controller->ConnectChatQueue($Client);
            //create room client
            $res = $Controller->SelectRoom($Controller->Connect_client_with_support($Client->getidSession()));

            echo json_encode(array('supportOnline' => true), JSON_FORCE_OBJECT);

            $_SESSION['ChatRoom'] = $Controller->NextQueue();
        }else{
            echo json_encode(array('supportOnline' => false), JSON_FORCE_OBJECT);
        }

        
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
        $db->insertData('INSERT INTO credmilla_chat_db.'.$data[0]->currentRoom. ' (name, email, message, last_time, definedAuth) VALUE (?,?,?,?,?)', [$_SESSION['name'], $_SESSION['email'], $_POST['Message'], $dateTime->format('H:i:s'), $_SESSION['mode']]);
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
                if($result === 0){
                    echo '<p>Aguarde, em breve você será atendido... você é o próximo a ser atendido.</p><p>Caso queira, deixe sua pergunta enquanto aguarda pelo atendimento</p>';
                }else{
                    echo '<p>Aguarde, em breve você será atendido... você é  '. ($result + 1) .'º da fila.</p><p>Caso queira, deixe sua pergunta enquanto aguarda pelo atendimento</p>';
                }
            }
        }
        
    }

    if($_POST['request'] === 'infoConnect'){
        if($_SESSION['mode'] === 1){
            $roomConnected = $db->FetchAllData('SELECT nameCurrentClient FROM supportlogin WHERE login=?', [$_SESSION['login']]);
            foreach($roomConnected as $ro){
                echo $ro->nameCurrentClient;
            }
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
        //Check if already connected
        $CheckResult = $db->FetchAllData("SELECT * FROM supportlogin WHERE login=?", [$_SESSION['login']]);
        foreach($CheckResult as $su){
            if(!empty($su->currentRoom)){
                echo json_encode(array('InitError' => "Você já está conectado a um chat"));
                exit();
            }
        }

        //verify if queue has someone
        $clientsQueue = $Controller->CountQueue();
        if((count($clientsQueue)) === 0){
            echo json_encode(array('InitError'=> "Não existe clientes na fila"), JSON_FORCE_OBJECT);
            exit();
        }
       
        
        //inset name of the room in support currentRoom
        $result = $db->insertData("UPDATE supportlogin SET currentRoom=? WHERE login=?", [$Controller->NextQueue(), $_SESSION['login']]);
        if($result === 1){ //sucess
            
            //delete user from queue
            $Client = $db->FetchAllData("SELECT * FROM queue_users WHERE session=?", [$clientsQueue[0]->session]);
            
            $queryResult = $db->insertData('UPDATE `supportlogin` SET `nameCurrentClient`=? WHERE login=?', [$clientsQueue[0]->name, $_SESSION['login']]);
            
            if($queryResult === 1){//sucess
                
                //Message warning after support has been connected
                $resultConectSupportMsg = $db->insertData('INSERT INTO credmilla_chat_db.' . $Controller->getDataTime('Y'). '_'.$clientsQueue[0]->session.' (`name`, `email`, `message`, `last_time`, `definedAuth`) VALUES (?,?,?,?,?)', ['System', 'suporte@suport', 'Atendente '. $_SESSION['name']  . ' conectado...', $Controller->getDataTime('H:i:s'), 2]);
                
                $db->deleteData("DELETE FROM queue_users WHERE session=?", [$clientsQueue[0]->session]); 
            }else{
                echo json_encode(array('InitError'=> "Erro ao conectar-se ao chat"));
            }
        }else{

        }

    }

    if($_POST['request'] === 'finishChat'){
        $MessageFinishChat = "Chat finalizado...";
        $resultSupport = $db->FetchAllData("SELECT * FROM supportlogin WHERE login=?", [$_SESSION['login']]);
        if((count($resultSupport)) === 1){
            if($resultSupport[0]->currentRoom === ""){
                echo json_encode(array('EndChat' => "Você não está conectado a nenhum chat"), JSON_FORCE_OBJECT);
                exit();
            }
           $db->insertData("INSERT INTO credmilla_chat_db.".$resultSupport[0]->currentRoom." (name, email, message, last_time, definedAuth) VALUES (?,?,?,?,?)", ["System", "suport@suport.com.br", $MessageFinishChat, $Controller->getDataTime('H:i:s'), 2]);
        }
        
        $db->insertData("UPDATE supportlogin SET currentRoom=? WHERE login=?", ["", $_SESSION['login']]);
        
        $db->insertData("UPDATE supportlogin SET nameCurrentClient=? WHERE login=?", ["", $_SESSION['login']]);

        echo json_encode(array('EndChat' => "Chat finalizado com sucesso"), JSON_FORCE_OBJECT);
    }

    if($_POST['request'] === 'closeChat'){
        if(isset($_SESSION)){
            session_unset();
        }
    }
    if($_POST['request'] === 'logout'){
        if(isset($_SESSION)){
            $db->updateData('UPDATE supportlogin SET online=false WHERE login = ?', [$_SESSION['login']]);
            echo json_encode(array('logout' => true), JSON_FORCE_OBJECT);
            session_unset();
        }
    }

    if($_POST["request"] === "visitors"){
        $resultAllVisitors = $db->FetchAllData("SELECT COUNT( * ) FROM visitors", []);
        $resultUniqueVisitors = $db->FetchAllData("SELECT COUNT( DISTINCT `ip` ) FROM visitors", []);
        $finalResult = array();
        $arrayVisitors = array();
        if(!empty($resultAllVisitors)){
            foreach($resultAllVisitors as $key => $value){
                foreach($value as $key => $value){
                    $arrayVisitors["AllVisitors"] = $value;
                }
                         
            }
        }
        if(!empty($resultUniqueVisitors)){
            foreach($resultUniqueVisitors as $key => $value){
                foreach($value as $key => $value){
                    $arrayVisitors["UniqueVisitors"] = $value;
                }
                         
            }
        }

        echo json_encode($arrayVisitors, JSON_FORCE_OBJECT);
    }

}
