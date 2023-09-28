<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $t = array("diament", "zelazo", "zloto", "tytan", "wegiel");
    foreach ($t as $key => $value) {
        echo("$value ");
    }
    echo("<br>");
    sort($t);
    foreach ($t as $key => $value) {
        echo("$value ");
    }
    ?>
</body>
</html>