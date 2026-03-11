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
        <h1>Firma przewozowa Półdarmo</h1>
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
                    $mysqli = new mysqli('localhost', 'root', '', 'przewozy');

                    if(isset($_GET['usun'])){
                        $stmt = $mysqli -> prepare('DELETE FROM zadania WHERE id_zadania = ?');
                        $stmt -> bind_param('i', $_GET['usun']);
                        $stmt -> execute();
                        $stmt -> close();
                        header('Location: przewozy.php');
                    }

                    $result = $mysqli -> query('SELECT id_zadania, zadanie, data FROM zadania');

                    if($result){
                        while($row = $result -> fetch_assoc()){
                            echo "<tr>";
                            echo "<td>" . $row['zadanie'] . "</td>";
                            echo "<td>" . $row['data'] . "</td>";
                            echo "<td><a href='?usun=" . (int)$row['id_zadania'] . "'>Usuń</a></td>";
                            echo "</tr>";
                        }
                        $result -> free();
                    }
                ?>
            </table>
            <form action="przewozy.php" method="post">
                <label for="zadanie">Zadanie do wykonania:</label>
                <input type="text" name="zadanie" id="zadanie"><br>
                <label for="data">Data realizacji:</label>
                <input type="date" name="data" id="data">
                <input type="submit" value="Dodaj">
            </form>
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $zadanie = trim($_POST['zadanie'] ?? '');
                    $data = $_POST['data'] ?? '';

                    if($zadanie !== '' && $data !== ''){
                        if(!$mysqli -> connect_errno){
                            $stmt = $mysqli -> prepare('INSERT INTO zadania VALUES (NULL, ?, ?, 1)');
                            $stmt -> bind_param('ss', $zadanie, $data);
                            $stmt -> execute();
                            $stmt -> close();
                            $mysqli -> close();
                            header('Location: przewozy.php');
                            exit;

                        }
                    }
                }
                $mysqli -> close();
            ?>
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
    <footer>
        <p>Stronę wykonał: <a href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>