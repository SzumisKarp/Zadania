<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $t = array(1,2,"3",4,"tak",6,'7',8,9,"nie");
    foreach ($t as $key => $value) {
        echo($value);
    }
    ?>
</body>
</html>