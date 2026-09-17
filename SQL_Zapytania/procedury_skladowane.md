# Procedury składowane w MySQL / MariaDB

>Procedura składowana to zapisany w bazie danych fragment kodu SQL, który można później wywołać za pomocą `CALL`. Dzięki temu nie trzeba za każdym razem pisać tego samego zapytania od początku.

## Przygotowanie bazy i tabeli

```sql
CREATE DATABASE baza;
USE baza;

CREATE TABLE miejscowosci (
    kod_poczt   VARCHAR(6),
    miejscowosc VARCHAR(40) NOT NULL,
    PRIMARY KEY (kod_poczt)
);

INSERT INTO miejscowosci(kod_poczt, miejscowosc) VALUES('80001', 'Gdańsk');
```

## Procedura bez parametrów

```sql
DELIMITER //

CREATE PROCEDURE lista_miejscowosci()
BEGIN
    SELECT * FROM miejscowosci;
END //

DELIMITER ;
```

Wywołanie:

```sql
CALL lista_miejscowosci();
```

## Procedura z parametrem wejściowym (`IN`)

Parametry wejściowe deklaruje się słowem `IN` przed nazwą i typem.

```sql
DELIMITER //

CREATE PROCEDURE miejscowosc(IN p_kod_poczt VARCHAR(6))
BEGIN
    SELECT miejscowosc FROM miejscowosci WHERE kod_poczt = p_kod_poczt;
END //

DELIMITER ;
```

Wywołanie:

```sql
CALL miejscowosc('80001');
```


## Podgląd definicji procedury

```sql
SHOW CREATE PROCEDURE lista_miejscowosci;
```

## Usuwanie procedury

```sql
DROP PROCEDURE IF EXISTS lista_miejscowosci;
```

## Lista procedur w bazie

```sql
SHOW PROCEDURE STATUS WHERE Db = 'baza';
```

## Zadania
**Tabele:**
```sql
CREATE TABLE pracownicy (
  PESEL INT(11) PRIMARY KEY,
  imie VARCHAR(20),
  nazwisko VARCHAR(40),
  data_ur DATE,
  kod_poczt VARCHAR(6),
  plec VARCHAR(1),
  zdjecie VARCHAR(60)
);


CREATE TABLE zatrudnienie (
  PESEL INT(11) PRIMARY KEY,
  data_rozp DATE,
  data_zak DATE,
  zarobek FLOAT,
  rodzinne FLOAT,
  opinia VARCHAR(100),
  id_dzial_stanow INT
);


CREATE TABLE dzialy_stanow (
  id_dzial_stanow INT PRIMARY KEY,
  nazwa_dzialu VARCHAR(50),
  nazwa_stanow VARCHAR(50)
);
```
**Relacje:**
```sql
ALTER TABLE zatrudnienie
ADD CONSTRAINT fk_zatrudnienie_pracownicy
FOREIGN KEY (PESEL) REFERENCES pracownicy(PESEL);


ALTER TABLE zatrudnienie
ADD CONSTRAINT fk_zatrudnienie_dzialy
FOREIGN KEY (id_dzial_stanow) REFERENCES dzialy_stanow(id_dzial_stanow);


ALTER TABLE pracownicy
ADD CONSTRAINT fk_pracownicy_miejscowosci
FOREIGN KEY (kod_poczt) REFERENCES miejscowosci(kod_poczt);
```


**Przykładowe dane:**
```sql
INSERT INTO dzialy_stanow (id_dzial_stanow, nazwa_dzialu, nazwa_stanow) VALUES
(1, 'IT', 'Programista'),
(2, 'HR', 'Specjalista ds. kadr'),
(3, 'Ksiegowosc', 'Ksiegowy');


INSERT INTO pracownicy (PESEL, imie, nazwisko, data_ur, kod_poczt, plec, zdjecie) VALUES
(85011212345, 'Jan', 'Kowalski', '1985-01-12', '00-950', 'M', 'jan.jpg'),
(92052454321, 'Anna', 'Nowak', '1992-05-24', '31-150', 'K', 'anna.jpg'),
(78120398765, 'Piotr', 'Wiśniewski', '1978-12-03', '80-800', 'M', 'piotr.jpg');


INSERT INTO zatrudnienie (PESEL, data_rozp, data_zak, zarobek, rodzinne, opinia, id_dzial_stanow) VALUES
(85011212345, '2015-03-01', NULL, 6500.00, 500.00, 'Bardzo dobry pracownik', 1),
(92052454321, '2018-07-15', NULL, 4800.00, 0.00, 'Sumienna i dokładna', 2),
(78120398765, '2010-10-01', '2023-12-31', 5200.00, 300.00, 'Pracownik zakończył współpracę', 3);
```

<br>

**1.**
```sql
DELIMITER //
CREATE PROCEDURE imie_nazwisko()
BEGIN
SELECT nazwisko, imie FROM pracownicy
INNER JOIN zatrudnienie ON pracownicy.PESEL = zatrudnienie.PESEL
WHERE data_zak IS NULL
ORDER BY pracownicy.nazwisko ASC, parcownicy.imie ASC;
END //
```
**2.**
```sql
DELIMITER //
CREATE PROCEDURE maximum_zarobek(OUT ile FLOAT)
BEGIN
SELECT MAX(zarobek) INTO ile FROM zatrudnienie
WHERE zatrudnienie.data_zak IS NULL;
END //
```


**3.**
```sql
DELIMITER //
CREATE PROCEDURE dzial(IN p_imie VARCHAR(30), p_nazwisko VARCHAR(40))
BEGIN
SELECT dzialy_stanow.nazwa_dzialu FROM dzialy_stanow
JOIN zatrudnienie ON dzialy_stanow.id_dzial_stanow = zatrudnienie.id_dzial_stanow
JOIN pracownicy ON zatrudnienie.PESEL = pracownicy.PESEL
WHERE imie = p_imie AND nazwisko = p_nazwisko;
END //
```


**4.**
```sql
DELIMITER //
CREATE PROCEDURE avg_zarobki(In dzial VARCHAR(40) OUT ile (FLOAT))
BEGIN
SELECT dzialy_stanow.nazwa_dzialu, AVG(zatrudnienie.zarobek) INTO ile FROM zatrudnienie
JOIN dzialy_stanow ON dzialy_stanow.id_dzial_stanow = zatrudnienie.id_dzial_stanow
WHERE nazwa_dzialu = dzial
GROUP BY dzialy_stanow.nazwa_dzialu;
END //
```
