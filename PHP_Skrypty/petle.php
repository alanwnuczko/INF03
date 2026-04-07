<?php
// IF
echo "<h3>Pętla if:</h3>";

$liczba = 8;
if ($liczba > 10){
    echo "Liczba jest większa niż 10.<br>";
} elseif ($liczba == 10){
    echo "Liczba jest równa 10.<br>";
} else{
    echo "Liczba jest mniejsza niż 10.<br>";
}

// WHILE
echo "<h3>Pętla while:</h3>";

$i = 1;
while ($i <= 5){
    echo "Krok pętli: $i<br>";
    $i++;
}

// FOR
echo "<h3>Pętla for:</h3>";

for ($j = 1; $j <= 5; $j++){
    echo "Krok pętli: $j<br>";
}

// IF w FOR
echo "<h3>Pętla if w for:</h3>";

for ($k = 1; $k <= 10; $k++){
    if ($k % 2 == 0){
        echo "$k jest parzysta<br>";
    } else{
        echo "$k jest nieparzysta<br>";
    }
}
?>