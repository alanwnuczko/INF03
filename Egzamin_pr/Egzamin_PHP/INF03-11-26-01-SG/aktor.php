<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Informacje o aktorze | KinoTEKA</title>
</head>
<body>
    <header id="baner1">
        <h2><a href="index.php">KinoTEKA</a></h2>
    </header>
    <header id="baner2">
        <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
    </header>
    <main>
        <section id="blok_aktorów">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "kino");
                $id = $_GET['id'];
                $query1 = mysqli_query($conn, "SELECT imie, nazwisko, plik_awatara FROM aktorzy WHERE id_aktora = $id");
                while(isset($_GET['id']) && $row = mysqli_fetch_array($query1)){
                    echo"<section class='blok_pojedynczego_aktora_aktor'>";
                    echo"<img src='img/{$row[2]}' alt='{$row[0]} {$row[1]}' title='{$row[0]} {$row[1]}'>";
                    echo"<h1>{$row[0]} {$row[1]}</h1>";

                    $query2 = mysqli_query($conn, "SELECT filmy.id_filmu, tytul, rok_produkcji FROM filmy JOIN filmy_aktorzy ON filmy.id_filmu = filmy_aktorzy.id_filmu WHERE filmy_aktorzy.id_aktora = $id");
                    $result = mysqli_fetch_array($query2);
                    $imie = $row[0];
                    if(mysqli_num_rows($query2) === 0){
                        echo"{$imie} nie znajduje się na listach obsady znanych nam produkcji";
                    }
                    else{
                        $liczba = mysqli_num_rows($query2);
                        echo"{$imie} znajduje się na listach obsady {$liczba} znanych nam produkcji";
                    }
                    echo"</section>";
                }

                mysqli_close($conn);
            ?>
        </section>
    </main>
    <footer>
        <p>Autor: <strong><a href="https://github.com/alanwnuczko">Alan Wnuczko</a></strong></p>
    </footer>
</body>
</html>