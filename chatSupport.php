<!DOCTYPE html>
<html lang="en">
<?php 
    if(!isset($_SESSION)){session_start();}
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