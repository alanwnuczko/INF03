<?php
    $cena1 = 35.99;
    $cena2 = 8.99;
    $ilosc1 = 4;
    $ilosc2 = 2;
    $produkt1 = "pizza";
    $produkt2 = "frytki";

    $suma_zamowienia = ($cena1 * $ilosc1) + ($cena2 * $ilosc2);

    echo"Zamówienie: <br>
    {$ilosc1} x {$produkt1} <br>
    {$ilosc2} x {$produkt2} <br><br> ";


    echo"Cena Zamówienia: {$suma_zamowienia}zł";

    //dodawanie:
    //$z = $x + $y;

    //odejmowanie:
    //$z = $x - $y;

    //mnożenie:
    //$z = $x * $y;

    //Potęgowanie:
    //$z = $x ** $y;

    //dzielenie:
    //$z = $x / $y;

    //Reszta z dzielenia:
    //$z = $x % $y;
?>