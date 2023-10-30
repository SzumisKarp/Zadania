<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="INSERT_INTOscriptPHP.php" method="post">
        Imie: <input type="text" name="imie"><br>
        Nazwisko: <input type="text" name="nazwisko"><br>
        Email: <input type="email" name="email"><br>
        <input type="submit" name="submit" value="Zatwierdź i utwórz użytkownika">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $imie = $_POST["imie"];
            $nazwisko = $_POST["nazwisko"];
            $email = $_POST["email"];
            if($imie == NULL or $nazwisko == NULL or $email == NULL){
                echo "jakaś z wymaganych wartości nie została podana!";
            }
            else{
                $p = mysqli_connect("localhost","root","","mojabaza");
                $z = "INSERT INTO uzytkownicy (imie, nazwisko, email) VALUES ('$imie', '$nazwisko', '$email');";
                if (mysqli_query($p, $z)){echo "pomyślnie wstawiono użytkownika!";}
                else{echo "coś poszło nie tak, nie wstawiono użytkonika";}
                mysqli_close($p);
            }
        }
    ?>
</body>
</html>