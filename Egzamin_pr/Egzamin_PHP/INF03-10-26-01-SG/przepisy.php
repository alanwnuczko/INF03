<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Blog kulinarny</title>
</head>
<body>
<?php
    $polaczenie = mysqli_connect("localhost", "root", "", "przepisy");

    $id = isset($_GET['id']) ? $_GET['id'] : 7;

    $wynik4 = mysqli_query($polaczenie, "SELECT przepis, plik FROM potrawy WHERE idPotrawy = " . $id);
    $wiersz4 = mysqli_fetch_array($wynik4);
    $przepis = $wiersz4['przepis'];
    $plik = $wiersz4['plik'];
?>

<aside>
    <a href="przepisy.php?id=1">Sernik</a><br>
    <a href="przepisy.php?id=2">Sałatka</a><br>
    <a href="przepisy.php?id=3">Pankejki</a><br>
    <a href="przepisy.php?id=4">Nugetsy</a><br>
    <a href="przepisy.php?id=5">Łosoś</a><br>
    <a href="przepisy.php?id=6">Kociołek</a><br>
    <a href="przepisy.php?id=7">Jagnięcina</a><br>
    <a href="przepisy.php?id=8">Hamburgery</a><br>
    <a href="przepisy.php?id=9">Eklerki</a><br>
    <a href="przepisy.php?id=10">Churros</a><br>
    <p>Autor: <a href="https://www.github.com/alanwnuczko">Alan Wnuczko</a></p>
</aside>

<main>
    <h1>
    <?php
        $wynik1 = mysqli_query($polaczenie, "SELECT potrawy.nazwa, rodzaje.rodzaj FROM potrawy JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE potrawy.idPotrawy = " . $id);
        $wiersz1 = mysqli_fetch_array($wynik1);
        echo $wiersz1['rodzaj'];
    ?>
    </h1>

    <?php
        $wynik2 = mysqli_query($polaczenie, "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = " . $id);
        $wiersz2 = mysqli_fetch_array($wynik2);

        $nazwa = $wiersz2['nazwa'];
        $kalorie = $wiersz2['kalorie'];

        if ($wiersz2['trudnosc'] == 1){
            $trudnosc = "łatwe";
        }
        elseif ($wiersz2['trudnosc'] == 2){
            $trudnosc = "średnie";
        }
        else{
            $trudnosc = "trudne";
        }

        echo "<h2>$nazwa</h2>";
        echo "<p>Trudność: $trudnosc, Kalorie: $kalorie</p>";
    ?>

    <img src="separator.png" alt="przepis">

    <p>Alergeny:
    <?php
        $wynik3 = mysqli_query($polaczenie, "SELECT alergeny.alergen FROM potrawy JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = " . $id);

        $lista = [];
        while ($row = mysqli_fetch_array($wynik3)) {
            $lista[] = $row['alergen'];
        }

        echo implode(" ", $lista);
    ?>
    </p>

    <h2>Składniki</h2>

    <ul>
        <li>Lorem 1 kg</li>
        <li>Ipsum 2 szt.</li>
        <li>Dolor 200 g</li>
        <li>Sit amet (szczypta)</li>
    </ul>

    <p>
        <?php
            echo $przepis; 
        ?>
    </p>
</main>

<section style="background-image: url('<?php echo $plik; ?>'); background-size: cover;">
    <h1>Blog Kulinarny</h1>
</section>

<?php
    mysqli_close($polaczenie);
?>
</body>
</html>