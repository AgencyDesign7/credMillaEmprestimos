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

        <div class="form-contato cadastro-page">
            <form action="">
                <p>CADASTRO</p>
                <p>Preencha todos os campos do formulário</p>
                <div class="cont-input">
                    <input type="text" name="i-name" id="" placeholder="Nome*">
                    <input type="email" name="i-email" id="" placeholder="CPF*">
                    <input type="tel" name="i-disable" id="" placeholder="--*">
                    <textarea type="text" name="i-msg" id=""
                        placeholder="Por que eu quero trabalhar na CredMilla?*"></textarea>
                    <div class="certificao-select">
                        <label for="certificacao">Certificação:</label>
                        <div class="inputs-radio">
                            <input type="radio" name="cert" value="FEBRABAN">
                            <label for="">FEBRABAN</label>
                        </div>
                        <div class="inputs-radio">
                            <input type="radio" name="cert" value="ANEPS">
                            <label for="">ANEPS</label>
                        </div>
                    </div>
                    <div class="certificao-select">
                        <label for="experiencia">Experiência com call center::</label>
                        <div class="inputs-radio">
                            <input type="radio" name="cert" value="SIM">
                            <label for="">SIM</label>
                        </div>
                        <div class="inputs-radio">
                            <input type="radio" name="cert" value="NÃO">
                            <label for="">NÃO</label>
                        </div>
                    </div>
                    <div class="curriculo-anexo">
                        <label for="curriculo">Anexe seu currículo:</label>
                        <input type="file">
                    </div>
                    <div class="btn-contato"><button>Enviar</button></div>
                </div>
            </form>
        </div>
    </div>

     <!-- footer -->
     <div class="contents-footer">
        <?php require('./src/templates/template.footer.html') ?>
    </div>
    <script src="./scripts/script.app.main.js"></script>
</body>

</html>