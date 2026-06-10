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
        <h2>Galeria</h2>
        <section>
            <?php
                // Skrypt 3
                $query = mysqli_query($conn, "SELECT idObiekt, plik, nazwa FROM obiekty WHERE panstwo = 'Islandia'");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<a href='obiekty.php?id={$row['idObiekt']}'><img src='{$row['plik']}' alt='{$row['nazwa']} title='{$row['nazwa']}' class='miniatury'></a>";
                }

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