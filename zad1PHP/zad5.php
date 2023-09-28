<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    global $value1;
    global $value2;
    global $sum;
    function addition($a, $b){
        $value1 = $a;
        $value2 = $b;
        return $sum = $value1 + $value2;
    }
    echo(addition(13, 25));
    ?>
</body>
</html>