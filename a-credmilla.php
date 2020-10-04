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
            <p>A CREDMILLA</p>
            <span></span>
        </div>

        <div class="parceiros about-container">
            <div class="div-about">
                <img src="./resource/img/about1.jpg" alt="">
                <p>Auxiliar cada pessoa em suas dificuldades financeiras, na realização dos sonhos e na conquista de
                    novos
                    bens.</p>
            </div>
            <div class="div-about">
                <img src="./resource/img/about2.jpg" alt="">
                <p>Ser referência em empréstimos, visando à solução dos problemas apresentados com opções personalizadas
                    de
                    acordo com a demanda de cada pessoa.</p>
            </div>
            <div class="div-about">
                <img src="./resource/img/about3.jpg" alt="">
                <p>Valorização da pessoa e sua situação, com foco nos resultados, exclusividade, comprometimento e
                    ética.
                </p>
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