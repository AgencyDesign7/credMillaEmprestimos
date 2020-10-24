<!DOCTYPE html>
<html lang="en">
<?php 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - CredMilla empréstimos</title>
    <link rel="stylesheet" href="./css/style.root.css">
    <link rel="stylesheet" href="./css/style.responsive.css">
</head>
<body>
    <!-- <div class="logo-main">
        <img src="./resource/img/logo-main.png" alt="">
    </div> -->
    <!-- <div class="title-chat">
        <p>Chat CredMilla emprestimos</p>
    </div> -->
    <div class="chat-container-form">
        <form action="./handleForms.php" method="POST" enctype="multipart/form-data" class="form1 offline-msg">
            
            <label for="offline">Infelizmente não há nenhum support online no momento, envie sua mensagem no campos abaixo e entraremos em contato com você!</label>
            <label for="nameClient">Digite seu nome: </label>
            <input type="hidden" name="Request" value="Chat: Mensagem chat offline" id="">
            <input name="Nome" type="text" placeholder="Digite seu nome aqui" required>
            <label for="nameClient">Digite seu email: </label>
            <input name="Email" type="email" placeholder="Digite seu email aqui" required>
            <label for="msgClient">Digite sua mensagem: </label>
            <textarea name="Mensagem" id="" cols="30" rows="10" required></textarea>
            <input class="sub-btn-offline" data-offlineSendBtn type="submit" value="Enviar">
        </form>
    </div>
    
    <script src="./scripts/script.chat.resouce.js"></script>
</body>
</html>