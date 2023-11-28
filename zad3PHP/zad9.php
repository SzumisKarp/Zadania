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
        .paginacja {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .paginacja a {
            padding: 10px;
            margin: 0 5px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: black;
        }
        .paginacja a:hover {
            background-color: #ddd;
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

        // Ustawienia paginacji
        $wyniki_na_stronie = 10;
        $strona = isset($_GET['strona']) ? $_GET['strona'] : 1;
        $poczatek = ($strona - 1) * $wyniki_na_stronie;

        $z = "SELECT * FROM uzytkownicy LIMIT $poczatek, $wyniki_na_stronie;";
        $w = mysqli_query($p, $z);

        while(($r=mysqli_fetch_array($w))!=NULL){
            echo "<tr><td>$r[0]</td><td>$r[1]</td><td>$r[2]</td><td>$r[3]</td></tr>";
        }
    ?>
    </table>
    <div class="paginacja">
        <?php
            $z1 = "SELECT COUNT(*) FROM uzytkownicy";
            $w1 = mysqli_query($p, $z1);
            $wiersz = mysqli_fetch_row($w1);
            $rekordy = $wiersz[0];
            $strony = ceil($rekordy / $wyniki_na_stronie);

            for ($i=1; $i<=$strony; $i++) {
                echo "<a href='?strona=$i'>$i</a>";
            }
            mysqli_close($p);
        ?>
    </div>
</body>
</html>
