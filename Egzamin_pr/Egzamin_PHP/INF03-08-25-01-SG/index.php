<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <title>Mieszalnia farb</title>
</head>
<body>
    <header>
        <img src="baner.png" alt="Mieszalnia farb">
    </header>

    <form action="index.php" method="post">
        <label for="dataOd">Data odbioru od: </label>
        <input type="date" name="dataOd" id="dataOd">
        <label for="dataDo">Data odbioru do: </label>
        <input type="date" name="dataDo" id="datDo">
        <button type="submit" name="wyszukaj" id="wyszukaj">Wyszukaj</button>
    </form>
    <main>
        <table>
            <tr>
                <th>Nr zamówienia</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Kolor</th>
                <th>Pojemność [ml]</th>
                <th>Data Odbioru</th>
            </tr>

            <?php
                $pol = mysqli_connect("localhost", "root", "", "mieszalnia");

                if(isset($_POST['wyszukaj'])){
                    $dataOd = $_POST['dataOd'];
                    $dataDo = $_POST['dataDo'];
                    $query = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta WHERE data_odbioru >= '$dataOd' AND data_odbioru <= '$dataDo' ORDER BY data_odbioru";
                    $result = $pol -> query($query);

                    while($row = $result -> fetch_assoc()){
                        echo"<tr>";
                        echo"<td>" . $row["id"] . "</td>";
                        echo"<td>" . $row["nazwisko"] . "</td>";
                        echo"<td>" . $row["imie"] . "</td>";
                        echo"<td style='background-color: #" . $row["kod_koloru"] . ";'>" . $row["kod_koloru"] . "</td>";
                        echo"<td>" . $row["pojemnosc"] . "</td>";
                        echo"<td>" . $row["data_odbioru"] . "</td>";
                        echo"</tr>";
                    }
                }
                else{
                    $query = "SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta ORDER BY data_odbioru";
                    $result = $pol -> query($query);
                    while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nazwisko"] . "</td>";
	                        echo "<td>" . $row["imie"] . "</td>";
	                        echo "<td style='background-color: #".$row["kod_koloru"].";'>" . $row["kod_koloru"] . "</td>";
	                        echo "<td>" . $row["pojemnosc"] . "</td>";
	                        echo "<td>" . $row["data_odbioru"] . "</td>";
                            echo "</tr>";
                    }
	            }
                mysqli_close($pol);
            ?>
        </table>
    </main>
    <footer>
        <h3>Egzamin INF.03</h3>
        <P>Autor: <a href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></P>
    </footer>
</body>
</html>