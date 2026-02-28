**Połączenie z bazą danych:**
```php
$conn = mysqli_connect("localhost", "root", "", "baza_danych"); //("Serwer","login", "hasło", "nazwa_bazy")

//Sprawdzenie Połączenia
if(!$conn)
{
    die("Błąd Połączenia");
}
```

---

**Zamknięcie połączenia z bazą danych**
```php
mysqli_close($conn);
```

---

**Wyświetlanie danych - SELECT**
```php
$conn = mysqli_connect("localhost", "root", "", "baza_danych");
$sql = "SELECT id, imie, nazwisko FROM uzytkownicy";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
    echo"<p>{$row['id']} - {$row['imie']} - {$row['nazwisko']}</p>";
}
mysqli_close($conn);
```

---

**Dodanie rekordu - INSERT**
```php
$conn = mysqli_connect("localhost","root","","baza_danych");
mysqli_query($conn, "INSERT INTO usluga (nazwa, cena) VALUES ('Badanie', 30)");
mysqli_close($conn);
```

---

**Zmiana rekordu - UPDATE**
```php
$conn = mysqli_connect("localhost","root","","baza_danych");
mysqli_query($conn, "UPDATE usluga SET cena=20 WHERE nazwa='badanie'");
mysqli_close($conn);
```

---

**Usuwanie rekordu - DELETE**
```php
$conn = mysqli_connect("localhost","root","","baza_danych");
mysqli_query($conn, "DELETE FROM usluga WHERE cena > 10");
mysqli_close($conn);
```
