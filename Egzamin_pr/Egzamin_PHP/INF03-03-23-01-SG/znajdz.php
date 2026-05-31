<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Kwiaty</title>
</head>
<body>
    <header>
        <h1>Grupa Polskich Kwiaciarni</h1>
    </header>

    <div id="left">
        <h2>Menu</h2>
        <ol>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
            <li><a href="znajdz.php">Znajdź kwiaciarnię</a></li>
            <ul>
                <li>W Warszawie</li>
                <li>W Malborku</li>
                <li>W Poznaniu</li>
            </ul>
        </ol>
    </div>

    <div id="right">
        <h2>Znajdź kwiaciarnię</h2>
        <form action="znajdz.php" method="post">
            <label for="miasto">Podaj nazwę miasta:</label>
            <input type="text" name="miasto" id="miasto">
            <button type="submit" name="check">SPRAWDŹ</button>
        </form>
        <?php
        $pol = mysqli_connect("localhost", "root", "", "kwiaciarnia");
            if(isset($_POST["check"])){
                $miasto = $_POST["miasto"];

                $query = mysqli_query($pol,"SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$miasto'");

                while($row = mysqli_fetch_assoc($query)){
                    echo"<h3>" . $row[0] . ", " . $row[1] . "</h3>";
                }     
            }

            mysqli_close($pol);
        ?>

    </div>

    <footer>
        <p>Strone opracował: <a href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>