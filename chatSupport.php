<!DOCTYPE html>
<html lang="en">
<?php 
    if(!isset($_SESSION)){session_start();}

    /*
    // set some variables
    $host = "127.0.0.1";
    $port = 25003;
    // don't timeout!
    set_time_limit(0);
    $clients = array();
    // create socket
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
    // bind socket to port
    $result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");

    // start listening for connections
    $result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
    while(true){
        // accept incoming connections
        // spawn another socket to handle communication
        $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
        array_push($clients, $spawn);
        // read client input
        $input = socket_read($spawn, 1024) or die("Could not read input\n");
        // clean up input string
        $input = trim($input);
        echo "Client Message : ".$input . " - " . $spawn;
        socket_getsockname($spawn, $ip);
        // reverse client input and send back
        //$output = $clients[0] . " " . $clients[1] . "\n";
        $output = $ip . "\n";
        socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
        
    
    }
     // close sockets
    socket_close($spawn);
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
        <p>Chat CredMilla emprestimos Support</p>
    </div>
    <div class="chat-container-form">
        <form action="" method="post" class="form1">
            <img src="./resource/img/icons/chatpageIcon.png" alt="">
            <label for="supportNameLabel">usuário: </label>
            <input name="supportName" type="text" placeholder="Digite seu usuário" required>
            <label for="passwordLabel">Senha: </label>
            <input name="password" type="password" placeholder="Digite sua senha" required>
            <div class="online-status">
                <label for="status">Online?</label>
                <input type="checkbox">
            </div>
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