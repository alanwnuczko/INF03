<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Gry komputerowe</title>
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>

    <section id="left">
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
            <?php
            // Skrypt 1
                $conn = mysqli_connect("localhost", "root", "", "gry");
                $query = mysqli_query($conn, "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<li>" . $row['nazwa'] ." <span class='punkty'> " . $row['punkty'] . "</span></li>";
                }
            ?>
        </ul>

        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonał</h3>
        <p><a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </section>
    <section id="center">
        <?php
        // Skrypt 2
        $query = mysqli_query($conn, "SELECT id, nazwa, zdjecie FROM gry");

        while($row = mysqli_fetch_assoc($query)){
            echo"<div class=''gry>";
            echo"<img src='" . $row['zdjecie'] . "' alt='" . $row['nazwa'] . "' title='" . $row['id'] . "'>";
            echo"<p>" . $row['nazwa']."</p></div>";
        }
        
        ?>
    </section>
    <section id="right">
        <h3>Dodaj nową grę</h3>
        <form action="gry.php" method="post">
            <label for="nazwa">nazwa</label><br><input type="text" name="nazwa"><br>
            <label for="opis">opis</label><br><input type="text" name="opis"><br>
            <label for="cena">cena</label><br><input type="text" name="cena"><br>
            <label for="zdjecie">zdjęcie</label><br><input type="text" name="zdjecie"><br>
            <input type="submit" value="DODAJ">
            <?php 
                if(isset($_POST['nazwa'])){
                    $nazwa1 = $_POST['nazwa'];
                    $opis1 = $_POST['opis'];
                    $cena1 = $_POST['cena'];
                    $zdjceie1 = $_POST['zdjecie'];
                    $query = mysqli_query($conn, "INSERT INTO `gry` (`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('$nazwa1','$opis1',0,$cena1,'$zdjceie1')");
                }
            ?>
        </form>
    </section>

    <footer>
        <form action="gry.php" method="post">
            <input type="text" name="wyszukaj-opis"> <input type="submit" value="Pokaż opis" name="submit">
            <?php
            // Skrypt 3
                if(isset($_POST['wyszukaj-opis']) && isset($_POST['submit'])){
                    $id_gry = $_POST['wyszukaj-opis'];
                    $query = mysqli_query($conn, "SELECT nazwa, LEFT(opis, 100), punkty, cena FROM gry WHERE id = $id_gry");
                    $result = mysqli_fetch_assoc($query);
                    $nazwa = $result['nazwa'];
                    $opis = $result['LEFT(opis, 100)'];
                    $punkty = $result['punkty'];
                    $cena = $result['cena'];

                    echo"<h2>" . $nazwa . ", " . $punkty . " punktów, " .$cena . " zł</h2>";
                    echo"<p>{$opis}</p>";
                }

                mysqli_close($conn);
            ?>
        </form>
    </footer>
</body>
</html>