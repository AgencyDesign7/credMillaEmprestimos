!function checkSession() {
    var hrx = new XMLHttpRequest();
    hrx.open('POST', '../src/classes/Chat.php', true);
    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrx.onload = function () {
        try {

            var info_Connect = JSON.parse(this.responseText)
        } catch (e) {
            console.error("Auth: ", e.message);
        }
        if (info_Connect !== undefined && info_Connect.auth !== undefined) {
            if (info_Connect.auth === true) {
                if (form1 !== null && form2 !== null) {

                    form1.classList.add('form-display-none');
                    form2.classList.add('form-display-block');
                }
            }
        } else {
            alert('Error chave autorização: Entre em conato com o administrador')
        }
    }
    hrx.send('checkStart=Auth');
}()

var submit = document.querySelector(".sub-btn1")
var sendMessage = document.querySelector(".sub-btn2")
var messageText = document.querySelector(".form2 textarea")
var form1 = document.querySelector(".form1")
var form2 = document.querySelector(".form2")
var textChatName = document.querySelector(".form1 input[type='text']");
var textChatEmail = document.querySelector(".form1 input[type='email']");
var containerMsg = document.querySelector(".messages-send");
var chatMsgHead = document.querySelector(".init-support-msg");
var SuportInitChat = document.querySelector(".btn-InitChat");
var SupportFinishChat = document.querySelector(".btn-FinishChat");

if (document.location.pathname === "/chat.php") {
    UpdateChat(true)
}

function UpdateChat(booleanUpdate) {
    if (booleanUpdate) {
        var updateMessage = setInterval(function () {
        
            var auxRequest = false;
            var messagesBlock = document.querySelectorAll('.message-block > span');;
            var messagesSend = document.querySelectorAll('.message-block > :nth-child(2)');
            var hrxUp = new XMLHttpRequest();
            hrxUp.open('POST', '../src/classes/Chat.php', true);
            hrxUp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            hrxUp.responseType = 'text';
            hrxUp.onload = function () {
                var info_Client_Connect = this.responseText
                if (info_Client_Connect !== "") {
                    var arrayData = info_Client_Connect.split('*')

                    var objVal = new Object();
                    objVal.data = [];
                    for (let i = 0; i < arrayData.length - 1; i++) {
                        try {

                            objVal.data.push(JSON.parse(arrayData[i]))
                        } catch (e) {
                            console.error("Update Chat: ", e.message)
                        }

                    }
                    var containerMessages = document.querySelector('.messages-send');

                    if (objVal.data.length > 0) {
                        if (form2 !== null) {
                            SendMessageChat(objVal)
                        }
                    }
                } 
                // else {
                //     alert("Erro banco de dados: Contate o administrador")
                // }
                UpdateMsgQueueInformationClient();
                UpdateVisitors();
                SupportConnectedWith()
            }

            if (messagesSend.length > 0) {
                var arrElements = []
                messagesSend.forEach(d => {
                    arrElements.push(d.innerHTML)
                })
            }
            hrxUp.send('request=updateChat');
        }, 2000)
    } else {
        clearInterval(updateMessage);
    }
}
function SupportConnectedWith() {
    let chatInfo = document.querySelector('.info-room p')
    var hrxUp = new XMLHttpRequest();
    hrxUp.open('POST', '../src/classes/Chat.php', true);
    hrxUp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrxUp.responseType = 'text';
    hrxUp.onload = function () {
        if (chatInfo !== null) {

            chatInfo.innerHTML = 'Conectado com: ' + this.responseText;
        }
    }
    hrxUp.send('request=infoConnect');
}

