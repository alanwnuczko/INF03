<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>BIBLIOTEKA SZKOLNA</title>
</head>
<body>
    <header>
        <h2>STRONA BIBLIOTEKI SZKOLNEJ WIEDZAMIN</h2>
    </header>

    <section>
        <h3>Nasze dzisiejsze propozycje</h3>
        <table>
            <tr>
                <th>Autor</th>
                <th>Tytuł</th>
                <th>katalog</th>
            </tr>
            <?php 
                $conn = mysqli_connect("localhost", "root", "", "biblioteka");
                $query = mysqli_query($conn, "SELECT autor, tytul, kod FROM ksiazki ORDER BY RAND() LIMIT 5");
                while($row = mysqli_fetch_assoc($query)){
                    echo"<tr><td>{$row['autor']}</td><td>{$row['tytul']}</td><td>{$row['kod']}</td></tr>";
                }
                mysqli_close($conn);
            ?>
        </table>
    </section>

    <main>
        <article id="article1"><img src="ksiazka1.jpeg" alt="okładka książki"><p>Według rónych podań najpaskudniejsza ropucha nosi w głowie piękny, cenny klejnot.</p></article>
        <article id="article2"><img src="ksiazka2.jpeg" alt="okładka książki"><p>Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie słuchają mamy...</p></article>
        <article id="article3"><img src="ksiazka3.jpeg" alt="okładka książki"><p>Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę. Rodzice i ona...</p></article>
    </main>

    <footer>
        <p>Stronę wykonał: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
</body>
</html>