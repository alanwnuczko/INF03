<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
    <title>Korona gór polskich</title>
</head>
<body>
    <div class="div-headery">
        <header>
            <img src="logo.png" alt="Logo">
        </header>
        <header>
            <h1>Korona Gór Polskich</h1>
        </header>
    </div>

<main>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "korona");
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $wynik = mysqli_query($conn, "SELECT s.plik, s.nazwa, s.wysokosc, s.pasmo, o.opis FROM szczyty s JOIN opis o ON o.szczyty_id = s.id WHERE s.id = $id");
            $row = mysqli_fetch_array($wynik);

            echo '<img src="' . $row['plik'] . '" alt="szczyt">';
            echo '<h2>' . $row['nazwa'] . '</h2>';
            echo '<h3>wysokość: ' . $row['wysokosc'] . ' metrów n.p.m.</h3>';
            echo '<h3>pasmo górskie: ' . $row['pasmo'] . '</h3>';
            echo '<p>' . $row['opis'] . '</p>';

    }
    ?>
</main>

<section>
    <?php
        $wynik = mysqli_query($conn, "SELECT plik, nazwa FROM szczyty LIMIT 10");
        while ($row = mysqli_fetch_array($wynik)){
            echo '<img src="' . $row['plik'] . '" alt="' . $row['nazwa'] . '" class="miniatury">';
    }
    mysqli_close($conn);
    ?>
</section>

<div class="div-stopki">
    <footer class="stopka1">
        <h3>Kontakt</h3>
        <ul>
            <li>Zadzwoń do nas: 111 222 333</li>
            <li><a href="mailto:korona@gory.pl">Napisz do nas</a></li>
        </ul>
    </footer>
    <footer class="stopka2">
        <h3>&copy; Wykonane przez: <a href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></h3>
    </footer>
</div>
</body>
</html>