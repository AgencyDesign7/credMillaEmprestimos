!function checkSession() {
    var hrx = new XMLHttpRequest();
    hrx.open('POST', '../src/classes/Chat.php', true);
    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrx.onload = function () {
        var info_Connect = JSON.parse(this.responseText)


        console.log(info_Connect)
        if (info_Connect.auth === true) {
            form1.classList.add('form-display-none');
            form2.classList.add('form-display-block');
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


// if (submit) {
//     submit.addEventListener('click', function (event) {
//         var param = document.querySelector("input[type='text']").value
//         event.preventDefault();
//         var hrx = new XMLHttpRequest();
//         hrx.open('POST', '../src/classes/Chat.php', true)
//         hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//         hrx.onload = function () {

//             console.log(this.responseText)
//             //console.log(JSON.parse(this.responseText))
//         }
//         hrx.send('clientName=' + param)

//     })
// }

if (sendMessage) {
    sendMessage.addEventListener('click', function (e) {
        e.preventDefault();
        if (messageText.value) {
            var hrx = new XMLHttpRequest();
            hrx.open('POST', '../src/classes/Chat.php', true);
            hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            hrx.onload = function () {
                var info_Client_Connect = JSON.parse(this.responseText)
                console.log(info_Client_Connect)
                SendMessageChat(info_Client_Connect)
                messageText.value = '';
                containerMsg.scrollTop = containerMsg.scrollHeight;

            }
            hrx.send('request=sendMessageChat&Message=' + messageText.value);


        } else {
            alert('Campo de menssagem vazio')
        }

    })
}

if (submit) {
    submit.addEventListener('click', function (event) {
        event.preventDefault();
        if (document.location.pathname === '/chat.php') {


            if (textChatName.value && textChatEmail.value) {
                var hrx = new XMLHttpRequest();
                hrx.open('POST', '../src/classes/Chat.php', true);
                hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrx.onload = function () {
                    var info_Client_Connect = JSON.parse(this.responseText)
                    form1.classList.add('form-display-none');
                    form2.classList.add('form-display-block');
                }
                hrx.send('clientName=' + textChatName.value + '&email=' + textChatEmail.value + '&request=enterChatClient');

            } else {
                alert("Favor preencher Nome e email")
            }
        } else if (document.location.pathname === "/chatSupport.php") {
            var userName = document.querySelector(".form1 input[name='supportName']");
            var password = document.querySelector(".form1 input[name='password']");
            var status = document.querySelector(".form1 input[type='checkbox']");

            if (userName.value && password.value) {
                var hrxS = new XMLHttpRequest();
                hrxS.open('POST', '../src/classes/Chat.php', true);
                hrxS.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrxS.onload = function () {
                    console.log(this.responseText)
                    var info_Support_Connect = JSON.parse(this.responseText)
                    if (info_Support_Connect.auth) {
                        form1.classList.add('form-display-none');
                        form2.classList.add('form-display-block');
                    } else {
                        alert('Login ou senha incorreto')
                    }
                }
                hrxS.send('login=' + userName.value + '&password=' + password.value + '&status=' + status.value + '&request=enterChatSupport');

            } else {
                alert("Favor preencher Nome e email")
            }
        }
    })
}

function SendMessageChat(obj) {
    var div = document.createElement('div')
    var nameClient = document.createElement('p')
    var message = document.createElement('p')
    var dateTime = document.createElement('p')
    var containerMessages = document.querySelector('.messages-send');
    var date = new Date();
    nameClient.innerText = obj.name;
    message.innerText = obj.message;
    dateTime.innerText = obj.dateTime;
    console.log(obj.mode)
    if (obj.definedAuth === 1) { div.setAttribute('class', 'support message-block') } else { div.setAttribute('class', 'client message-block') }

    div.appendChild(nameClient);
    div.appendChild(message);
    div.appendChild(dateTime);
    containerMessages.appendChild(div);
}


