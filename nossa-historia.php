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
            <p>Nossa história</p>
            <span></span>
        </div>
        <div class="div-historia">
            <img src="./resource/img/historia.jpg" alt="">
        </div>
        <div class="mob-h">
            <img src="./resource/img/logo-main.png" alt="">
            <img src="./resource/img/h-1.jpg" alt="">
            <img src="./resource/img/h-2.jpg" alt="">
            <img src="./resource/img/h-3.jpg" alt="">
            <p>
                Era uma vez...</p>
            <p>Uma moça que ficou desempregada num determinado momento de sua vida, o que lhe trouxe muitas
                experiências ruins por quase um ano.</p>
            <p>Mas este período também trouxe muito aprendizado, amadurecimento e mudanças!</p>
            <p>Começou a comercializar produtos como representante de algumas empresas para não enlouquecer e ter
                renda.</p>
            <p>Certo dia, enquanto estava divulgando seus produtos para os clientes, um amigo que há muito não via
                ofereceu uma oportunidade que ela há tempos sonhava!</p>
            <p>Feliz e animada, a nossa protagonista iniciou sua nova jornada, conhecendo enfim como contratada a
                empresa onde já havia trabalhado por duas vezes como terceirizada. Foi um belo aprendizado!</p>
            <p>Ela é muito grata a esta empresa, mas observou que a mesma deixa uma lacuna muito grande no mercado de
                trabalho, enxergando aí uma oportunidade! A chegada da pandemia trouxe outras dificuldades, tanto na
                vida pessoal, quanto na profissional.</p>
            <p>Nasce aqui a CredMilla Consignados, um Call Center em Home Office que oferta Empréstimos Pessoais e
                Consignados, além de Cartões de Crédito Consignados.</p>
            <p>>eu público alvo são aposentados, pensionistas, servidores públicos e pessoas que estão passando por
                algum aperto financeiro.</p>
            <p>Tendo como referência a Missão, a Visão e os Valores que visam à facilitação de cada pessoa em suas
                dificuldades financeiras e na capitalização dos seus sonhos, de forma a se tornar referência no mercado
                de consignados, a empresa traz uma equipe qualificada, comprometida, com credibilidade, foco em
                resultados, exclusividade, valorização do cliente e ética.</p>
            <p>Sejam todos muito bem vindos à CredMilla Consignados. Fiquem à vontade, capitalizaremos e
                transformaremos seus sonhos em realidade!</p>
            <p>Atenciosamente, A direção.

            </p>
        </div>

    </div>

     <!-- footer -->
     <div class="contents-footer">
        <?php require('./src/templates/template.footer.html') ?>
    </div>
    <script src="./scripts/script.app.main.js"></script>
</body>

</html>