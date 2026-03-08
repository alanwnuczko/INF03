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
        <section id="navBaza" onclick="functionBaza()">Baza</section>
        <section id="navOpisy" onclick="functionOpisy()">Opisy</section>
        <section id="navGaleria" onclick="functionGaleria()">Galeria</section>
    </nav>
    <main>
        <section id=baza>
            <h3>Baza Smoków</h3>
            <form action="smoki.php" method="post">
                <select name="baza" id="baza">
                    <?php
                    $pol = mysqli_connect("localhost", "root", "", "smoki");

                    $wybranePochodzenie = isset($_POST['baza']) ? trim($_POST['baza']) : '';

                    $query = "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC";

                    if($result = $pol -> query($query)){
                        while($row = $result -> fetch_assoc()){
                            $pochodzenie = htmlspecialchars($row['pochodzenie']);
                            $selected = ($pochodzenie === $wybranePochodzenie) ? ' selected' : '';
                            echo "<option value=\"{$pochodzenie}\"{$selected}>{$pochodzenie}</option>";
                        }
                        $result -> free();
                    }
                    ?>
                </select>
                <button type="submit">Szukaj</button>
            </form>
            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <?php
                    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['baza'])){
                        $pochodzenie = $_POST['baza'];

                        if($stmt = $pol -> prepare("SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = ?")){
                            $stmt -> bind_param("s", $pochodzenie);
                            
                            if($stmt -> execute() && ($result = $stmt -> get_result())){
                                while($row = $result -> fetch_assoc()){
                                    $nazwa = htmlspecialchars($row['nazwa']);
                                    $dlugosc = htmlspecialchars($row['dlugosc']);
                                    $szerokosc = htmlspecialchars($row['szerokosc']);
                                    echo"<tr>";
                                    echo"<td>{$nazwa}</td>";
                                    echo"<td>{$dlugosc}</td>";
                                    echo"<td>{$szerokosc}</td>";
                                    echo"</tr>";
                                    }
                                    $result -> free();
                            }
                            $stmt -> close();
                        }
                    }
                ?>
            </table>
        </section>
        <section id="opisy">
            <h3>Opisy smoków</h3>
            <dl>
                <dt>Smok Czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>

                <dt>Smok Zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
            
                <dt>Smok Niebieski</dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
            </dl>
        </section>
        <section id="galeria">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok Czerwony">
            <img src="smok2.jpg" alt="Smok Wielki">
            <img src="smok3.jpg" alt="Smok Łacisty">
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: <a href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
<script src="skrypt.js"></script>
</html>