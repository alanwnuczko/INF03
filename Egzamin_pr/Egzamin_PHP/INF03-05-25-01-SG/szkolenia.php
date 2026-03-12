<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Firma szkoleniowa</title>
</head>
<body>
    <header>
        <img src="baner.jpg" alt="Szkolenia">
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="szkolenia.php">Szkolenia</a></li>
        </ul>
    </nav>
    <main>
        <?php
            $pol = mysqli_connect("localhost", "root", "", "firma");

            $query = "SELECT data, temat FROM szkolenia ORDER BY data";
            $result = $pol -> query($query);

            while($row = $result -> fetch_assoc()){
                echo"<p>" . $row["data"] . " " . $row['temat'] . "</p>";
                file_put_contents("harmonogram.txt", $row["data"] . " " . $row["temat"] . PHP_EOL, FILE_APPEND);
            }
            mysqli_close($pol);
        ?>
    </main>
    <footer>
        <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
        <p>Autor: <a href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
    
</body>
</html>