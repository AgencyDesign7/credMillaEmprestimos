if(window.location.pathname === "/registerUser.php"){
    let iName = document.querySelector('input[name="Nome"]')
    let iLogin = document.querySelector('input[name="Login"]')
    let iEmail = document.querySelector('input[name="Email"]')
    let iPassword = document.querySelector('input[name="Senha"]')
    let iRpassword = document.querySelector('input[name="Repetir senha"]')
    let iPVisitors = document.querySelector('input[name="c-visitors"]')
    let iPUsers = document.querySelector('input[name="c-permissionsUsers"]')
    let iPChat = document.querySelector('input[name="c-chat"]')
    let iBntCancel = document.querySelector('button[data-btn-cancel=""]')
    let iBtnSubmit = document.querySelector('button[data-btn-submit=""]')
    let inputsArray = [iName, iLogin, iEmail, iPassword, iRpassword]
    let inputsArray2 = [iName, iLogin, iEmail, iPassword, iRpassword, iPVisitors, iPUsers, iPChat]
   
    iPassword.addEventListener('keyup', function(e){
        if(iPassword.value !== iRpassword.value){
            iPassword.setAttribute('style', 'background-color: rgb(255, 153, 153) !important')
            iRpassword.setAttribute('style', 'background-color: rgb(255, 153, 153) !important')
        }else{
            iPassword.setAttribute('style', 'background-color: rgb(77, 255, 77) !important') 
            iRpassword.setAttribute('style', 'background-color: rgb(77, 255, 77) !important') 
        }
    })
    iRpassword.addEventListener('keyup', function(e){
        if(iPassword.value !== iRpassword.value){
            iPassword.setAttribute('style', 'background-color: rgb(255, 153, 153) !important')
            iRpassword.setAttribute('style', 'background-color: rgb(255, 153, 153) !important')
        }else{
            iPassword.setAttribute('style', 'background-color: rgb(77, 255, 77) !important') 
            iRpassword.setAttribute('style', 'background-color: rgb(77, 255, 77) !important') 
        }
    })
    if(iBtnSubmit !== null){
        iBtnSubmit.addEventListener('click', function(e){
            var checkInputs = 0;
            e.preventDefault();
            inputsArray.forEach(e =>{
                if(e.value !== ""){
                    e.value
                    checkInputs++
                }else{
                    alert("Campo " + e.name + " não pode ser vazio")
                    e.setAttribute('style', 'background-color: rgb(255, 153, 153) !important')
                    e.focus()
                    checkInputs--
                    e.addEventListener('keyup', function(f){
                        e.setAttribute('style', 'background-color: white !important')
                        if(e.value === ""){
                            e.setAttribute('style', 'background-color: rgb(255, 153, 153) !important')
                            
                        }
                        
                    })
                }
            })
            
            if(iPassword.value === iRpassword.value){
               
                if(checkInputs === 5){
                    let hrx = new XMLHttpRequest();
                    hrx.open('POST', '../src/classes/Chat.php', true);
                    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    hrx.onload = function () {
                        let result = JSON.parse(this.responseText);
                        if(result !== undefined && result.Error !== undefined){
                            if(result.Error.includes("Duplicate")){
                                let indexKey = result.Error.indexOf('key')
                                
                                alert('Campo duplicado ' + result.Error.substr(indexKey + 3, result.Error.lenght))
                            }
                            
                        }else if(result !== undefined && result.Sucess !== undefined){

                            alert('Usuário inserido com sucesso!')
                            document.location.reload();

                        }else{
                            alert('Erro no banco de dados. Contate o administrador.')
                        }
                    }
                    hrx.send(`request=addUser&name=${iName.value}&login=${iLogin.value}&email=${iEmail.value}&password=${iPassword.value}&pVisitors=${iPVisitors.checked}&pUsers=${iPUsers.checked}&pChat=${iPChat.checked}`)
                }
            }else{
                alert('As senha não são iguais')
            }


            
        })
    }
    if(iBntCancel !== null){
        iBntCancel.addEventListener('click', function(e){
            e.preventDefault();

        })
    }
}
if(window.location.pathname === "/deleteUser.php"){
    var btnDelete = document.querySelector('button[data-btn-delete=""]')
    var Inputname = document.querySelector('input[name="deleteUser"]')
    if(btnDelete){
        btnDelete.addEventListener('click', function(e){
            e.preventDefault();
            if(Inputname.value === ""){
                alert('Campo nome não pode ser vazio');
                Inputname.focus();
            }else{
                let hrx = new XMLHttpRequest();
                    hrx.open('POST', '../src/classes/Chat.php', true);
                    hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    hrx.onload = function () {
                    
                        let result = JSON.parse(this.responseText);
                        if(result !== undefined && result.Error !== undefined){
                            
                            alert(result.Error);
                        }else if(result !== undefined && result.Sucess !== undefined){

                            alert(result.Sucess)
                            document.location.reload();

                        }else{
                            alert('Erro no banco de dados. Contate o administrador.')
                        }
                    }
                    hrx.send(`request=deleteUser&name=${Inputname.value}`)
            }
        })
    }

}