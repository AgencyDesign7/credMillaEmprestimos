<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 
        Creator: Adenilton Batista Xavier
        Email: adeniltonxavier14@gmail.com
        Tel: (31)99473-7478
    -->
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self'; img-src 'self';
          script-src 'self' https://code.jquery.com; style-src 'self' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; connect-src 'self';">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossos parceiros - CredMilla</title>
    <link rel="stylesheet" href="./css/style.root.css">
    <link rel="stylesheet" href="./css/style.responsive.css">
</head>

<body>
    <div class="logo-main">
        <img src="./resource/img/logo-main.png" alt="">
    </div>

   <!-- navbar -->
   <div class="navbar-desktop">
        <?php require('./src/templates/template.desktopNavbar.html') ?>
    </div>
    <div class="navbar-mobile">
        <?php require('./src/templates/template.mobileNavbar.html') ?>
    </div>

    <div class="hero">
        <div class="par-div-text">
            <p>Entre em contato</p>
            <span></span>
        </div>

        <div class="form-contato">
            <form action="">
                <p>Fale conosco</p>
                <p>Dúvida, sugestão ou crítica</p>
                <div class="cont-input">
                    <input type="text" name="i-name" id="" placeholder="Nome*" required>
                    <input type="email" name="i-email" id="" placeholder="Email*" required>
                    <input type="text" name="i-tel" id="" placeholder="Telefone*" required>
                    <textarea type="text" name="i-msg" id="" placeholder="Mensagem*" required></textarea>
                    <div class="btn-contato"><button data-Contato type="submit">Enviar</button></div>
                </div>
            </form>
        </div>
        <div class="contato-trb">
            <div class="container-box">
                <p>CONTATO</p>
                <span></span>
                <p>Telefone: (31) 98470 - 7717</p>
                <p>Email: contato@credmilla.com.br</p>
            </div>
            <div class="container-box">
                <p>TRABALHE CONOSCO</p>
                <span></span>
                <p>Faça parte de nossa equipe!</p>
                <p>Preencha o formulário para se cadastrar</p>
                <button id="cadastro-trabalho">Cadastre-se</button>
            </div>
        </div>
    </div>

     <!-- footer -->
     <div class="contents-footer">
        <?php require('./src/templates/template.footer.html') ?>
    </div>
    <script src="./scripts/script.app.main.js"></script>
</body>

</html>