<?php
$conn = mysqli_connect("localhost", "root", "", "obuwie");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Obuwie</title>
</head>
<body>
    <header>
        <h1>Obuwie męskie</h1>
    </header>

    <main>
        <h2>Zamówienie</h2>
        <?php
            if(isset($_POST['model']))
            {
                $model = $_POST['model'];
                $rozmiar = $_POST['rozmiar'];
                $liczba = $_POST['liczba'];

                $query = mysqli_query($conn, "SELECT nazwa, cena, kolor, kod_produktu, material, nazwa_pliku FROM buty JOIN produkt USING(model) WHERE model = '$model'");
                $row = mysqli_fetch_assoc($query);
                echo"<div class='buty'>";
                echo"<img src='" . $row['nazwa_pliku'] . "' alt='but męski'>";
                echo"<h2>" . $row['nazwa'] . "</h2>";

                $cena = $row['cena'] * $liczba;
                echo"<p>Cena za $liczba par: $cena zł</p>";
                echo"<p>Szczegóły produktu: " . $row['kolor'] . ", " . $row['material'] . "</p>";
                echo"<p>Rozmiar: " . $rozmiar . "</p>";
            }

            mysqli_close($conn);
        ?>
        <a href="index.php">Strona Główna</a>
    </main>
    <footer>
        <p>Autor Strony: <a href="https://www.github.com/alanwnuczko"> Alan Wnuczko</a></p>
    </footer>
</body>
</html>