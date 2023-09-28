<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function _palindrome($a){
        if(!is_numeric($a)){
            if(strrev($a)==$a) return "true";
            return "false";
        }
        return "invalid value";
    }
    echo(_palindrome("kajak")."<br>"); #true
    echo(_palindrome("wakacje")."<br>"); #false
    echo(_palindrome(3281)); #invalid value
    ?>
</body>
</html>