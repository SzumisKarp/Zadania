<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $receiver = "minecreolo@gmail.com";
    $notification = "Nowa wiadomość od $name";
    $sender = "Od: $email";
    
    if (mail($receiver, $notification, $message, $sender)) {
        echo "Wiadomość została wysłana pomyślnie!";
    }
    else {
        echo "Wystąpił problem podczas wysyłania wiadomości.";
    }
?>
</body>
</html>