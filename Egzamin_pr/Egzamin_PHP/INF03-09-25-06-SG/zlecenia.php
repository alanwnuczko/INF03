<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Remonty</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <header>
            <h1>Malowanie i gipsowanie</h1>
        </header>

        <main>
            <nav>
                <a href="kontakt.html">Kontakt</a>
                <a href="https://remonty.pl" target="_blank">Partnerzy</a>
            </nav>

            <aside>
                <img src="tapeta_lewa.png" alt="usługi">
                <img src="tapeta_prawa.png" alt="usługi">
                <img src="tapeta_lewa.png" alt="usługi">
            </aside>

            <section id="lewo">
                <h2>Dla klientów</h2>
                <form action="zlecenia.php" method="post">
                    <label for="pracownikow">Ilu co najmniej pracowników potrzebujesz?</label><br>
                    <input type="number" name="pracownikow" id="pracownikow">
                    <button type="submit" name="szukaj_firm">Szukaj firm</button>
                </form>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "remonty");
                    
                    $query = "SELECT nazwa_firmy, liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >= ?";
                    if (isset($_POST['szukaj_firm'])) {
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $_POST['pracownikow']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        echo "<ul>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<li>" . htmlspecialchars($row['nazwa_firmy']) . ", " . $row['liczba_pracownikow'] . " pracowników</li>";
                        }
                        echo "</ul>";
                        $stmt->close();
                    }
                ?>
            </section>

            <section id="srodek">
                <h2>Dla wykonawców</h2>
                <form action="zlecenia.php" method="post">
                    <select name="miasto" id="miasto">
                        <?php
                            $query = "SELECT DISTINCT miasto FROM klienci ORDER BY miasto;";
                            $result = $conn->query($query);
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['miasto'] . '">' . $row['miasto'] . '</option>';
                            }
                        ?>
                    </select><br>
                    <input type="radio" name="usluga" id="usluga-malowanie" value="malowanie" checked> <label for="usluga-malowanie">malowanie</label><br>
                    <input type="radio" name="usluga" id="usluga-gipsowanie" value="gipsowanie"> <label for="usluga-gipsowanie">gipsowanie</label><br>
                    <button type="submit" name="szukaj_klientow">Szukaj klientów</button>
                </form>
                <?php
                    $query = "SELECT imie, cena FROM klienci JOIN zlecenia USING(id_klienta) WHERE miasto = ? AND rodzaj = ?";
                    if (isset($_POST['szukaj_klientow'])) {
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("ss", $_POST['miasto'], $_POST['usluga']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        echo "<ul>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<li>" . htmlspecialchars($row['imie']) . " - " . $row['cena'] . "</li>";
                        }
                        echo "</ul>";
                        $stmt->close();
                    }
                    mysqli_close($conn);
                ?>
            </section>
        </main>

        <footer>
            <p>Stronę wykonał: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
        </footer>
    </body>
</html>