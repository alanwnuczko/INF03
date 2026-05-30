<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Smoki</title>
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>

    <nav>
        <section id="Baza" onclick="navBaza()">Baza</section>
        <section id="Opisy" onclick="navOpisy()">Opisy</section>
        <section id="Galeria" onclick="navGaleria()">Galeria</section>
    </nav>

    <main>
        <section id="section1">
            <h3>Baza smoków</h3>
            <form action="smok.php" method="post">
                <select name="pochodzenie" id="pochodzenie">
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "smoki");
                        $query = mysqli_query($conn, "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC");
                        while($row = mysqli_fetch_assoc($query)){
                            echo"<option value='{$row['pochodzenie']}'>  {$row['pochodzenie']}  </option>";
                        }
                        $pochodzenie = $_POST['pochodzenie'];
                    ?>
                </select>

                <button name="submit">Szukaj</button>
            </form>

            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <?php
                    if(isset($_POST['submit'])){
                        $query = mysqli_query($conn, "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = '$pochodzenie'");
                        while($row = mysqli_fetch_assoc($query)){
                            echo"<tr><td>{$row['nazwa']}</td><td>{$row['dlugosc']}</td><td>{$row['szerokosc']}</td></tr>";
                        }
                    }

                    mysqli_close($conn);
                ?>
                </table>
        </section>
        <section id="section2">
            <h3>Opisy smoków</h3>
            <dl>
                <dt>smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                <dt>Smok niebieski</dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
            </dl>
        </section>
        <section id="section3">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok czerwony">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
        </section>
    </main>

    <footer>
        <p>Stronę opracował: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
    <script src="main.js"></script>
</body>
</html>