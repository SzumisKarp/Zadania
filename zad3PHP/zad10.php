<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwanie użytkowników</title>
</head>
<body>
    <h1>Wyszukiwanie użytkowników</h1>
    <form method="post" action="">
        <label for="searchTerm">Wyszukaj użytkownika:</label>
        <input type="text" name="searchTerm" id="searchTerm" required>
        <button type="submit" name="submit">Szukaj</button>
    </form>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'mojabaza');
    if (!$conn) {
        echo('Błąd połączenia z bazą danych: '.mysqli_connect_error());
    }
    if (isset($_POST["submit"])) {
    $searchTerm = $_POST['searchTerm'];
    $query = "SELECT * FROM uzytkownicy WHERE imie LIKE '$searchTerm' OR nazwisko LIKE '$searchTerm' OR email LIKE '$searchTerm';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row['id'] . "<br>";
            echo "Imię: " . $row['imie'] . "<br>";
            echo "Nazwisko: " . $row['nazwisko'] . "<br>";
            echo "Mail: " . $row['email'] . "<br>";
            echo "------------------------<br>";
        }
    } 
    else {echo "Brak wyników dla wyszukiwania: $searchTerm";}
    }
    mysqli_close($conn);
    ?>
</body>
</html>