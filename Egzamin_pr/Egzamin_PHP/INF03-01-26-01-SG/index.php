<?php
    $pol = mysqli_connect("localhost", "root", "", "samochody");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Konfigurator samochodów</title>
</head>
<body>
    <header>
        <h1>Serwis konfiguracji samochodow</h1>
    </header>

    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>

    <main>
        <section id="left">
            <table>
                <?php
                    $query = mysqli_query($pol, "SELECT marka, model, cena, nazwa, doplata FROM pojazdy JOIN kolory ON pojazdy.kolor = kolory.id WHERE model = 'alfa'");
                    
                    while($row = $query -> fetch_assoc()){
                        echo"<tr>";
                        echo"<td>" . $row['marka'] . "</td>";
                        echo"<td>" . $row['model'] . "</td>";
                        echo"<td>" . $row['nazwa'] . "</td>";
                        $cena_calk = $row['cena'] + $row['doplata'];
                        echo"<td>{$cena_calk}</td>";
                        echo"</tr>";
                    }
                ?>
            </table>
        </section>
        
        <section id="center">
            <table>
                <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th>Cena</th>
                </tr>
                <?php
                    $query = mysqli_query($pol, "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2");
                    $samochod1 = mysqli_fetch_array($query);
                    $samochod2 = mysqli_fetch_array($query);
                ?>
                <tr>
                    <td colspan="3">
                        <img src="a1.jpg" alt="Konfiguracja 1">
                    </td>
                </tr>
                
                <tr>
                    <td>Marka</td>
                    <td><?php echo $samochod1['marka']; ?></td>
                    <td rowspan="2"><?php echo $samochod1['cena']; ?></td>
                    
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?php echo $samochod1['model']; ?></td>
                </tr>

                <tr>
                    <td colspan="3">
                        <img src="a2.jpg" alt="Konfiguracja 2">
                    </td>
                </tr>

                <tr>
                    <td>Marka</td>
                    <td><?php echo $samochod2['marka']; ?></td>
                    <td rowspan="2"><?php echo $samochod2['cena']; ?></td>
                    
                </tr>
                <tr>
                    <td>Model</td>
                    <td><?php echo $samochod2['model']; ?></td>
                </tr>


            </table>
        </section>

        <section id="right">
            <h3>111 222 444</h3>
            <img src="a3.png" alt="Samochód">
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>

    <?php
        mysqli_close($pol);
    ?>
    
</body>
</html>