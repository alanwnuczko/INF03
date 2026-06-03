<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Lista aktorów | KinoTEKA</title>
</head>
<body>
    <header id="baner1">
        <h2><a href="index.php">KinoTEKA</a></h2>
    </header>
    <header id="baner2">
        <p><em>W naszej bazie znajdują się najlepsi aktorzy</em></p>
    </header>
    <main>
        <h1>Najlepsi aktorzy tylko w naszym kinie</h1>
        <section id="blok_aktorow">
            <?php 
                $conn = mysqli_connect("localhost", "root", "", "kino");
                $query = mysqli_query($conn, "SELECT * FROM aktorzy ORDER BY nazwisko, imie ASC");
                while($row = mysqli_fetch_array($query)){ // IMG - ARRAY[4]
                    echo"<a href='aktor.php?id={$row[0]}'>";
                    echo"<section class='blok_pojedynczego_aktora_index'>";
                    echo"<img src='img/{$row[4]}' alt='{$row[1]} {$row[2]}' title='{$row[1]} {$row[2]}'>";
                    echo"<p>{$row[1]} {$row[2]}</p>";
                    echo"</section></a>";
                }
            ?>
        </section>
    </main>
    <footer>
        <p>Autor: <strong><a href="https://github.com/alanwnuczko">Alan Wnuczko</a></strong></p>
    </footer>
</body>
</html>