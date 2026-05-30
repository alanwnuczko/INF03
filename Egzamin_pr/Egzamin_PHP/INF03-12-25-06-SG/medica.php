<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <link rel="shortcut icon" href="obraz2.png" type="image/x-icon">
    <title>Przychodnia Medica</title>
</head>
<body>
    <header>
        <h1>Abonamenty w przychodni Medica</h1>
    </header>
    <article>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "medica");

            $query = mysqli_query($conn, "SELECT nazwa, cena, opis FROM abonamenty");

            while($row = mysqli_fetch_assoc($query)){
                echo"<h3>" . $row['nazwa'] . " - " . $row['cena'] . " zł</h3>";
                echo"<p>" . $row['opis'] . "</p>";
            }
        ?>
        <a href="opis.html">Dowiedz się więcej</a>
    </article>
    <main>
        <section id=section1>
            <h2>Standardowy</h2>
            <ul>
                <?php 
                    $query = mysqli_query($conn, "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = abonamenty_id JOIN cechy ON cechy.id = cechy_id WHERE abonamenty.id = 1");
                    
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<li>" . $row['cecha'] . "</li>";
                    }
                ?>
            </ul>
        </section>
        <section id=section2>
            <h2>Premium</h2>
            <ul>
                <?php 
                    $query = mysqli_query($conn, "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = abonamenty_id JOIN cechy ON cechy.id = cechy_id WHERE abonamenty.id = 2");

                    while($row = mysqli_fetch_assoc($query)){
                        echo"<li>" . $row['cecha'] . "</li>";
                    }
                ?>
            </ul>
        </section>
        <section id=section3>
            <h2>Dziecko</h2>
            <ul>
                <?php 
                    $query = mysqli_query($conn, "SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = abonamenty_id JOIN cechy ON cechy.id = cechy_id WHERE abonamenty.id = 3");

                    while($row = mysqli_fetch_assoc($query)){
                        echo"<li>" . $row['cecha'] . "</li>";
                    }

                    mysqli_close($conn);
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p><img src="obraz2.png" alt="przychodnia"> Stronę przygotował: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>