<?php
    $pol = mysqli_connect("localhost", "root", "", "szkolenia");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Szkolenia i kursy</title>
</head>
<body>
    <header>
        <h1>SZKOLENIA</h1>
    </header>

    <main>
        <section id="left">
            <table>
                <tr>
                    <th>Kurs</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                </tr>
                <?php
                    $query = mysqli_query($pol, "SELECT kod, nazwa, cena FROM kursy ORDER BY cena");

                    while($row = $query -> fetch_assoc()){
                        echo"<tr>";
                        echo"<td><img src='".$row['kod'].".jpg' alt='kurs'></td>";
                        echo"<td>" . $row['nazwa'] . "</td>";
                        echo"<td>" . $row['cena'] . "</td>";
                        echo"</tr>";
                    }
                ?>
            </table>
        </section>
        <section id="right">
            <form action="index.php" method="post">
                <h2>Zapisy na kursy</h2>
                <label for="imie">Imie</label><br>
                <input type="text" name="imie" id="imie"><br>
                <label for="nazwisko">Nazwisko</label><br>
                <input type="text" name="nazwisko" id="nazwisko"><br>
                <label for="wiek">Wiek</label><br>
                <input type="number" name="wiek" id="wiek"><br>
                <label for="rodzaj">Rodzaj kursu</label><br>
                <select name="rodzaj" id="rodzaj">
                    <?php
                        $query = mysqli_query($pol, "SELECT nazwa FROM kursy");

                        while($row = $query -> fetch_assoc()){
                            echo"<option value='" . $row['nazwa'] . "'>" . $row['nazwa'] . "</option>";
                        }
                    ?>
                </select><br>
                <button type="submit">Dodaj dane</button><br>
                <?php
                    if($_POST["imie"] == "" || $_POST["nazwisko"] == "" || $_POST["wiek"] == "" || $_POST["rodzaj"] == ""){
                        echo"Wprowadź wszystkie dane";
                    }
                    else{
                        $imie = $_POST["imie"];
                        $nazwisko = $_POST["nazwisko"];
                        $wiek = $_POST["wiek"];
                        $rodzaj = $_POST["rodzaj"];

                        // Zapytanie 3: INSERT INTO `uczestnicy` (`imie`, `nazwisko`, `wiek`) VALUES ('Tadeusz', 'Wysocki', '36');

                        $query = mysqli_query($pol, "INSERT INTO `uczestnicy` (`imie`, `nazwisko`, `wiek`) VALUES ('$imie', '$nazwisko', $wiek)");
                        echo"Dane uczestnika $imie $nazwisko zostały dodane";

                        mysqli_close($pol);
                    }
                ?>
            </form>

        </section>
    </main>

    <footer>
        <p>Stronę wykonał: <a style="text-decoration: none;" href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>