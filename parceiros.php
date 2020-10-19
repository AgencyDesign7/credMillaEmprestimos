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
            <p>Melhores parceiros com as menores taxas do mercado</p>
            <span></span>
        </div>

        <div class="parceiros">
            <div class="imgs-container-parceiros">
                <img src="./resource/img/bank/bank-1.jpg" alt="">
                <img src="./resource/img/bank/bank-2.jpg" alt="">
                <img src="./resource/img/bank/bank-3.jpg" alt="">
                <img src="./resource/img/bank/bank-4.jpg" alt="">
                <img src="./resource/img/bank/bank-5.jpg" alt="">
                <img src="./resource/img/bank/bank-6.jpg" alt="">
                <img src="./resource/img/bank/bank-7.jpg" alt="">
                <img src="./resource/img/bank/bank-8.jpg" alt="">
                <img src="./resource/img/bank/bank-9.jpg" alt="">
                <img src="./resource/img/bank/bank-10.jpg" alt="">
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