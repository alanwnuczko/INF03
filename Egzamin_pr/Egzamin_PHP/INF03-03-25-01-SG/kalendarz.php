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

    <section id="blok_napisu">
        <p>
            <?php
                // Skrypt 1
                $dzisiaj_mm_dd = date('m-d');
                $conn = mysqli_connect("localhost", "root", "", "kalendarz");
                $query = mysqli_query($conn, "SELECT imiona FROM imieniny WHERE data = '$dzisiaj_mm_dd'");
                $row = mysqli_fetch_assoc($query);
                $dzien_tygodnia = date("D");
                if($dzien_tygodnia == 'Mon'){
                    $dzien_tygodnia = "Poniedziałek";
                }
                if($dzien_tygodnia == 'Tue'){
                    $dzien_tygodnia = "Wtorek";
                }
                if($dzien_tygodnia == 'Wed'){
                    $dzien_tygodnia = "Środa";
                }
                if($dzien_tygodnia == 'Thu'){
                    $dzien_tygodnia = "Czwartek";
                }
                if($dzien_tygodnia == 'Fri'){
                    $dzien_tygodnia = "Piątek";
                }
                if($dzien_tygodnia == 'Sat'){
                    $dzien_tygodnia = "Sobota";
                }
                if($dzien_tygodnia == 'Sun'){
                    $dzien_tygodnia = "Niedziela";
                }
                    $data_dzisiaj = date("d-m-y");
                echo"Dzisiaj jest {$dzien_tygodnia}, {$data_dzisiaj}, imieniny: {$row['imiona']}";
            ?>
        </p>
    </section>
    <section id="left">
        <table>
            <tr>
                <th>liczba dni</th>
                <th>miesiąc</th>
            </tr>
            <tr>
                <td rowspan="7">31</td>
                <td>styczen</td>
            </tr>
            <tr><td>marzec</td></tr>
            <tr><td>maj</td></tr>
            <tr><td>lipiec</td></tr>
            <tr><td>sierpień</td></tr>
            <tr><td>październik</td></tr>
            <tr><td>grudzień</td></tr>
            <tr>
                <td rowspan="4">30</td>
                <td>kwiecień</td>
            </tr>
            <tr><td>czerwiec</td></tr>
            <tr><td>wrzesień</td></tr>
            <tr><td>listopad</td></tr>
            <tr>
                <td>28 lub 29</td>
                <td>luty</td>
            </tr>
        </table>
    </section>
    <section id="center">
        <h2>Sprawdź kto ma urodziny</h2>
        <form action="kalendarz.php" method="post">
            <input type="date" name="inputData" id="inputData" min="2024-01-01" max="2024-12-31" required>
            <input type="submit" name="submit" value="Wyślij">
        </form>
        <?php
            // Skrypt 2
            if(isset($_POST['inputData']) && isset($_POST['submit'])){
                $inputData = $_POST['inputData'];
                $formularz_mm_dd = date("m-d", strtotime($inputData));
                $query = mysqli_query($conn, "SELECT imiona FROM imieniny WHERE data = '$formularz_mm_dd'");
                while($row = mysqli_fetch_assoc($query)){
                    echo"Dnia {$inputData} są imieniny: {$row['imiona']}";
                }
            }

            mysqli_close($conn);
        ?>
    </section>
    <section id="right">
        <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majow" target="_blank"><img src="kalendarz.gif" alt="Kalendarz Majów"></a>
        <h2>Rodzaje kalendarzy</h2>
        <ol>
            <li>sloneczny</li>
            <ul>
                <li>kalendarz Majów</li>
                <li>juliański</li>
                <li>gregoriański</li>
            </ul>
            <li>księżycowy</li>
            <ul>
                <li>starogrecki</li>
                <li>babiloński</li>
            </ul>
        </ol>
    </section>

    <footer>
        <p>Stronę opracował(a): <a href="https://github.com/alanwnuczko" style="color: white;">Alan Wnuczko</a></p>
    </footer>
</body>
</html>