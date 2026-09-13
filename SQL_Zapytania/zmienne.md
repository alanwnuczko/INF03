# Zmienne MySQL

## Przypisywanie zmiennych
```sql
SET @zmienna = 10;
SET @dzisiaj := CURDATE();
```

## Numerowanie rekordow
```sql
SELECT @n:=@n+1 AS Lp, kod_poczt, miejscowosc FROM miejscowosci;
```

## Przypisanie zliczenia do zmiennej
```sql
SELECT COUNT(kod_poczt) INTO @liczba_miejsc FROM miejscowosci;
```

### Przykład:
```sql
mysql> DELIMITER //
mysql> CREATE PROCEDURE miejscowosci_litera(IN litera VARCHAR(1), OUT liczba INT)
-> BEGIN
-> SELECT miejscowosc FROM miejscowosci WHERE miejscowosc LIKE CONCAT(litera, '%');
-> SELECT COUNT(miejscowosc) INTO liczba FROM miejscowosci WHERE miejscowosc LIKE CONCAT(litera, '%');
-> END//
mysql> DELIMITER ;
```
**Wywołanie:**
```sql
CALL miejscowosci_litera('P', @total);
```

## Zadanie:

### Napisz procedurę składowaną która po podaniu przez użytkownika ceny samochodu, wyświetli dane o autach, które kosztują mniej niż podana kwota:

```sql
mysql> DELIMITER //
mysql> CREATE PROCEDURE samochod_mniej(IN kwota FLOAT)
-> BEGIN
-> SELECT * FROM auta
-> WHERE cena < kwota;
-> END //
mysql> DELIMITER ;
```
**Wywołanie:**
```sql
CALL samochod_mniej(26000);
```

**Baza Danych:**
```
auta{id(PK) VARCHAR(50), model VARCHAR(20), drzwi INT, rocznik INT, silnik float, kolor VARCHAR(20), cena FLOAT, przebieg FLOAT}
```

```sql
CREATE TABLE auta (
    id VARCHAR(50) PRIMARY KEY,
    model VARCHAR(20),
    drzwi INT,
    rocznik INT,
    silnik FLOAT,
    kolor VARCHAR(20),
    cena FLOAT,
    przebieg FLOAT
);

INSERT INTO auta (id, model, drzwi, rocznik, silnik, kolor, cena, przebieg) VALUES
('A001', 'Golf', 5, 2018, 1.4, 'czarny', 45000, 85000),
('A002', 'Civic', 5, 2020, 1.5, 'biały', 62000, 45000),
('A003', 'Astra', 5, 2017, 1.6, 'srebrny', 38000, 110000),
('A004', 'Focus', 5, 2019, 2.0, 'niebieski', 52000, 70000),
('A005', 'Mustang', 2, 2021, 5.0, 'czerwony', 180000, 25000);

```
