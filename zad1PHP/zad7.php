<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $file = file('zad7.txt');
    foreach ($file as $key => $value) {
        echo($value);
    }
    ?>
</body>
</html>