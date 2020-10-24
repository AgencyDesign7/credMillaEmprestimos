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
        <div class="container-feedback">
            <div class="content-feedback">
                <img src="./resource/img/icons/sucess.png" alt="">
                <h3>Enviado com sucesso!</h3>
                <a href="./index.php"><button>Home</button></a>
            </div>
            
        </div>    
    </div>

    <!-- footer -->
    <div class="contents-footer">
    <div class="social whatsapp">
    <a href="https://api.whatsapp.com/send?phone=5531984707717"><img src="./resource/img/icons/watsapp-icon.png"
            alt=""></a>
</div>
<div class="social chat">
    <a class="chat-link" href="#" target=""><img src="./resource/img/icons/chat-icon.png" alt=""></a>

    <div class="chat-frame-container">
        <span><a href="#">X</a></span>
        <div class="frame-maximaze"><a target="_black"><img id="maximaze-img"
                    src="./resource/img/icons/maximize-size.png" alt=""></a></div>
        <iframe class="chat-frame" frameborder="0" scrolling="no"></iframe>
    </div>
</div>
<footer class="footer">
    <p>Copyright © 2020 CredMilla – todos os direitos reservados.</p>
</footer>
    </div>
    
    <script src="./scripts/script.app.main.js"></script>
</body>

</html>