function UpdateMsgQueueInformationClient() {

    var listUsers = document.querySelector('.users-queue');
    var counterUsers = document.querySelector('.queue-users p > span');
    var hrxUp = new XMLHttpRequest();
    hrxUp.open('POST', '../src/classes/Chat.php', true);
    hrxUp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrxUp.responseType = 'text';
    hrxUp.onload = function () {
        if (document.location.pathname === "/chatSupport.php" || document.location.pathname === "/adminPage.php" || document.location.pathname === "/visitorsTable.php") {
            var obj = new Object();
            obj.data = [];

            var result = this.responseText.split('*');
            if (result !== "" && result.length !== undefined) {
                for (let i = 0; i < result.length - 1; i++) {
                    try {

                        obj.data.push(JSON.parse(result[i]));
                    } catch (e) {
                        console.error("Update queue: ", e.message)
                    }
                }
                if (obj.data !== "") {
                    if (listUsers !== null) {
                        var list = ""
                        obj.data.forEach(function (ob) {
                            list += '<li><p>' + ob.name + '</p></li>';
                        })
                        listUsers.innerHTML = `<ul>${list}</ul>`
                    }
                    if (counterUsers !== null) {
                        counterUsers.innerHTML = obj.data.length
                    }
                    var chatAlert = document.querySelector('.chat-queue');
                    if (chatAlert !== null && obj.data.length > 0) {

                        chatAlert.innerHTML = `
                        <i class="fa fa-comments"></i> <span>Chat</span>
                        <small class="label pull-right bg-green queue-users-chat">${obj.data.length}</small>`
                    }
                }
            } else {
                alert("Error data: Contate o administrador")
            }


        } else {
            chatMsgHead.innerHTML = this.responseText;
            if (form2.classList.contains('form-display-block')) {
                setTimeout(function () {
                    document.querySelector('.load-container').style = "display: none;"
                }, 2000)
            }

        }

    }

    hrxUp.send('request=infoQueue');
}
function UpdateVisitors() {
    var visitorTotal = document.querySelector('.bg-yellow .inner h3');
    var uniqueVisitor = document.querySelector('.bg-red .inner h3');

    var hrxUp = new XMLHttpRequest();
    hrxUp.open('POST', '../src/classes/Chat.php', true);
    hrxUp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrxUp.responseType = 'text';
    hrxUp.onload = function () {
        if (document.location.pathname === "/chatSupport.php" || document.location.pathname === "/adminPage.php" || document.location.pathname === "/visitorsTable.php") {

            let result = JSON.parse(this.responseText);
            if (result) {
                if (visitorTotal !== null && uniqueVisitor !== null) {
                    visitorTotal.innerHTML = result.AllVisitors;
                    uniqueVisitor.innerHTML = result.UniqueVisitors;
                }
            }


        }

    }
    hrxUp.send('request=visitors');
}

if (sendMessage) {
    sendMessage.addEventListener('click', function (e) {
        e.preventDefault();
        if (messageText.value) {
            var hrx = new XMLHttpRequest();
            hrx.open('POST', '../src/classes/Chat.php', true);
            hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            hrx.onload = function () {

                try {

                    var info_Client_Connect = JSON.parse(this.responseText)
                } catch (e) {
                    console.error("Send Message: ", e.message)
                }
                messageText.value = '';
            }
            hrx.send('request=sendMessageChat&Message=' + messageText.value);


        } else {
            alert('Campo de Mensagem vazio')
        }

    })
}

if (submit) {

    submit.addEventListener('click', function (event) {

        event.preventDefault();
        if (document.location.pathname === '/chat.php') {


            if (textChatName.value && textChatEmail.value) {
                var hrx = new XMLHttpRequest();
                console.log(this.responseText)
                hrx.open('POST', '../src/classes/Chat.php', true);
                hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrx.onload = function () {
                 
                    try {
                        var verifySupportOnline = JSON.parse(this.responseText)
                    } catch (e) {
                        console.error("Enter Chat: ", e.message)
                    }
                    if (verifySupportOnline !== undefined && verifySupportOnline.supportOnline !== undefined) {
                        if (verifySupportOnline.supportOnline === true) {
                            window.location.href = "../chat.php"
                            if (form1 !== null && form2 !== null) {

                                form1.classList.add('form-display-none');
                                form2.classList.add('form-display-block');
                                setTimeout(function () {
                                    document.querySelector('.load-container').style = "display: none;"
                                }, 2000)
                            }
                            UpdateChat(true)
                        } else {
                            window.location.href = "../chatOffline.php"
                        }
                    } 
                    //else {
                    //     alert("Erro data Support: Contate o administrador")
                    // }


                }
                hrx.send('clientName=' + textChatName.value + '&email=' + textChatEmail.value + '&request=enterChatClient');

            } else {
                alert("Favor preencher Nome e email")
            }
        } else if (document.location.pathname === "/login.php") {
            var userName = document.querySelector("input[name='emailUser']");
            var password = document.querySelector("input[name='passwordUser']");
            var status = document.querySelector("input[type='checkbox']");

            if (userName.value && password.value) {
                var hrxS = new XMLHttpRequest();
                hrxS.open('POST', '../src/classes/Chat.php', true);
                hrxS.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrxS.onload = function () {

                    try {

                        var info_Support_Connect = JSON.parse(this.responseText)
                    } catch (e) {
                        console.error("Enter Chat: ", e.message)
                    }
                    if (info_Support_Connect !== undefined && info_Support_Connect.auth !== undefined) {
                        if (info_Support_Connect.auth) {

                            UpdateChat(true)
                            window.location.href = "./adminPage.php"
                            document.querySelector('.chat-message').classList.remove('display-none-content');
                            document.querySelector('.painel-view').classList.remove('display-none-content');
                            document.querySelector('.logout-btn').classList.remove('display-none-content');
                        } else {
                            alert('Login ou senha incorreto')
                        }
                    }
                }
                hrxS.send('login=' + userName.value + '&password=' + password.value + '&status=' + status.checked + '&request=enterChatSupport');

            } else {
                alert("Favor preencher email e senha")
            }
        }
    })
}

