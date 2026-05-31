<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Zdrowy bazarek</title>
</head>
<body>
    <header>
        <h1>Zdrowy bazarek</h1>
    </header>

    <nav>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "bazar");
            // Zapytanie 1: SELECT nazwa, plik FROM towar LIMIT 10;
            $query = mysqli_query($conn, "SELECT nazwa, plik FROM towar LIMIT 10");
            
            while($row =  mysqli_fetch_assoc($query)){
                echo"<img src='{$row['plik']}' alt='{$row['nazwa']}'>";
            }
        ?>
    </nav>

    <main>
        <aside>
            <img src="market.png" alt="bazarek" id="market">
        </aside>

        <section>
            <p>Wybierz owoc lub warzywo i podaj jego wagę:</p>

            <form action="index.php" method="POST">
                <select name="wybor_owocow" id="wybor_owocow">
                    <?php
                        // Zapytanie 2: SELECT id, nazwa FROM towar;
                        $query = mysqli_query($conn, "SELECT id, nazwa FROM towar");

                        while($row = mysqli_fetch_assoc($query)){
                            echo"<option value='". $row['id'] ."'>" . $row['nazwa'] . "</option>";
                        }
                    ?>
                </select>
                <input type="number" name="waga" id="waga">
                <input type="submit" value="Zamów"><br>
                <?php
                    if(isset($_POST["wybor_owocow"]) && isset($_POST["waga"])){
                        // Zapytanie 3: SELECT rodzaj, nazwa, cena FROM towar WHERE id = 1;
                        $wybor_owocow = $_POST['wybor_owocow'];
                        $query = mysqli_query($conn, "SELECT rodzaj, nazwa, cena, id FROM towar WHERE id = $wybor_owocow");
                        while($row = mysqli_fetch_assoc($query)){
                            $waga = $_POST['waga'];
                            $wartosc = $row['cena'] * $waga;
                            $rodzaj = $row['rodzaj'];
                            $nazwa = $row['nazwa'];
                            echo"{$rodzaj} {$nazwa} wartość: {$wartosc}";
                            
                        }
                        // Zapytanie 4: INSERT INTO zamowienie VALUES (NULL, 9, 2, 20);
                        $query = mysqli_query($conn, "INSERT INTO zamowienie VALUES (NULL, $wybor_owocow, 2, $waga)");
                    }

                    mysqli_close($conn);
                ?>
            </form>
        </section>
    </main>

    <footer>
        <p>Stronę opracował: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>