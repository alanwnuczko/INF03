<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div id="left1">
        <h3>Ryby zamieszkujące rzeki</h3>
        <ol>
            <?php
                $pol = mysqli_connect("localhost", "root", "", "wedkowanie");

                $query = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.ryby_id WHERE lowisko.rodzaj = 3";
                $result = mysqli_query($pol, $query);

                while($row = $result -> fetch_array()){
                    echo"<li>" . $row[0] . " pływa w rzece " . $row[1] . ", " . $row[2] . "</li>";
                }
            ?>
        </ol>
    </div>
    <div id="left2">
        <h3>Ryby drapieżne naszych wód</h3>
        <table>
            <tr>
            <th>L.p.</th>
            <th>Gatunek</th>
            <th>Występowanie</th>
            </tr>
            <?php
                $query = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
                $result = mysqli_query($pol, $query);

                while($row = $result -> fetch_array()){
                    echo"<tr>";
                    echo"<td>" . $row[0] . "</td>";
                    echo"<td>" . $row[1] . "</td>";
                    echo"<td>" . $row[2] . "</td>";
                    echo"</tr>";
                }
            
                mysqli_close($pol);
            ?>
        </table>
    </div>
    <div id="right">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.md">Pobierz kwerendy</a>
    </div>

    <footer>
        <p>Stronę wykonał: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>