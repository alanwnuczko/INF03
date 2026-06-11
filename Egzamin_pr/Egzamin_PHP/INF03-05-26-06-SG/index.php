<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Sprzedaż antyków</title>
</head>
<body>
    <header>
        <h1>Najlepsze antyki w mieście</h1>
    </header>
    <main>
        <section class="sekcjaGlowna">
            <h2>- Sofy -</h2>
            <?php 
                // Skrypt 1a
                $conn = mysqli_connect("localhost", "root", "", "antyki");
                $query = mysqli_query($conn, "SELECT idMeble, nazwa, plik, styl, cena, opis FROM meble WHERE kategoria = 1");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<section class='mebel'>";
                    echo"<section class='obraz'><img src='sofy/{$row['plik']}' alt='mebel'></section>";
                    echo"<section class='blok_informacji'>";
                    echo"<h3>{$row['nazwa']}</h3>";
                    echo"<h4>styl {$row['styl']}</h4>";
                    echo"<h3>CENA: {$row['cena']} zł</h3>";
                    echo"<form action='index.php' method='post'><button type='submit' name='id_meble' value='{$row['idMeble']}'>KUP</button></form>";
                    echo"</section>";
                    echo"<section class='opis'>{$row['opis']}</section>";
                    echo"</section>";
                }
            ?>
            <h2>- Fotele -</h2>
            <?php 
                // Skrypt 1b
                $query = mysqli_query($conn, "SELECT idMeble, nazwa, plik, styl, cena, opis FROM meble WHERE kategoria = 2");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<section class='mebel'>";
                    echo"<section class='obraz'><img src='fotele/{$row['plik']}' alt='mebel'></section>";
                    echo"<section class='blok_informacji'>";
                    echo"<h3>{$row['nazwa']}</h3>";
                    echo"<h4>styl {$row['styl']}</h4>";
                    echo"<h3>CENA: {$row['cena']} zł</h3>";
                    echo"<form action='index.php' method='post'><button type='submit' name='id_meble' value='{$row['idMeble']}'>KUP</button></form>";
                    echo"</section>";
                    echo"<section class='opis'>{$row['opis']}</section>";
                    echo"</section>";
                }
            ?>
            <h2>- Komody -</h2>
            <?php
                // Skrypt 1c
                $query = mysqli_query($conn, "SELECT idMeble, nazwa, plik, styl, cena, opis FROM meble WHERE kategoria = 3");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<section class='mebel'>";
                    echo"<section class='obraz'><img src='komody/{$row['plik']}' alt='mebel'></section>";
                    echo"<section class='blok_informacji'>";
                    echo"<h3>{$row['nazwa']}</h3>";
                    echo"<h4>styl {$row['styl']}</h4>";
                    echo"<h3>CENA: {$row['cena']} zł</h3>";
                    echo"<form action='index.php' method='post'><button type='submit' name='id_meble' value='{$row['idMeble']}'>KUP</button></form>";
                    echo"</section>";
                    echo"<section class='opis'>{$row['opis']}</section>";
                    echo"</section>";
                }
                // Skrypt 2
                if(isset($_POST['id_meble'])){
                    $id_meble = $_POST['id_meble'];
                    $query = mysqli_query($conn, "INSERT INTO zakupy (`idKlienci`, `idMeble`, `sztuk`) VALUES (1, $id_meble, 1)");
                }
            ?>
        </section>
        <aside>
            <h2>Koszyk</h2>
            <p>Zalogowano: Anna Kowalska</p>
            <?php 
                // Skrypt 3
                echo"<ol>";
                $query = mysqli_query($conn, "SELECT nazwa, cena FROM meble JOIN zakupy ON meble.idMeble = zakupy.idMeble WHERE idKlienci = 1");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<li>{$row['nazwa']}, cena: {$row['cena']}</li>";
                }
                echo"</ol>";

                mysqli_close($conn);
            ?>
        </aside>
    </main>
    <footer>
        <p>Stronę wykonał: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>