<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function zarejestrujUzytkownika($login, $haslo){
            $sol = bin2hex(random_bytes(16));
            $hasloZasolone = hash('sha256', $sol.$haslo);
            $polaczenie = mysqli_connect("localhost", "root", "", "mojabaza");
            $tworzenie = "INSERT INTO uzytkownicy (email, haslo, sol) VALUES ('$login', '$hasloZasolone', '$sol');";
            $wynik = mysqli_query($polaczenie, $tworzenie);
            if ($wynik){
                echo "Użytkownik zarejestrowany pomyślnie.";
                mysqli_close($polaczenie);
            } 
            else{
                echo "Błąd podczas rejestracji użytkownika: ".mysqli_error($polaczenie);
                mysqli_close($polaczenie);
            }
        }
        session_start();
        function zalogujUzytkownika($login, $haslo){
            $polaczenie = mysqli_connect("localhost", "root", "", "mojabaza");
            $logowanie = "SELECT sol, haslo FROM uzytkownicy WHERE email = '$login';";
            $wynik = mysqli_query($polaczenie, $logowanie);
            if ($wynik){
                $row = mysqli_fetch_assoc($wynik);
                $sol = $row['sol'];
                $hasloZasolone = hash('sha256', $sol.$haslo);
                if ($hasloZasolone === $row['haslo']){
                    $_SESSION['zalogowany'] = true;
                    $_SESSION['login'] = $login;
                    echo "Zalogowano pomyślnie.";
                }
                else{
                    echo "Błędny login lub hasło.";
                }
            } 
            else{
                echo "Błąd podczas logowania: ".mysqli_error($polaczenie);
            }
            mysqli_close($polaczenie);
        }
    ?>
    <h2>Logowanie i Rejestracja</h2>

    <p>Logowanie</p>
    <form action="zad7.php" method="post">
        Login:<input type="text" name="login-logowanie" required><br>
        Hasło:<input type="password" name="haslo-logowanie" required><br>
        <input type="submit" value="Zaloguj" name="Zaloguj">
    </form>
    <?php
        if (isset($_POST["Zaloguj"])) {
            $login = $_POST["login-logowanie"];
            $haslo = $_POST["haslo-logowanie"];
            zalogujUzytkownika($login, $haslo);
        }
    ?>

    <p>Rejestracja</p>
    <form action="zad7.php" method="post">
        Login:<input type="text" name="login-rejestracja" required><br>
        Hasło:<input type="password" name="haslo-rejestracja" required><br>
        <input type="submit" value="Zarejestruj" name="Zarejestruj">
    </form>
    <?php
        if (isset($_POST["Zarejestruj"])){
            $login = $_POST['login-rejestracja'];
            $haslo = $_POST['haslo-rejestracja'];
            zarejestrujUzytkownika($login, $haslo);
        }
    ?>
</body>
</html>