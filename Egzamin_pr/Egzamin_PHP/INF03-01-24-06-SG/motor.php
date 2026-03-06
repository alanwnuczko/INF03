<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Motocykle</title>
</head>
<body>
    <img src="motor.png" alt="Motor">
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main>
        <div id="lewy">
            <h2>Gdzie pojechać</h2>
            <?php
                $pol = @mysqli_connect('localhost', 'root', '', 'motory') or die ("Nie można się połączyć");
                $query = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki INNER JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id";
                $result = mysqli_query($pol, $query);

                if(!$result || mysqli_num_rows($result) == 0)
                    {
                        echo"Brak Danych";
                    }
                    else
                    {
                        while($row = mysqli_fetch_array($result))
                            {
                                echo"<div id='terminy'>Termin listy ".$row[0]."Rozpoczyna się ".$row[2]."<a href='".$row[3].".jpg'> Zobacz zdjęcie</a>";
                                echo"</div>";
                                echo"<div id='opis'>$row[1]</div>";
                            }
                    }
            ?>
        </div>
        <div id="prawy1">
            <h2>Co kupić</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
        </div>
        <div id="prawy2">
            <h2>Statystyki</h2>
            <p>
                <?php
                    $query = "SELECT COUNT(*) FROM wycieczki";
                    $result = mysqli_query($pol, $query);
                    while($row = mysqli_fetch_array($result))
                        {
                            echo"<p>Wpisanych wycieczek: ".$row[0] ."";
                        }
                ?>
            </p>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
        </div>
    </main>
    <footer>
        <p>Stronę wykonał: <a href="https://github.com/alanwnuczko" style="color: white;">Alan Wnuczko</a></p>
    </footer>
</body>
</html>