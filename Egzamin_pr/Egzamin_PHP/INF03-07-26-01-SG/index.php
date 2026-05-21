<?php
    $pol = mysqli_connect("localhost", "root", "", "pogoda");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Pogoda</title>
</head>
<body>
    <header id="baner1">
        <img src="slonce.png" alt="Słonecznie">
    </header>

    <header id="baner2">
        <h1>Pogoda w Europie</h1>
    </header>

    <main>
        <section id="left">
            <h2>Temperatury w lipcu</h2>
            <table>
                <tr>
                    <th>Miasto</th>
                    <th>Kraj</th>
                    <th>Temperatura</th>
                    <th>Pogoda</th>
                </tr>
                <?php
                    $query = mysqli_query($pol, "SELECT nazwa, kraj, temperatura FROM miejscowosc JOIN pomiary ON pomiary.id_miejscowosc = miejscowosc.id WHERE id_miesiac = 7");

                    
                    
                    while($row = $query -> fetch_assoc()){
                        echo"<tr>";
                        echo"<td>" . $row['nazwa'] ."</td> ";
                        echo"<td>" . $row['kraj'] . "</td> ";
                        echo"<td>" . $row['temperatura'] . "</td> ";
                        
                        $obraz_pogoda = "";
                        if($row['temperatura'] > 30){
                            $obraz_pogoda = "slonce.png";
                        }
                        else{
                            if($row['temperatura'] < 26){
                                $obraz_pogoda = "deszcz.png";
                            }
                            else{
                                $obraz_pogoda = "chmury.png";
                            }
                        }

                        echo"<td> <img src='" . $obraz_pogoda . "'></td>";
                        echo"</tr>";
                    }
                ?>
            </table>
        </section>
        
        <section id="right">
            <h2>Średnie temperatury w roku</h2>
            <a href="index.php?id_miesiac=1">Styczeń</a>
            <a href="index.php?id_miesiac=2">Luty</a>
            <a href="index.php?id_miesiac=3">Marzec</a>
            <a href="index.php?id_miesiac=4">Kwiecień</a>
            <a href="index.php?id_miesiac=5">Maj</a>
            <a href="index.php?id_miesiac=6">Czerwiec</a>
            <a href="index.php?id_miesiac=7">Lipiec</a>
            <a href="index.php?id_miesiac=8">Sierpień</a>
            <a href="index.php?id_miesiac=9">Wrzesień</a>
            <a href="index.php?id_miesiac=10">Październik</a>
            <a href="index.php?id_miesiac=11">Listopad</a>
            <a href="index.php?id_miesiac=12">Grudzień</a>

            <P>Średnia temperatura dla wybranego miesiąca wynosi:</P>
            <?php
                // SELECT ROUND(AVG(temperatura), 2) FROM pomiary WHERE id_miesiac = 7;
                if(isset($_GET['id_miesiac'])){
                    $id_miesiac = $_GET['id_miesiac'];
                    $query = mysqli_query($pol, "SELECT ROUND(AVG(temperatura), 2) FROM pomiary WHERE id_miesiac = $id_miesiac");

                    $result = mysqli_fetch_array($query);

                    echo"<h3>" . $result[0] . " stopni</h3>";
                }

                mysqli_close($pol);
            ?>
        </section>
    </main>

    <footer>
        <p>Numer Zdającego: <a href="https://github.com/alanwnuczko" style="color: white;">Alan Wnuczko</a></p>
    </footer>
</body>
</html>