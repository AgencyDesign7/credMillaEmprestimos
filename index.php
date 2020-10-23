<!DOCTYPE html>
<html lang="en">
<?php 
include_once('./src/classes/Controller.php');
include_once('./src/classes/DataBase.php');
use chatC\Controller;
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }else{
        $ip = $_SERVER["REMOTE_ADDR"];
    }

    $cr = new Controller();
    $cr->GetIpAndress($ip);
?>
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
    <title>Home - CredMilla</title>
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
        <div class="welcome-container">
            <p>Bem-vindo(a) à<br> CredMilla Consignados</p>
        </div>
        <img src="./resource/img/Main-img.jpg" alt="">
        <div class="emp-text1">
            <p>EMPRÉSTIMOS E CARTÃO DE CRÉDITO CONSIGNADO SEM COMPLICAÇÕES</p>
        </div>
        <span></span>
    </div>
    <div class="main-contents">
        <div class="imgs-container">
            <div class="imgs-text">
                <img src="./resource/img/main-couple.jpg" alt="aposentados e pensionistas credMilla">
                <p>APOSENTADOS e PENSIONISTAS do INSS e outros órgãos.</p>
            </div>
            <div class="imgs-text">
                <img src="./resource/img/main-people.jpg" alt="servidores publicos credMilla">
                <p>SERVIDORES PÚBLICOS (MUNICIPAIS, ESTADUAIS, FEDERAIS)</p>
            </div>
        </div>
        <p id="text-description">Trabalhamos com diversos bancos, em concordância com a resolução nº 3954 de 24/02/2011
            do Banco Central
            do Brasil, além de estarmos devidamente certificados pela Federação Brasileira de Bancos (FEBRABAN).</p>
    </div>

    <!-- footer -->
    <div class="contents-footer">
        <?php require('./src/templates/template.footer.html') ?>
    </div>
    
    <script src="./scripts/script.app.main.js"></script>
</body>

</html>
