<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="DELETEscriptPHP.php" method="post">
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
        <input type="submit" name="submit" value="Zatwierdź i usuń użytkownika">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $id = $_POST["select"];
            if($id == NULL){
                echo "jakaś z wymaganych wartości nie została podana!";
            }
            else{
                $p = mysqli_connect("localhost","root","","mojabaza");
                $z = "DELETE FROM uzytkownicy WHERE id=$id;";
                if (mysqli_query($p, $z)){echo "pomyślnie usunięto użytkownika!";}
                else{echo "coś poszło nie tak, nie usunięto użytkonika";}
                mysqli_close($p);
            }
        }
    ?>
</body>
</html>