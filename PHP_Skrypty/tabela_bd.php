<?php
$conn = mysqli_connect("localhost", "root", "", "moja_baza");

$sql = "SELECT id, imie, email, data_dodania FROM uzytkownicy";
$result = $conn -> query($sql);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Użytkownicy</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Lista użytkowników</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Imię</th>
            <th>Email</th>
            <th>Data dodania</th>
        </tr>
        <?php
        if ($result->num_rows > 0) { // Sprawdza ilość wierszy
            while($row = $result -> fetch_assoc()){ // Pętla przechodzi przez wszystkie rekordy
                echo "<tr>"; // Generuje wiersz dla każdego rekordu
                echo"<td>{$row['id']}</td>"; //<td> - wartości pobrane z bazy
                echo"<td>{$row['imie']}</td>";
                echo"<td>{$row['email']}</td>";
                echo"<td>{$row['data_dodania']}</td>";
                echo"</tr>";
            }
        }
        $conn->close();
        ?>
    </table>
</body>
</html>