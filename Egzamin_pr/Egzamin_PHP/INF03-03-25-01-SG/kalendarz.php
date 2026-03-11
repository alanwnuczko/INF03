<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Kalendarz</title>
</head>
<body>
    <header>
        <h1>Dni, miesiące, lata...</h1>
    </header>
    <div id="napis">
        <?php
            $pol = mysqli_connect("localhost", "root", "", "kalendarz");

            $miesiac = date("m-d");

            $dni_tygodnia = array(
                'Monday'    => 'Poniedziałek',
                'Tuesday'   => 'Wtorek',
                'Wednesday' => 'Środa',
                'Thursday'  => 'Czwartek',
                'Friday'    => 'Piątek',
                'Saturday'  => 'Sobota',
                'Sunday'    => 'Niedziela'
            );

            $dzien_ang = date('l');

            $query = "SELECT imiona FROM imieniny WHERE data = '$miesiac';";
            $result = $pol -> query(query: $query);
            while($row = $result -> fetch_array()){
                echo"<p>Dzisiaj jest ".$dni_tygodnia[$dzien_ang].", ".date("d.m.y").", imieniny: $row[0]</p>";
            }
        ?>
    </div>
    <div id="left">
        <table>
            <tr>
                <th>Liczba dni</th>
                <th>Miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczeń</td>
            </tr>
            <tr>
                <td>marzec</td>
            </tr>
            <tr>
                <td>maj</td>
            </tr>
            <tr>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>sierpień</td>
            </tr>
            <tr>
                <td>październik</td>
            </tr>
            <tr>
                <td>grudzień</td>
            </tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>czerwiec</td>
            </tr>
            <tr>
                <td>wrzesień</td>
            </tr>
            <tr>
                <td>listopad</td>
            </tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </div>

    <main>
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="kalendarz.php" method="post">
            <input type="date" name="data" id="data" min="2024-01-01" max="2024-12-31" required>
            <input type="submit" value="Wyślij">
        </form>

        <?php
            if(isset($_POST["data"])){
                $data = $_POST["data"];
                $format = date("m-d", strtotime($_POST["data"]));

                $query = "SELECT imiona FROM imieniny WHERE data = '$format'";
                $result = $pol -> query(query: $query);

                while($row = $result -> fetch_array()){
                    $imieniny = $row[0];
                }

                echo"$data są imieniny: $imieniny";
            }
            mysqli_close($pol);
        ?>
    </main>

    <div id="right">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank"><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>
                Słoneczny
                <ul>
                    <li>kalendarz Majów</li>
                    <li>Juliański</li>
                    <li>Gregoriański</li>
                </ul>
            </li>
            <li>
                Księżycowy
                <ul>
                    <li>Starogrecki</li>
                    <li>Babiloński</li>
                </ul>
            </li>
        </ol>
    </div>
    <footer>
        <p>Stronę opracował: <a href="https://www.github.com/alanwnuczko" style="color: unset;">Alan Wnuczko</a></p>
    </footer>
</body>
</html>