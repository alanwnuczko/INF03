<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Wykaz chorób</title>
</head>
<body>
    <header>
        <h1>Informacja o chorobach w Polsce</h1>
    </header>

    <nav>
        <a href="https://szpitale.pl/" target="_blank">Szpitale</a>
        <a href="https://www.przychodnie.pl/" target="_blank">Przychodnie</a>
        <a href="https://www.nfz.gov.pl/" target="_blank">NFZ</a>
    </nav>

    <main>
        <section id="left">
            <h2>Choroby zakaźne</h2>
            <ol>
                <?php 
                    $conn = mysqli_connect("localhost", "root", "", "choroby");
                    $query = mysqli_query($conn, 'SELECT nazwa FROM choroby WHERE zakazna = "T" ORDER BY nazwa ASC');
                    while($result = mysqli_fetch_assoc($query)){
                        echo"<li>";
                        echo"{$result['nazwa']}";
                        echo"</li>";
                    }
                ?>
            </ol>
        </section>

        <section id="right">
            <h2>Objawy  chorób</h2>
            <form action="zdrowie.php" method="post">
                <select name="choroba_wybor" id="choroba_wybor">
                    <?php
                        $query = mysqli_query($conn, "SELECT id, nazwa FROM choroby");
                        while($result = mysqli_fetch_assoc($query)){
                            echo"<option value='{$result['id']}' id='{$result['id']}'>{$result['nazwa']}</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Sprawdź">
            </form>
            <div id="wynik">
                <?php
                if(isset($_POST['choroba_wybor'])){
                    $id_choroby = $_POST["choroba_wybor"];
                    $query = mysqli_query($conn, "SELECT objawy.nazwa FROM objawy JOIN choroby_objawy ON objawy.id = choroby_objawy.id_objawy WHERE id_choroby = $id_choroby");
                    while($result = mysqli_fetch_assoc($query)){
                        echo"<span>";
                        echo $result['nazwa'];
                        echo" </span>";
                    }
                }

                mysqli_close($conn);
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>Stronę opracował: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </footer>
    <img src="zdrowia.png" alt="Życzymy zdrowia!">
</body>
</html>