<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Biblioteka miejska</title>
</head>
<body>
    <header>
        <?php
            // Skrypt 1
            for($i = 1; $i <= 20; $i++){
                echo"<img src='obraz.png' alt='książki'>";
            }
        ?>
    </header>
    <section id="sekcja1">
        <h2>Liryka</h2>
        <form action="biblioteka.php" method="post">
            <select name="lista_liryka" id="lista_liryka">
                <?php
                    // Skrypt 2
                    $conn = mysqli_connect("localhost", "root", "", "biblioteka");
                    $query = mysqli_query($conn, "SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka'");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<option value='{$row['id']}'>{$row['tytul']}</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Rezerwuj"><br>
            <?php
                // Skrypt 3
                if(isset($_POST['lista_liryka']) && isset($_POST['submit'])){
                    $id_liryka = $_POST['lista_liryka'];
                    $query = mysqli_query($conn, "SELECT tytul FROM ksiazka WHERE id = $id_liryka");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<p>Książka {$row['tytul']} została zarezerwowana</p>";
                    }

                    $query = mysqli_query($conn, "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id_liryka");
                }

            ?>
        </form>
    </section>
    <section id="sekcja2">
        <h2>Epika</h2>
        <form action="biblioteka.php" method="post">
            <select name="lista_epika" id="lista_epika">
                <?php
                    // Skrypt 2
                    $query = mysqli_query($conn, "SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika'");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<option value='{$row['id']}'>{$row['tytul']}</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Rezerwuj">
            <?php
                // Skrypt 3
                if(isset($_POST['lista_epika']) && isset($_POST['submit'])){
                    $id_epika = $_POST['lista_epika'];
                    $query = mysqli_query($conn, "SELECT tytul FROM ksiazka WHERE id = $id_epika");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<p>Książka {$row['tytul']} została zarezerwowana</p>";
                    }

                    $query = mysqli_query($conn, "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id_epika");
                }
            ?>
        </form>
    </section>
    <section id="sekcja3">
        <h2>Dramat</h2>
        <form action="biblioteka.php" method="post">
            <select name="lista_dramat" id="lista_dramat">
                <?php
                    // Skrypt 2
                    $query = mysqli_query($conn, "SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat'");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<option value='{$row['id']}'>{$row['tytul']}</option>";
                    }
                ?>
            </select>
            <input type="submit" name="submit" value="Rezerwuj">
            <?php
                // Skrypt 3
                if(isset($_POST['lista_dramat']) && isset($_POST['submit'])){
                    $id_dramat = $_POST['lista_dramat'];
                    $query = mysqli_query($conn, "SELECT tytul FROM ksiazka WHERE id = $id_dramat");
                    while($row = mysqli_fetch_assoc($query)){
                        echo"<p>Książka {$row['tytul']} została zarezerwowana</p>";
                    }

                    $query = mysqli_query($conn, "UPDATE ksiazka SET rezerwacja = 1 WHERE id = $id_dramat");
                }
            ?>
        </form>
    </section>
    <section id="sekcja4">
        <h2>Zaległe książki</h2>
        <ul>
            <?php
                // Skrypt 4
                $query = mysqli_query($conn, "SELECT tytul, id_cz, data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY data_odd ASC LIMIT 15");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<li>{$row['tytul']} {$row['id_cz']} {$row['data_odd']}</li>";
                }

                mysqli_close($conn);
            ?>
        </ul>
    </section>
    <footer>
        <p>Autor: <strong><a href="https://github.com/alanwnuczko">Alan Wnuczko</a></strong></p>
    </footer>
</body>
</html>