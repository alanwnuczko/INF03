<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>OPONY</title>
</head>
<body>
    <main>
        <aside>
            <?php
                // Skrypt 1
                $conn = mysqli_connect("localhost", "root", "", "opony");
                $query = mysqli_query($conn, "SELECT * FROM opony ORDER BY cena ASC LIMIT 10");
                while($row = mysqli_fetch_array($query)){
                    echo"<section class='opona'>";
                    if($row[3] === "letnia"){
                        $rodzaj_obrazu = "lato.png";
                    }
                    elseif($row[3] === "zimowa"){
                        $rodzaj_obrazu = "zima.png";
                    }
                    else{
                        $rodzaj_obrazu = "uniwer.png";
                    }
                    echo"<img src='{$rodzaj_obrazu}'>";
                    echo"<h4>Opona: {$row[1]} {$row[2]}</h4>";
                    echo"<h3>Cena: {$row[4]}</h3>";
                    echo"</section>";
                }
            ?>
            <p><a href="https://opona.pl">więcej ofert</a></p>
        </aside>
        <section id="sekcja1">
            <img src="opona.png" alt="Opona">
            <h2>Opona dnia</h2>
            <?php
                // Skrypt 2
                $query = mysqli_query($conn, "SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<h2>".$row['producent']." model ".$row['model']."</h2>";
                    echo"<h2>Sezon: ".$row['sezon']."</h2>";
                    echo"<h2>Tylko ".$row['cena']."zł!</h2>";
                }
            ?> 
        </section>
        <section id="sekcja2">
            <h2>Najnowsze zamówienie</h2>
            <?php 
                // Skrypt 3
                $query = mysqli_query($conn, "SELECT id_zam, ilosc, model, cena FROM zamowienie JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<h2>".$row['id_zam']." ".$row['ilosc']." sztuki modelu ".$row['model']."</h2>";
                    $wartosc = $row['ilosc'] * $row['cena'];
                    echo"<h2>Wartość zamówienia ".$wartosc." zł</h2>";
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