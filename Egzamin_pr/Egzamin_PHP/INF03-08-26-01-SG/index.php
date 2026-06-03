<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Korona gór polskich</title>
</head>
<body>
    <header id="baner1">
        <img src="logo.png" alt="Logo">
    </header>
    <header id="baner2">
        <h1>Korona Gór Polskich</h1>
    </header>
    <main>
        <?php
            // Skrypt 1
            $conn = mysqli_connect("localhost", "root", "", "korona");
            $query = mysqli_query($conn, "SELECT id, nazwa FROM szczyty ORDER BY wysokosc DESC");
            while($row = mysqli_fetch_assoc($query)){
                echo"<span><a href='szczyty.php?id={$row['id']}'>{$row['nazwa']}</a></span>";
            }
        ?>
    </main>
    <section>
        <?php
            // Skrypt 2
            $query = mysqli_query($conn, "SELECT plik, nazwa FROM szczyty LIMIT 10");
            while($row = mysqli_fetch_assoc($query)){
                echo"<img src='{$row['plik']}' alt='{$row['nazwa']}' class='miniatury'>";
            }
        ?>
    </section>
    <footer id="footer1">
        <h3>Kontakt</h3>
        <ul>
            <li>Zadzwoń do nas: 111 222 333</li><br>
            <li><a href="mailto:korona@gory.pl">Napisz do nas</a></li>
        </ul>
    </footer>
    <footer id="footer2">
        <h3>&copy; Wykonane przez: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></h3>
    </footer>
</body>
</html>