<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Wyszukiwarka miast</title>
</head>
<body>
    <section id="zawartosc">
        <header>
            <img src="baner.jpg" alt="Polska">
        </header>
            <section id="left1">
                <h4>Podaj początek nazwy miasta</h4>
                <form action="index.php" method="post">
                    <input type="text" name="wyszukaj">
                    <input type="submit" value="Szukaj" name="submit">
                </form>
            </section>
        <section id="right">
            <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "wykaz");
                if(isset($_POST['wyszukaj']) && isset($_POST['submit'])){
                    $szukane = $_POST['wyszukaj'];
                    $query = mysqli_query($conn, "SELECT miasta.nazwa, wojewodztwa.nazwa FROM miasta JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id WHERE miasta.nazwa LIKE '$szukane%' ORDER BY miasta.nazwa");

                    echo"<p class='paragraf-skrypt'>".$szukane."</p>";

                    echo"<table><tr><th>Miasto</th><th>Województwo</th></tr>";
                    while($row = mysqli_fetch_array($query)){
                        $miasto = $row[0];
                        $wojewodztwo = $row[1];
                        echo"<tr><td>".$miasto."</td><td>".$wojewodztwo."</td></tr>";
                    }
                    echo"</table>";
                }

                mysqli_close($conn);
            ?>
        </section>
        <section id="left2">
                <p>Egzamin INF.03</p>
                <P>Autor: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></P>
            </section>
    </section>
</body>
</html>