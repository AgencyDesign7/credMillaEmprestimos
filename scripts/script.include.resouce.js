!function createHead() {
    var headerElement = document.createElement('link');
    headerElement.rel = "stylesheet";
    headerElement.type = "text/css";
    headerElement.href = './css/style.root.css';

    var headerElement2 = document.createElement('link');
    headerElement2.rel = "stylesheet";
    headerElement2.type = "text/css";
    headerElement2.href = './css/style.reponsive.css';

    document.getElementsByTagName('head')[0].appendChild(headerElement);
    document.getElementsByTagName('head')[0].appendChild(headerElement2);
}()


!function includeFooter() {
    var divFooter = document.querySelector('.contents-footer')


    var xhr = new XMLHttpRequest();
    xhr.open("GET", '../src/templates/template.footer.html', true)
    xhr.send();
    xhr.onload = function () {
        divFooter.innerHTML = this.responseText
    }
    includNavbar()



}()

function includNavbar() {
    var xhr = new XMLHttpRequest();
    var divNavbar = document.querySelector('.navbar-content')
    var mediaMatch = window.matchMedia("(max-width: 700px)")
    if (mediaMatch.matches) {
        xhr.open("GET", '../src/templates/template.mobileNavbar.html', true)
        xhr.send();
        xhr.onload = function () {
            divNavbar.innerHTML = this.responseText

            var navbarMenus = document.querySelector('.mobile-navbar');
            var btnMenu = document.querySelector('.menu-btn-mobile');
            var btnClose = document.querySelector('.close-btn');
            console.log(btnMenu)
            btnMenu.addEventListener('click', function () {
                navbarMenus.classList.add('mobile-active')
                btnMenu.classList.add('open-menu')
            })
            btnClose.addEventListener('click', function () {
                navbarMenus.classList.remove('mobile-active')
                btnMenu.classList.remove('open-menu')
            })
        }


    } else {
        xhr.open("GET", '../src/templates/template.desktopNavbar.html', true)
        xhr.send();
        xhr.onload = function () {
            divNavbar.innerHTML = this.responseText
        }
    }
}

window.addEventListener('resize', includNavbar)