function SendMessageChat(obj) {
    var spanMessageID = document.querySelectorAll('.message-block > :nth-child(4)');

    if (spanMessageID.length > 0 && obj.data.length > 0) {

        for (var i = 0; i < obj.data.length; i++) {
            //Verify if index is not null, if equal null, is because not exist element in block-message but was send message and add in database
            if (spanMessageID[i] === undefined) {
                var div = document.createElement('div')
                var nameClient = document.createElement('p')
                var message = document.createElement('p')
                var dateTime = document.createElement('p')
                var id = document.createElement('span')
                var containerMessages = document.querySelector('.messages-send');
                var date = new Date();
                nameClient.innerText = obj.data[i].name;
                message.innerText = obj.data[i].message;
                dateTime.innerText = obj.data[i].dateTime;
                id.innerHTML = obj.data[i].id;
                switch (obj.data[i].definedAuth) {
                    case 0:
                        div.setAttribute('class', 'client message-block')
                        break;
                    case 1:
                        div.setAttribute('class', 'support message-block')
                        break;
                    case 2:
                        div.setAttribute('class', 'System message-block')
                        break;
                    default:
                        break;
                }

                div.appendChild(nameClient);
                div.appendChild(message);
                div.appendChild(dateTime);
                div.appendChild(id)
                containerMessages.appendChild(div);
                containerMsg.scrollTop = containerMsg.scrollHeight

            } else {

                if (Number(spanMessageID[i].innerHTML) === Number(obj.data[i].id)) {
                    //Alredy exist in block-message
                } else {
                    //Case haven't found in list
                    var div = document.createElement('div')
                    var nameClient = document.createElement('p')
                    var message = document.createElement('p')
                    var dateTime = document.createElement('p')
                    var id = document.createElement('span')
                    var containerMessages = document.querySelector('.messages-send');
                    var date = new Date();
                    nameClient.innerText = obj.data[i].name;
                    message.innerText = obj.data[i].message;
                    dateTime.innerText = obj.data[i].dateTime;
                    id.innerHTML = obj.data[i].id;
                    switch (obj.data[i].definedAuth) {
                        case 0:
                            div.setAttribute('class', 'client message-block')
                            break;
                        case 1:
                            div.setAttribute('class', 'support message-block')
                            break;
                        case 2:
                            div.setAttribute('class', 'System message-block')
                            break;
                        default:
                            break;
                    }
                    div.appendChild(nameClient);
                    div.appendChild(message);
                    div.appendChild(dateTime);
                    div.appendChild(id)
                    containerMessages.appendChild(div);
                    containerMsg.scrollTop = containerMsg.scrollHeight

                }
            }
        }
    } else {
        obj.data.forEach(function (ob) {
            var div = document.createElement('div')
            var nameClient = document.createElement('p')
            var message = document.createElement('p')
            var dateTime = document.createElement('p')
            var id = document.createElement('span')
            var containerMessages = document.querySelector('.messages-send');
            var date = new Date();
            nameClient.innerText = ob.name;
            message.innerText = ob.message;
            dateTime.innerText = ob.dateTime;
            id.innerHTML = ob.id;
            switch (ob.definedAuth) {
                case 0:
                    div.setAttribute('class', 'client message-block')
                    break;
                case 1:
                    div.setAttribute('class', 'support message-block')
                    break;
                case 2:
                    div.setAttribute('class', 'System message-block')
                    break;
                default:
                    break;
            }

            div.appendChild(nameClient);
            div.appendChild(message);
            div.appendChild(dateTime);
            div.appendChild(id)
            containerMessages.appendChild(div);
            containerMsg.scrollTop = containerMsg.scrollHeight
        })
    }

}

if (location.pathname === '/adminPage.php' || location.pathname === '/chatSupport.php' || location.pathname === '/visitorsTable.php') {
    UpdateChat(true);
}

