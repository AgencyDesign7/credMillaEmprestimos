var submit = document.querySelector("input[type='submit']")

if(submit){
    submit.addEventListener('click', function(event){
        var param = document.querySelector("input[type='text']").value
        event.preventDefault();
        var hrx = new XMLHttpRequest();
        hrx.open('POST', '../src/classes/Person.php', true)
        hrx.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        
        hrx.onload = function(){
            console.log(hrx.responseText)
        }
        hrx.send('clientName=' + param)
        
    })
}