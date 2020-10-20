<!DOCTYPE html>
<html lang="en">

<head>
    <!-- 
        Creator: Adenilton Batista Xavier
        Email: adeniltonxavier14@gmail.com
        Tel: (31)99473-7478
    -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src 'self';
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
            <form action="cadastro.php" method="GET">
                <p>CADASTRO</p>
                <p>Preencha todos os campos do formulário</p>
                <div class="cont-input">
                    <input type="text" name="i-name" id="" placeholder="Nome*" required>
                    <input type="number" name="i-cpf" id="" placeholder="CPF*" required>
                    <!-- <div type="tel" name="i-disable" id="" placeholder="--*" required> -->
                    <textarea type="text" name="i-msg" id="" placeholder="Por que eu quero trabalhar na CredMilla?*" required></textarea>
                    <div class="certificao-select">
                        <label for="certificacao">Certificação:</label>
                        <div class="inputs-radio">
                            <input type="radio" name="i-certification" value="FEBRABAN" required>
                            <label for="">FEBRABAN</label>
                        </div>
                        <div class="inputs-radio">
                            <input type="radio" name="i-certification" value="ANEPS" required>
                            <label for="">ANEPS</label>
                        </div>
                    </div>
                    <div class="certificao-select">
                        <label for="experiencia">Experiência com call center:</label>
                        <div class="inputs-radio">
                            <input type="radio" name="i-experience" value="SIM" required>
                            <label for="">SIM</label>
                        </div>
                        <div class="inputs-radio">
                            <input type="radio" name="i-experience" value="NÃO" required>
                            <label for="">NÃO</label>
                        </div>
                    </div>
                    <div class="curriculo-anexo">
                        <label for="curriculo">Anexe seu currículo:</label>
                        <input type="file" name="curriculo"  required>
                    </div>
                    <div class="btn-contato"><button onclick="HandleFormsRequestEmail(this)">Enviar</button></div>
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