<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Blog kulinarny</title>
</head>
<body>
    <aside>        
        <a href="przepisy.php?id=1">Sernik</a>
        <a href="przepisy.php?id=2">Sałatka</S></a>
        <a href="przepisy.php?id=3">Pankejki</a>
        <a href="przepisy.php?id=4">Nugetsy</a>
        <a href="przepisy.php?id=5">Łosoś</a>
        <a href="przepisy.php?id=6">Kociołek</a>
        <a href="przepisy.php?id=7">Jagnięcina</a>
        <a href="przepisy.php?id=8">Hamburgery</a>
        <a href="przepisy.php?id=9">Eklerki</a>
        <a href="przepisy.php?id=10">Churros</a>
        <p>Autor: <a href="https://github.com/alanwnuczko">Alan Wnuczko</a></p>
    </aside>
    <main>
        <h1>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "przepisy");
                if(isset($_GET['id'])){
                    $id_potrawy = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT potrawy.nazwa, rodzaje.rodzaj FROM potrawy JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE idPotrawy = $id_potrawy");
                    while($row = mysqli_fetch_array($query)){
                        echo $row[1];
                    }
                }
            ?>
        </h1>
        <?php 
            $query = mysqli_query($conn, "SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = $id_potrawy");
            while($row = mysqli_fetch_assoc($query)){
                echo"<h2>{$row['nazwa']}</h2>";
                if($row['trudnosc'] == 1){
                    echo"<p>Trudność: łatwe, kalorie: {$row['kalorie']}</p>";
                }
                elseif($row['trudnosc'] == 2){
                    echo"<p>Trudność: średnie, kalorie: {$row['kalorie']}</p>";
                }
                elseif($row['trudnosc'] == 3){
                    echo"<p>Trudność: trudne, kalorie: {$row['kalorie']}</p>";
                }
            }
        ?>
        <img src="separator.png" alt="przepis">
        <p>Alergeny: 
            <?php
                $query = mysqli_query($conn, "SELECT potrawy.nazwa, alergeny.alergen FROM potrawy JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = $id_potrawy");
                while($row = mysqli_fetch_array($query)){
                    echo" {$row[1]}";
                }
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
                $query = mysqli_query($conn, "SELECT przepis, plik FROM potrawy WHERE idPotrawy = $id_potrawy");
                $row = mysqli_fetch_assoc($query);
                echo $row['przepis'];
                
            ?>
        </p>
    </main>
    <section style="background: url(<?php echo $row['plik']; ?>);">
        <h1>Blog kulinarny</h1>
    </section>
</body>
</html>