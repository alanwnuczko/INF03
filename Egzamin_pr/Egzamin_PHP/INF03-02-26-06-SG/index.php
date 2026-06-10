<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Wodospady</title>
</head>
<body>
    <header>
        <h2>Łowcy wodospadów</h2>
    </header>
    <main>
        <aside>
            <?php
                // Skrypt 1
                $conn = mysqli_connect("localhost", "root", "", "wodospady");
                $query = mysqli_query($conn, "SELECT idKontynent, nazwa FROM kontynenty");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<a href='index.php?id={$row['idKontynent']}'>{$row['nazwa']}</a>";
                }
            ?>
        </aside>
        <section>
            <table>
                <tr>
                    <th>Identyfikator</th>
                    <th>Państwo</th>
                    <th>Nazwa wodospadu</th>
                    <th>Wysokość</th>
                </tr>
                <?php
                    // Skrypt 2
                    if(isset($_GET['id'])){
                        $id_kontynent = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT idWodospadu, panstwo, nazwa, wysokosc FROM wodospady WHERE idKontynent = $id_kontynent");
                        while($row = mysqli_fetch_assoc($query)){
                            echo"<tr><td>{$row['idWodospadu']}</td><td>{$row['panstwo']}</td><td>{$row['nazwa']}</td><td>{$row['wysokosc']}</td></tr>";
                        }
                    }
                ?>
            </table>
            <h4>Wpisz osiągnięcie do bazy</h4>
            <form action="index.php" method="post">
                <label for="input_id">identyfikator wodospadu</label>
                <input type="number" name="input_id" id="input_id">
                <label for="">turysta</label>
                <select name="input_turysta" id="input_turysta">
                    <?php
                        // Skrypt 3
                        $query = mysqli_query($conn, "SELECT idTurysta, nick FROM turysci ORDER BY nick");
                        while($row = mysqli_fetch_assoc($query)){
                            echo"<option name='opcjaTurysta' value='{$row['idTurysta']}'>{$row['nick']}</option>";
                        }
                    ?>
                </select>
                <button type="submit" name="submit">Wpisz</button>
                <?php
                    // Skrypt 4
                    if(isset($_POST['input_id']) && isset($_POST['input_turysta']) && isset($_POST['submit'])){
                        $id_wodospadu = $_POST['input_id'];
                        $id_turysty = $_POST['input_turysta'];

                        $query = mysqli_query($conn, "INSERT INTO wpisy (idWodospadu, idTurysta) VALUES ($id_wodospadu, $id_turysty)");
                    }

                    mysqli_close($conn);
                ?>
            </form>
        </section>
    </main>
    <article>
        <h3>Wodospady w Polsce</h3>
        <img src="kamienczyk.jpg" alt="wodospad">
        <img src="siklawica.jpg" alt="wodospad">
        <img src="siklawa.jpg" alt="wodospad">
        <img src="wilczki.jpg" alt="wodospad">
    </article>
    <footer>
        <p>Autor: github.com/alanwnuczko</p>
    </footer>
</body>
</html>