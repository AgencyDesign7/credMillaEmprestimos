<!DOCTYPE html>
<html lang="en">
<?php 
    if(!isset($_SESSION)){session_start();}
    if(!isset($_SESSION['login'])){
        header('location: ./login.php');
      }
    if($_SESSION['status'] === "false"){
        header('location: ./adminPage.php');
        $_SESSION['Error_Msg'] = "<div class='offlineError-msg'><p>Você está offline</p></div>";
    }else{
        $_SESSION['Error_Msg'] ="";
    }
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
    <div class="logout-btn">
        <a href="#"><p>Voltar</p></a>
    </div>
    <div class="title-chat">
        <p>Chat CredMilla emprestimos Support</p>
    </div>
    <div class='info-room'><p>Conectado com: </p></div>
    <div class="chat-container-form">
        <!-- <form action="" method="post" class="form1">
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
        </form> -->
        <div class="chat-message">

            <div class="messages-send">
                <div class="init-head-message">
                    <p></p>
                    <p></p>
                </div>
            </div>
            <form action="" method="post" class="form2 support-manager form-display-block">
                <textarea name="texttosend" id="" cols="30" rows="10"></textarea>
                <input class="sub-btn2" type="submit" value="Enviar">
            </form>
        </div>
        <div class="painel-view">
            <div class="queue-users">
                <p>Total de usuários na fila:<span></span></p>
                <div class="users-queue"></div>
            </div>
            <div class="btn-InitChat"><a href="#">Iniciar Atendimento</a></div>
            <div class="btn-FinishChat"><a href="#">Finalizar Chat</a></div>
        </div>
    </div>

    <script src="./scripts/script.chat.resouce.js"></script>
</body>

</html>