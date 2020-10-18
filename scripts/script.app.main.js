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

    if(formCloseMsg){
        var form1 = document.querySelector(".form1")
        var form2 = document.querySelector(".form2")
        //console.log(iframeForm)
        formCloseMsg.addEventListener('click', function(event){
            event.preventDefault()
            let confirm = window.confirm("Se continuar o chat será desconectado, deseja continuar? ");
            if(confirm === true){
                iframeForm.classList.remove('open-form');
                var hrx = new XMLHttpRequest();
                hrx.open('POST', '../src/classes/Chat.php', true);
                hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrx.onload = function (){
                    iframe.contentWindow.location.reload(true);
                }
                hrx.send('request=closeChat')
            }
        })
    }
    if(chatIcon){
        chatIcon.addEventListener('click', function(event){
            event.preventDefault()
            iframeForm.classList.add('open-form');
        }) 
    }
}()

!function iframeCheckOnlineSupport(){
    var ChatContainerIframe = document.querySelector('.chat-frame-container iframe');
    var btnMaximizeChat = document.querySelector('.frame-maximaze a')
    var hrx = new XMLHttpRequest();
    hrx.open('POST', '../src/classes/Chat.php', true);
    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrx.onload = function () {
        var result = JSON.parse(this.responseText);
        console.log(result)
        if(ChatContainerIframe){
            
            if(result.length !== undefined){
                var objSupport =this.responseText
                
                var arrayData = objSupport.split('*')
                
                var objVal = new Object();
                objVal.data = [];
                for(let i = 0; i < arrayData.length - 1; i++){
                    objVal.data.push(JSON.parse(arrayData[i]))
                    
                }
                objVal.data.forEach(function(d){
                    if(d.status === 0){
                        ChatContainerIframe.setAttribute('src', "./chatOffline.php")
                        btnMaximizeChat.setAttribute('href', "./chatOffline.php")
                    }else{
                        ChatContainerIframe.setAttribute('src', "./chat.php")
                        btnMaximizeChat.setAttribute('href', "./chat.php")
                    }
                })
            }else{
                var objSupport =JSON.parse(this.responseText)
                if(objSupport.status === 0){
                    ChatContainerIframe.setAttribute('src', "./chatOffline.php")
                    btnMaximizeChat.setAttribute('href', "./chatOffline.php")
                }else{
                    ChatContainerIframe.setAttribute('src', "./chat.php")
                    btnMaximizeChat.setAttribute('href', "./chat.php")
                }
                
            }
            
        }else{
            ChatContainerIframe.setAttribute('src', "./chatOffline.php")
            btnMaximizeChat.setAttribute('href', "./chatOffline.php")
        }
        

    }
    hrx.send('request=ckeck-online');

   
}()
