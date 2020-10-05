!function navbarControls() {
    var navbarMenus = document.querySelector('.mobile-navbar');
    var btnMenu = document.querySelector('.menu-btn-mobile');
    var btnClose = document.querySelector('.close-btn');
    var buttonCadastro = document.querySelector('#cadastro-trabalho')

    if (!navbarMenus || !btnClose || !btnMenu) {
        window.location.href = "navbarError"
    }

    btnMenu.addEventListener('click', function () {
        navbarMenus.classList.add('mobile-active')
        btnMenu.classList.add('open-menu')
    });
    btnClose.addEventListener('click', function () {
        navbarMenus.classList.remove('mobile-active')
        btnMenu.classList.remove('open-menu')
    });


    if (window.location.pathname === "/contato.php") {
        if (buttonCadastro !== null) {

            buttonCadastro.addEventListener('click', function () {
                window.location.href = "./cadastro.php"
            })
        } else {
            alert("Erro reference btnCadastro")
        }
    } else {

    }
}()
