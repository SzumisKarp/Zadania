<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table, th, td {
            border: 1px solid black;
        }
        th{
            padding-left: 20px;
            padding-right: 20px;
        }
        td{
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>imie</th>
            <th>nazwisko</th>
            <th>email</th>
        </tr>
    <?php
        $p = mysqli_connect("localhost","root","","mojabaza");
        $z = "SELECT * FROM uzytkownicy;";
        $w = mysqli_query($p, $z);
        while(($r=mysqli_fetch_array($w))!=NULL){
            echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td></tr>";
        }
        mysqli_close($p);
    ?>
    </table>
</body>
</html>