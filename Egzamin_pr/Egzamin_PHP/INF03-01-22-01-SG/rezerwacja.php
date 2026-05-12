<?php

$pol = mysqli_connect("localhost", "root", "", "baza");

if(isset($_POST["data"]) && isset($_POST["osoby"]) && isset($_POST["telefon"])){
    $data = $_POST["data"];
    $osoby = $_POST["osoby"];
    $telefon = $_POST["telefon"];

    $query = mysqli_query($pol, "INSERT INTO rezerwacje VALUES (NULL, 1, '$data', $osoby, '$telefon')");

    echo"Dodano rezerwację do bazy";
}

mysqli_close($pol);
?>