!function checkSession() {
    var hrx = new XMLHttpRequest();
    hrx.open('POST', '../src/classes/Chat.php', true);
    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrx.onload = function () {
        var info_Connect = JSON.parse(this.responseText)

        if (info_Connect.auth === true) {
            form1.classList.add('form-display-none');
            form2.classList.add('form-display-block');
        }
    }
    hrx.send('checkStart=Auth');
}()

//Only for teste sql commands
!function CheckValues() {
    var hrx = new XMLHttpRequest();
    hrx.open('POST', '../src/classes/Chat.php', true);
    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    hrx.onload = function () {
       console.log(this.responseText)
    }
    hrx.send('request=countdb');
}()

var submit = document.querySelector(".sub-btn1")
var sendMessage = document.querySelector(".sub-btn2")
var messageText = document.querySelector(".form2 textarea")
var form1 = document.querySelector(".form1")
var form2 = document.querySelector(".form2")
var textChatName = document.querySelector(".form1 input[type='text']");
var textChatEmail = document.querySelector(".form1 input[type='email']");
var containerMsg = document.querySelector(".messages-send");

if(true){
    var updateMessage = setInterval(function(){
        var auxRequest = false;
        var messagesBlock = document.querySelectorAll('.message-block > span');;
        var messagesSend = document.querySelectorAll('.message-block > :nth-child(2)');
        //console.log(messagesBlock)
        var inter = 0;
        //if(inter > 100) {clearInterval(x)}
        var hrxUp = new XMLHttpRequest();
                hrxUp.open('POST', '../src/classes/Chat.php', true);
                hrxUp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                hrxUp.responseType = 'text';
                hrxUp.onload = function () {
                    //console.log(this.responseText)
    
                    var info_Client_Connect =this.responseText
                    
                    var arrayData = info_Client_Connect.split('*')
                    
                    var objVal = new Object();
                    objVal.data = [];
                    for(let i = 0; i < arrayData.length - 1; i++){
                        objVal.data.push(JSON.parse(arrayData[i]))
                        
                    }
                    var containerMessages = document.querySelector('.messages-send');
                    
                    for(let i = 0; i < objVal.data.length; i++){
                        
                        // if(messagesSend.length > 0){
                        //     if(messagesSend[i].innerHTML === objVal.data[i].message){
                        //         console.log(objVal.data[i])
                        //         objVal.data.splice(i, 1)
    
                        //     }
                                //containerMessages.innerHTML = ""
                            
                            //SendMessageChat(objVal.data[i])
                            console.log('update')
                            
                        }
                        if(objVal.data.length > 0){
                            SendMessageChat(objVal)
                        }
                        //console.log(objVal.data)
                        // SendMessageChat(objVal.data[i])
                        // containerMsg.scrollTop = containerMsg.scrollHeight
                    
                    
                }
                if(messagesSend.length > 0){
                    var arrElements = []
                    messagesSend.forEach(d=>{
                        arrElements.push(d.innerHTML)
                    })
                }
                hrxUp.send('request=updateChat&messagesid='+ JSON.stringify(arrElements));
    }, 3000)
}else{
    clearInterval(updateMessage);
}



if (sendMessage) {
    sendMessage.addEventListener('click', function (e) {
        e.preventDefault();
        if (messageText.value) {
            var hrx = new XMLHttpRequest();
            hrx.open('POST', '../src/classes/Chat.php', true);
            hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            hrx.onload = function () {
                
                var info_Client_Connect = JSON.parse(this.responseText)
                //console.log(info_Client_Connect)
                
                //SendMessageChat(info_Client_Connect)
                messageText.value = '';
                //containerMsg.scrollTop = containerMsg.scrollHeight;

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
                    //console.log(this.responseText)
                    var info_Support_Connect = JSON.parse(this.responseText)
                    if (info_Support_Connect.auth) {
                        form1.classList.add('form-display-none');
                        form2.classList.add('form-display-block');
                    } else {
                        alert('Login ou senha incorreto')
                    }
                }
                hrxS.send('login=' + userName.value + '&password=' + password.value + '&status=' + status.checked + '&request=enterChatSupport');

            } else {
                alert("Favor preencher Nome e email")
            }
        }
    })
}

function SendMessageChat(obj) {
    var spanMessageID = document.querySelectorAll('.message-block > :nth-child(4)');

    if(spanMessageID.length > 0 && obj.data.length > 0){
        
        for(var i = 0; i < obj.data.length; i++){
            //Verify if index is not null, if equal null, is because not exist element in block-message but was send message and add in database
            if(spanMessageID[i] === undefined){
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
                if (obj.data[i].definedAuth === 1) { div.setAttribute('class', 'support message-block') } else { div.setAttribute('class', 'client message-block') }
                div.appendChild(nameClient);
                div.appendChild(message);
                div.appendChild(dateTime);
                div.appendChild(id)
                containerMessages.appendChild(div);
                containerMsg.scrollTop = containerMsg.scrollHeight
                
            }else{

                if(Number(spanMessageID[i].innerHTML) === Number(obj.data[i].id)){
                    //Alredy exist in block-message
                }else{
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
                    if (obj.data[i].definedAuth === 1) { div.setAttribute('class', 'support message-block') } else { div.setAttribute('class', 'client message-block') }
                    div.appendChild(nameClient);
                    div.appendChild(message);
                    div.appendChild(dateTime);
                    div.appendChild(id)
                    containerMessages.appendChild(div);
                    containerMsg.scrollTop = containerMsg.scrollHeight
                    
                }
            }
        }
    }else{
        obj.data.forEach(function(ob){
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
                if (ob.definedAuth === 1) { div.setAttribute('class', 'support message-block') } else { div.setAttribute('class', 'client message-block') }
                div.appendChild(nameClient);
                div.appendChild(message);
                div.appendChild(dateTime);
                div.appendChild(id)
                containerMessages.appendChild(div);
                containerMsg.scrollTop = containerMsg.scrollHeight
        })
    }
    
}


