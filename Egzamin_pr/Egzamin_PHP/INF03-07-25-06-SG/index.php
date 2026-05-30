<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Biuro turystyczne</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="wczasy.html">Wczasy</a>
            </li>
            <li>
                <a href="wycieczki.html">Wycieczki</a>
            </li>
            <li>
                <a href="allinclusive.html">All inclusive</a>
            </li>
        </ul>
    </nav>
    
    <main>
        <aside>
            <h3>Twój cel wyprawy</h3>
            <form action="index.php" method="POST">
                <label for="miejsce_wycieczki">Miejsce wycieczki</label><br>
                <!-- lista rozwijalna -->
                 <select name="miejsce_wycieczki" id="miejsce_wycieczki">
                    <?php
                        $pol = mysqli_connect('localhost', 'root', '', 'wyprawy');

                        $query = mysqli_query($pol, "SELECT nazwa FROM miejsca ORDER BY nazwa ASC");
                        if(mysqli_num_rows($query)){
                            while($row = $query -> fetch_assoc()){
                                echo'<option value="' .$row['nazwa']. '">' . $row['nazwa'].'</option>';
                            }
                        }
                    ?>
                 </select>
                <label for="">Ile dorosłych?</label><br>
                 <input type="number" name="liczba_doroslych" id="liczba_doroslych"><br>
                 <label for="liczba_dzieci">Ile dzieci?</label><br>
                 <input type="number" name="liczba_dzieci" id="liczba_dzieci"><br>
                 <label for="termin">Termin</label><br>
                 <input type="date" name="termin" id="termin"><br>
                 <button type="submit" name="cena">Symulacja ceny</button><br>
            </form>
            <h4>Koszt wycieczki</h4>
            <?php
                if(isset($_POST['cena'])){
                    $miejsce = $_POST['miejsce_wycieczki'];
                    $dorosli = $_POST['liczba_doroslych'];
                    $dzieci = $_POST['liczba_dzieci'];
                    $termin = $_POST['termin'];

                    $query = mysqli_query($pol, "SELECT cena FROM miejsca WHERE nazwa = '$miejsce'");
                    $row = mysqli_fetch_assoc($query);

                    $koszt = $row['cena'] * $dorosli + $row['cena'] * 0.5 * $dzieci;

                    echo "<p>W dniu: $termin</p>";
                    echo "<p>$koszt złotych</p>";
                }
            ?>
        </aside>
        <section>
            <h3>Wycieczki</h3>
            <?php
                $query = mysqli_query($pol, "SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE '0%'");

                while($row = mysqli_fetch_assoc($query)){
                echo "<div class='wycieczka'><img src='" . $row['link_obraz'] . "' alt='zdjęcie z wycieczki'><h2>" . $row['nazwa'] . "</h2><p>" . $row['cena'] . " zł</p></div>";
                }

                mysqli_close($pol);
            ?>
        </section>
    </main>

    <footer>
        <p>Autor: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>