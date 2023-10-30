<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="UPDATEscriptPHP.php" method="post">
        Imie: <input type="text" name="imie"><br>
        Nazwisko: <input type="text" name="nazwisko"><br>
        Email: <input type="email" name="email"><br>
        Wybierz na podstawie ID: <select name="select">
            <?php
                $p = mysqli_connect("localhost","root","","mojabaza");
                $z = "SELECT id FROM uzytkownicy;";
                $w = mysqli_query($p, $z);
                while(($r=mysqli_fetch_array($w))!=NULL){
                    echo "<option value='$r[0]'>$r[0]</option>";
                }
                mysqli_close($p);
            ?>
        </select><br>
        <input type="submit" name="submit" value="Zatwierdź i zaaktualizuj użytkownika">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $imie = $_POST["imie"];
            $nazwisko = $_POST["nazwisko"];
            $email = $_POST["email"];
            $id = $_POST["select"];
            if($imie == NULL or $nazwisko == NULL or $email == NULL or $id == NULL){
                echo "jakaś z wymaganych wartości nie została podana!";
            }
            else{
                $p = mysqli_connect("localhost","root","","mojabaza");
                $z = "UPDATE uzytkownicy SET imie = '$imie', nazwisko = '$nazwisko', email = '$email' WHERE id = $id;";
                if (mysqli_query($p, $z)){echo "pomyślnie zaaktualizowano użytkownika!";}
                else{echo "coś poszło nie tak, nie zaaktualizowano użytkonika";}
                mysqli_close($p);
            }
        }
    ?>
</body>
</html>