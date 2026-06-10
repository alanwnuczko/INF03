<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Islandia</title>
</head>
<body>
    <header>
        <h1><a href="islandia.php">Zwiedzaj islandię</a></h1>
    </header>
    <aside>
        <h3>Do zwiedzania</h3>
        <ul>
            <li>Wodospady</li>
            <ol>
                <?php
                    // Skrypt 1
                    $conn = mysqli_connect("localhost", "root", "", "islandia");
                    $query = mysqli_query($conn, "SELECT nazwa FROM obiekty WHERE idRodzaj = 10");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<li>{$row['nazwa']}</li>";
                    }
                ?>                
            </ol>
            <li>Siedliska zwierząt</li>
            <ol>
                <?php
                    // Skrypt 2
                    $query = mysqli_query($conn, "SELECT nazwa FROM obiekty WHERE idRodzaj = 14");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<li>{$row['nazwa']}</li>";
                    }
                ?>
            </ol>
        </ul>
    </aside>
    <main>
        <h2>Opis miejsca</h2>
            <section>
                <?php
                    // Skrypt 4
                    $idObiektu = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje ON obiekty.idRodzaj = rodzaje.idRodzaj WHERE idObiekt = $idObiektu");
                    $result = mysqli_fetch_assoc($query);

                    echo"<img src='{$result['plik']}' alt='{$result['nazwa']}'>";
                    echo"<h2>{$result['nazwa']}</h2>";
                    echo"<h3>{$result['rodzaj']}</h3>";
                    echo"<p>{$result['nazwaCechy']}: {$result['wartoscCechy']}</p>";
                    echo"<p>{$result['opis']}</p>";

                    mysqli_close($conn);
                ?>
            </section>
    </main>
    <footer>
        <hr>
        <p>Autor: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>