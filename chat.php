<!DOCTYPE html>
<html lang="en">
<?php 
    if(!isset($_SESSION)){session_start();}
    $_SESSION['admin'] = 'Adenilton';
    if(isset($_SESSION['admin'])){echo "you are Admin!";} 
    
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - CredMilla empréstimos</title>
</head>
<body>
    <form action="" method="post">
        <input name="clientName" type="text">
        <input type="submit" value="Enviar">
    </form>
    <script src="./scripts/script.chat.resouce.js"></script>
</body>
</html>