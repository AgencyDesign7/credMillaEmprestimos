!function navbarControls() {
    var navbarMenus = document.querySelector('.mobile-navbar');
    var btnMenu = document.querySelector('.menu-btn-mobile');
    var btnClose = document.querySelector('.close-btn');
    var buttonCadastro = document.querySelector('#cadastro-trabalho')
    var formCloseMsg = document.querySelector('.chat-frame-container span')
    var iframeForm = document.querySelector('.chat-frame-container')
    var iframe = document.querySelector('.chat-frame')
    var chatIcon = document.querySelector('.chat-link')

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

    if (formCloseMsg) {
        var form1 = document.querySelector(".form1")
        var form2 = document.querySelector(".form2")
        formCloseMsg.addEventListener('click', function (event) {
            event.preventDefault()
            let confirm = window.confirm("Se continuar o chat será desconectado, deseja continuar? ");
            if (confirm === true) {
                iframeForm.classList.remove('open-form');
                var hrx = new XMLHttpRequest();
                hrx.open('POST', '../src/classes/Chat.php', true);
                hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrx.onload = function () {
                    iframe.contentWindow.location.reload(true);
                }
                hrx.send('request=closeChat')
            }
        })
    }
    if (chatIcon) {
        chatIcon.addEventListener('click', function (event) {
            event.preventDefault()
            iframeForm.classList.add('open-form');
        })
    }
}()

!function iframeCheckOnlineSupport() {
    var ChatContainerIframe = document.querySelector('.chat-frame-container iframe');
    var btnMaximizeChat = document.querySelector('.frame-maximaze a')
    var hrx = new XMLHttpRequest();
    hrx.open('POST', '../src/classes/Chat.php', true);
    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrx.onload = function () {
        var result = JSON.parse(this.responseText);
        if (ChatContainerIframe) {

            if (result.length !== undefined) {
                var objSupport = this.responseText

                var arrayData = objSupport.split('*')

                var objVal = new Object();
                objVal.data = [];
                for (let i = 0; i < arrayData.length - 1; i++) {
                    objVal.data.push(JSON.parse(arrayData[i]))

                }
                objVal.data.forEach(function (d) {
                    if (d.status === 0) {
                        ChatContainerIframe.setAttribute('src', "./chatOffline.php")
                        btnMaximizeChat.setAttribute('href', "./chatOffline.php")
                    } else {
                        ChatContainerIframe.setAttribute('src', "./chat.php")
                        btnMaximizeChat.setAttribute('href', "./chat.php")
                    }
                })
            } else {
                var objSupport = JSON.parse(this.responseText)
                if (objSupport.status === 0) {
                    ChatContainerIframe.setAttribute('src', "./chatOffline.php")
                    btnMaximizeChat.setAttribute('href', "./chatOffline.php")
                } else {
                    ChatContainerIframe.setAttribute('src', "./chat.php")
                    btnMaximizeChat.setAttribute('href', "./chat.php")
                }

            }

        } else {
            ChatContainerIframe.setAttribute('src', "./chatOffline.php")
            btnMaximizeChat.setAttribute('href', "./chatOffline.php")
        }


    }
    hrx.send('request=ckeck-online');


}

!function HandleFormsRequestEmail(btn) {
    let buttonContato = document.querySelector('[data-Contato]');
    let buttonEmprestimo = document.querySelector('[data-emprestimo]');
    let buttonCadastro = document.querySelector('[data-cadastroBtn]');

    if (buttonCadastro) {
        buttonCadastro.addEventListener('click', event => {
            event.preventDefault()
            var name = document.querySelector('[name="i-name"]').value
            var cpf = document.querySelector('[name="i-cpf"]').value
            var msg = document.querySelector('[name="i-msg"]').value
            var certificacao = document.querySelectorAll('[name="i-certification"]')
            var experiencia = document.querySelectorAll('[name="i-experience"]')
            var curriculo = document.querySelector('[name="curriculo"]');


            var formDat = new FormData();
            formDat.append('curriculo', curriculo.innerHTML);

            var certificacaoFinal;
            var experienciaFinal;
            for (let i = 0; i < certificacao.length; i++) {
                if (certificacao[i].checked) {
                    certificacaoFinal = certificacao[i].value
                }
                if (experiencia[i].checked) {
                    experienciaFinal = experiencia[i].value
                }
            }
            if (name !== "" && cpf !== "" && msg !== "" && certificacaoFinal !== "" && experienciaFinal !== "" && curriculo !== "") {
                sendForm(`Nome=${name}&CPF=${cpf}&Menssagem=${msg}&Certificacao=${certificacaoFinal}&Experiencia=${experienciaFinal}&Curriculo=${formDat}&Request=Cadastro`)
            } else {
                alert('Favor preencher todos os campos')
            }



        })
    }
    if (buttonContato) {
        buttonContato.addEventListener('click', event => {
            event.preventDefault()
            var name = document.querySelector('[name="i-name"]').value
            var email = document.querySelector('[name="i-email"]').value
            var tel = document.querySelector('[name="i-tel"]').value
            var msg = document.querySelector('[name="i-msg"]').value
            if (name !== "" && email !== "" && tel !== "" && msg !== "") {
                sendForm(`Nome=${name}&Email=${email}&Telefone=${tel}&Menssagem=${msg}&Request='Contato'`)
            } else {
                alert('Favor preencher todos os campos')
            }


        })
    }
    if (buttonEmprestimo) {
        buttonEmprestimo.addEventListener('click', event => {
            event.preventDefault()
            var name = document.querySelector('[name="nome_completo"]').value
            var cpf = document.querySelector('[name="cpf"]').value
            var perfilInvestidor = document.querySelector('[name="perfil-inv"]').value
            var email = document.querySelector('[name="email"]').value
            var telefone = document.querySelector('[name="telefone"]').value
            var nascimento = document.querySelector('[name="nascimento"]').value

            if (name !== "" && cpf !== "" && perfilInvestidor !== "" && email !== "" && telefone !== "" && nascimento !== "") {
                sendForm(`Nome=${name}&CPF=${cpf}&Perfil_Investidor=${perfilInvestidor}&Email=${email}&Telefone=${telefone}&Data=${nascimento}&Request='Emprestimo'`)
            } else {
                alert('Favor preencher todos os campos')
            }
        })
    }

    var sendForm = function (inputs) {
        var responseData;
        var hrx = new XMLHttpRequest();
        hrx.open('POST', '../handleForms.php', true);
        hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        hrx.onload = async function () {
            responseData = await this.responseText;
            console.log(responseData)

        }
        hrx.send(inputs)
    }
}
