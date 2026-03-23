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
        $wynik = mysqli_query($conn, "SELECT id, nazwa FROM szczyty ORDER BY wysokosc DESC");
        while ($row = mysqli_fetch_array($wynik)){
            echo '<span><a href="szczyty.php?id=' . $row['id'] . '">' . $row['nazwa'] . '</a></span>';
    }
    mysqli_close($conn);
    ?>
</main>

<section>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "korona");
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