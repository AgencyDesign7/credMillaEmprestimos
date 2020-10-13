<!DOCTYPE html>
<html lang="en">
<?php 
    if(!isset($_SESSION)){session_start();}
    include_once('./src/classes/Person.php');
    include_once('./src/classes/DataBase.php');
    

    use chatC\{Person, Client, Controller, DataBase, Support};

    $db = new DataBase();
    $person = new Person(1, session_id(), "marcos");
    
    /*
    $host    = "127.0.0.1";
    $port    = 25003;
    $message = "Hello Server";
    echo "Message To server :".$message;
    // create socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
    // connect to server
    $result = socket_connect($socket, $host, $port) or die("Could not connect to server\n");  
    // send string to server
    socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
    // get server response
    $result = socket_read ($socket, 1024) or die("Could not read server response\n");
    echo "Reply From Server  :".$result;
    // close socket
    socket_close($socket);
   */
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - CredMilla empréstimos</title>
    <link rel="stylesheet" href="./css/style.root.css">
    <link rel="stylesheet" href="./css/style.responsive.css">
</head>
<body>
    <div class="logo-main">
        <img src="./resource/img/logo-main.png" alt="">
    </div>
    <div class="title-chat">
        <p>Chat CredMilla emprestimos</p>
    </div>
    <div class="chat-container-form">
        <form action="" method="post" class="form1">
            <img src="./resource/img/icons/chatpageIcon.png" alt="">
            <label for="nameClient">Digite seu nome: </label>
            <input name="clientName" type="text" placeholder="Digite seu nome aqui">
            <label for="nameClient">Digite seu email: </label>
            <input name="clientName" type="email" placeholder="Digite seu email aqui" require="true">
            <input class="sub-btn1" type="submit" value="Entrar">
        </form>
        <div class="chat-message">
            
            <div class="messages-send">
                <div class="init-head-message">
                    <p>Bem vindo ao chat credMilla emprestimos</p>
                    <p>Suporte Pedro Henrrique está conectado...</p>
                </div>
                <!-- <div class="suport message-block">
                    <p>Pedro Henrrique:</p>
                    <p>Olá, como vai?</p>
                    <p>08:50:53</p>
                </div>
                <div class="client message-block">
                    <p><?php $_POST['clientName'] ?></p>
                    <p>Bem e vc? gostaria de saber a respeito dos emprestimos</p>
                    <p>08:55:40</p>
                </div> -->
                
            </div>
            <form action="" method="post" class="form2">
                <textarea name="texttosend" id="" cols="30" rows="10"></textarea>
                <input class="sub-btn2" type="submit" value="Enviar">
            </form>
        </div>

    </div>
    
    <script src="./scripts/script.chat.resouce.js"></script>
</body>
</html>