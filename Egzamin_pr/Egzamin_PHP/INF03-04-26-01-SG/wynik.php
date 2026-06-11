<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Matura</title>
</head>
<body>
    <header>
        <h1>System informacji dla maturzystów</h1>
    </header>
    <aside>
        <img src="ma.jpg" alt="matura">
        <img src="tu.jpg" alt="matura">
        <img src="ra.jpg" alt="matura">
    </aside>
    <section id="section1">
        <?php
            // Skrypt 3
            $conn = mysqli_connect("localhost", "root", "", "matura");
            if(isset($_GET['id'])){
                $id_maturzysty = $_GET['id'];
                $query = mysqli_query($conn, "SELECT rok, sesja, przedmiot, punkty FROM arkusz JOIN wynik ON arkusz.symbol = wynik.symbol WHERE maturzysta_id = $id_maturzysty");
                
                $imie = $_GET['imie'];
                $nazwisko = $_GET['nazwisko'];

                echo"<h2>{$imie} {$nazwisko}</h2>";
                while($row = mysqli_fetch_assoc($query)){
                    echo"<h3>{$row['rok']} {$row['sesja']}</h3>";
                    echo"<p>{$row['przedmiot']}: {$row['punkty']}</p>";
                }
            }
        ?>
    </section>
    <section id="section2">
        <section id="blok1" class="bloki_matura">
            <h4>Przedmioty</h4>
            <?php
                $query = mysqli_query($conn, "SELECT DISTINCT przedmiot FROM arkusz");
                while($row = mysqli_fetch_assoc($query)){
                    echo"{$row['przedmiot']} ";
                }
            ?>
        </section>
        <section id="blok2" class="bloki_matura">
            <h4>Lata</h4>
            <?php
                $query = mysqli_query($conn,"SELECT MIN(rok), MAX(rok) FROM arkusz");
                while($row = mysqli_fetch_array($query)){
                    echo"{$row[0]} - {$row[1]}";
                }
            ?>
        </section>
        <section id="blok3" class="bloki_matura">
            <h4>Najlepszy wynik</h4>
            <?php
                $query = mysqli_query($conn, "SELECT maturzysta_id, AVG(punkty) AS 'wynik' FROM wynik GROUP BY maturzysta_id ORDER BY wynik DESC LIMIT 1");
                $result = mysqli_fetch_array($query);
                echo $result[1]."%";
            ?>  
        </section>
        <section id="blok4" class="bloki_matura">
            <h4>Najgorszy wynik</h4>
            <?php
                $query = mysqli_query($conn, "SELECT maturzysta_id, AVG(punkty) AS 'wynik' FROM wynik GROUP BY maturzysta_id ORDER BY wynik ASC LIMIT 1");
                $result = mysqli_fetch_array($query);
                echo $result[1]."%";

                mysqli_close($conn);
            ?>
        </section>
    </section>
    <footer>
        <p>Stronę wykonał: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>