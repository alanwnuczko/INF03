<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcje arytmetyczne</title>
</head>
<body>
    <form action="funkcje_arytmetyczne.php" method="post">
        <label>x:</label>
        <input type="text" name="x">
        <label>y:</label>
        <input type="text" name="y">
        <label>z:</label>
        <input type="text" name="z">
        <input type="submit" value="wynik">
    </form>
</body>
</html>
<?php
/*
+-----------+------------------------------------------+--------------------+---------+
| Funkcja   | Opis                                     | Przykład           | Wynik   |
+-----------+------------------------------------------+--------------------+---------+
| abs()     | Wartość bezwzględna                      | abs(-7)            | 7       |
| round()   | Zaokrąglenie do najbliższej liczby całk. | round(3.6)         | 4       |
| ceil()    | Zaokrąglenie w górę                      | ceil(3.2)          | 4       |
| floor()   | Zaokrąglenie w dół                       | floor(3.8)         | 3       |
| sqrt()    | Pierwiastek                              | sqrt(9)            | 3       |
| pow()     | Potęgowanie (x do potęgi y)              | pow(2, 3)          | 8       |
| max()     | Zwraca największą wartość                | max(2, 5, 9, 3)    | 9       |
| min()     | Zwraca najmniejszą wartość               | min(2, 5, 9, 3)    | 2       |
| pi()      | Zwraca wartość liczby π (pi)             | pi()               | 3.1416  |
| rand()    | Losowa liczba całkowita                  | rand()             | np. 123 |
| rand(a,b) | Losowa liczba z zakresu a–b              | rand(1,10)         | np. 7   |
+-----------+------------------------------------------+--------------------+---------+

*/
    $x = $_POST["x"];
    $y = $_POST["y"];
    $z = $_POST["z"];
    $wynik = null;

    // Wartość Bezwzględna:
    // $wynik = abs($x);


    // Zaokrąglenie do najbliższej liczby całkowitej:
    // $wynik = round($x);
    

    // Zaokraglenie w górę:
    // $wynik = ceil($x);
    

    // Zaokrąglenie w dół:
    // $wynik = floor($x);
    

    // Pierwiastek:
    // $wynik = sqrt($x);


    // Potęgowanie (x do potęgi y):
    // $wynik = pow($x, $y);


    // Zwraca największą wartość z podanych:
    // $wynik = max($x, $y, $z);


    // Zwraca najmniejszą wartość z podanych:
    // $wynik = min($x, $y, $z);


    // Zwaraca wartośc liczby π (pi)
    // $wynik = pi();


    // Losowa liczba całkowita
    // $wynik = rand();


    // Losowa liczba z zakresu a–b
    // $wynik = rand(1, 6);
    
    echo $wynik;
?>