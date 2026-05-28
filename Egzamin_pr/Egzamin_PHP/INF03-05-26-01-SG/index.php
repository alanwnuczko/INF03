<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>ZGŁOSZENIA</title>
</head>
<body>
    <header>
        <h1>Zgłoszenia zdarzeń</h1>
    </header>

    <main>
        <section id="left">
            <h2>Personel</h2>
            <form action="index.php" method="post">
                <input type="radio" name="wybor_personel" id="wybor_policjant" value="policjant" checked><label for="wybor_policjant">Policjant</label>
                <input type="radio" name="wybor_personel" id="wybor_ratownik" value="ratownik"><label for="wybor_ratownik">Ratownik</label>
                <input type="submit" value="Pokaż" id="button">
            </form>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "zgloszenia");
                    $wybor_personel = $_POST['wybor_personel'] ?? 'policjant';
                    $query = mysqli_query($conn, "SELECT id, imie, nazwisko FROM personel WHERE status = '$wybor_personel'");
                    
                    echo"<h3>Wybrano opcję: {$wybor_personel}";

                    while($result = mysqli_fetch_assoc($query)){
                        echo"<tr><td>{$result['id']}</td><td>{$result['imie']}</td><td>{$result['nazwisko']}</td>";
                    }
                ?>
                
            </table>
        </section>

        <section id="right">
            <h2>Nowe zgłoszenie</h2>
            <ol>
                <?php
                    $query = mysqli_query($conn, "SELECT personel.id, personel.nazwisko FROM personel LEFT JOIN rejestr ON personel.id = rejestr.id_personel WHERE id_personel IS NULL;");
                    while($result = mysqli_fetch_assoc($query)){
                        echo"<li>{$result['id']} {$result['nazwisko']}</li>";
                    }
                ?>
            </ol>
            <form action="index.php" method="post">
                <label for="wybierz_osobe">Wybierz id osoby z listy: </label><input type="number" name="wybierz_osobe" id="wybierz_osobe">
                <input type="submit" value="Dodaj zgłoszenie" id="button">
            </form>
            <?php
                
                if(isset($_POST['wybierz_osobe'])){
                    $id_personelu = $_POST['wybierz_osobe'];
                    $query = mysqli_query($conn, "INSERT INTO rejestr (data, id_personel, id_pojazd) VALUES (CURRENT_DATE, $id_personelu, 14)");
                }

                mysqli_close($conn);
            ?>
        </section>
    </main>

    <footer>
        <p>Stronę wykonał: 00000000001</p>
    </footer>
</body>
</html>