if (SuportInitChat !== null && SupportFinishChat !== null) {
    SuportInitChat.addEventListener('click', function (event) {
        event.preventDefault();

        var hrxS = new XMLHttpRequest();
        hrxS.open('POST', '../src/classes/Chat.php', true);
        hrxS.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        hrxS.onload = function () {
        
            containerMsg.innerHTML = "";
            try {


                var response = JSON.parse(this.responseText);
            } catch (e) {
                console.error("Init Chat: ", e.message)
            }

            if (location.pathname === '/chatSupport.php') {
                if (response !== undefined && response.InitError !== undefined) {
                    alert(response.InitError)
                }
            }
        }
        hrxS.send('request=initChat');

    })
    SupportFinishChat.addEventListener('click', function (event) {
        event.preventDefault();
        var hrxS = new XMLHttpRequest();
        hrxS.open('POST', '../src/classes/Chat.php', true);
        hrxS.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        hrxS.onload = function () {
            try {
                var result = JSON.parse(this.responseText);
            } catch (e) {
                console.error("Finish Chat: ", e.message)
            }
            if (result !== undefined && result.EndChat !== undefined) {
                alert(result.EndChat);
            }
        }
        hrxS.send('request=finishChat');
    })
}

function ClientVeifyRoom() {
    if (location.pathname === '/chat.php') {
        var hrxS = new XMLHttpRequest();
        hrxS.open('POST', '../src/classes/Chat.php', true);
        hrxS.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        hrxS.onload = function () {
            containerMsg.innerHTML = "";
        }
        hrxS.send('request=connectChat');
    }
}

!function logOut() {
    var logOutBtn = document.querySelector('.logout-btn-2')
    if (logOutBtn) {
        logOutBtn.addEventListener('click', function (event) {
            var hrxS = new XMLHttpRequest();
            hrxS.open('POST', '../src/classes/Chat.php', true);
            hrxS.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            hrxS.onload = function () {
                let response = JSON.parse(this.responseText)
                if (response !== null && response.logout !== null) {
                    if (response.logout) {
                        window.location.href = "./login.php";
                    }
                } else {
                    alert("Erro logout: Entre em contato com o administrador")
                }
            }
            hrxS.send('request=logout')
        })
    }
}()
!function logOut() {
    var logOutBtn = document.querySelector('.logout-btn')
    if (logOutBtn) {
        logOutBtn.addEventListener('click', function (event) {
            window.location.href = "./adminPage.php"
        })
    }
}()

!function HandleFormsRequestEmail(btn) {
    let buttonOfflineSend = document.querySelector('[data-offlinesendbtn]');
    if (buttonOfflineSend) {
        buttonOfflineSend.addEventListener('click', event => {
            event.preventDefault()
            var name = document.querySelector('[name="clientName"]').value
            var email = document.querySelector('[name="clientEmail"]').value
            var msg = document.querySelector('[name="msgClient"]').value

            if (name !== "" && email !== "" && msg !== "") {
                var responseData;
                var hrx = new XMLHttpRequest();
                hrx.open('POST', '../handleForms.php', true);
                hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrx.onload = async function () {
                    responseData = await this.responseText;


                }
                hrx.send(`Nome=${name}&Email=${email}&Mensagem=${msg}&Request='Contato Chat'`)
            } else {
                alert('Favor preencher todos os campos')
            }
        })
    }
}

!function changeStatus() {
    let buttonStatus = document.querySelector('.info a');
    if (buttonStatus) {
        buttonStatus.addEventListener('click', function () {
            var hrx = new XMLHttpRequest();
            hrx.open('POST', '../src/classes/Chat.php', true);
            hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            hrx.onload = function () {
                let responseStatus;
                try {
                    responseStatus = JSON.parse(this.responseText);
                } catch (error) {
                    console.warn('Error parse', e.message);
                }
                if (responseStatus !== undefined && responseStatus.online !== undefined) {
                    var msgError = document.querySelector('.offlineError-msg');
                    if (responseStatus.online === true) {
                        buttonStatus.innerHTML = "<i class='fa fa-circle text-success'></i> Online";
                        if (msgError !== null) {
                            msgError.setAttribute('style', 'height: 0 !important; transition: height 0.3s !important; overflow: hidden !important')
                        }

                    } else {
                        buttonStatus.innerHTML = "<i class='fa fa-circle text-danger'></i> Offline";
                    }
                } else {
                    alert("Error ao mudar status: Entre em contato com o administrador")
                }




            }
            hrx.send('request=changeStatus')
        })
    }
}()

