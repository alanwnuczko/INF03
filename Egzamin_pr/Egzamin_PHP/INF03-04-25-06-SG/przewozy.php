<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Firma przewozowa</title>
</head>
<body>
    <header>
        <h1>Firma przewozowa Póldarmo</h1>
    </header>
    <nav>
        <a href="kwerendy.md">kwerenda1</a> <!-- odnośnik powinien być do zrzutów ekranu wykonanych kwerend-->
        <a href="kwerendy.md">kwerenda2</a> <!-- odnośnik powinien być do zrzutów ekranu wykonanych kwerend-->
        <a href="kwerendy.md">kwerenda3</a> <!-- odnośnik powinien być do zrzutów ekranu wykonanych kwerend-->
        <a href="kwerendy.md">kwerenda4</a> <!-- odnośnik powinien być do zrzutów ekranu wykonanych kwerend-->
    </nav>

    <main>
        <section id="left">
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "przewozy");
                $query = mysqli_query($conn, "SELECT id_zadania, zadanie, data FROM zadania");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<tr><td>{$row['zadanie']}</td><td>{$row['data']}</td><td><a href='przewozy.php?id_zadania={$row['id_zadania']}'>Usuń</a></td>";
                }
                ?>

                <?php 
                    // Zapytanie 3: DELETE FROM zadania WHERE id_zadania = 2;
                    if(isset($_GET['id_zadania'])){
                        $id_zadania = $_GET['id_zadania'];
                        $query = mysqli_query($conn, "DELETE FROM zadania WHERE id_zadania = $id_zadania");
                        header("location: przewozy.php");
                    }
                ?>
            </table>

            <form action="przewozy.php" method="post">
                <label for="do-wykonania">Zadanie do wykonania: </label><input type="text" name="do-wykonania"><br>
                <label for="data-realizacji">Data realizacji: </label><input type="date" name="data-realizacji" id="data-realizacji"><input type="submit" value="Dodaj" name="submit">
                <?php
                    // Zapytanie 2: INSERT INTO zadania VALUES (NULL, 'Spotkania firmowe', '2024-05-10', 1);
                    if(isset($_POST['submit'])){
                        $zadanie = $_POST['do-wykonania'];
                        $data_realizacji = $_POST['data-realizacji'];
                        $query = mysqli_query($conn, "INSERT INTO zadania (zadanie, data, osoba_id) VALUES ('$zadanie', '$data_realizacji', 1)");
                        header("Location: przewozy.php");
                    }
                    mysqli_close($conn);
                ?>
            </form>
        </section>

        <section id="right">
            <img src="auto.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ul>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towarów</li>
            </ul>
        </section>
    </main>

    <footer><p>Stronę wykonał <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p></footer>
</body>
</html>