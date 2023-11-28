<!DOCTYPE html>
<html lang="en">
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
    <?php
        $conn = mysqli_connect("localhost", "root", "", "mojabaza");
        $sql = "SELECT u.imie, u.nazwisko, u.email, g.nazwa_grupy FROM uzytkownicy u, grupy g WHERE u.id_grupy = g.id_grupy;";
        $result = mysqli_query($conn, $sql);
        while(($r = mysqli_fetch_array($result))!=NULL){
            echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td></tr>";
        }
        mysqli_close($conn);
    ?>
    </table>
</body>
</html>