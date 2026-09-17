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

INSERT INTO miejscowosci (kod_poczt, miejscowosc) VALUES
('00-950', 'Warszawa'),
('31-150', 'Kraków'),
('80-800', 'Gdańsk');
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
  PESEL BIGINT PRIMARY KEY,
  imie VARCHAR(20),
  nazwisko VARCHAR(40),
  data_ur DATE,
  kod_poczt VARCHAR(6),
  plec VARCHAR(1),
  zdjecie VARCHAR(60)
);


CREATE TABLE zatrudnienie (
  PESEL BIGINT PRIMARY KEY,
  data_rozp DATE,
  data_zak DATE,
  zarobek DECIMAL(10, 2),
  rodzinne DECIMAL(10, 2),
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

**1. Wyświetl posortowaną słownikowo listę imion i nazwisk osób zatrudnionych w firmie.**

```sql
DELIMITER //
CREATE PROCEDURE imie_nazwisko()
BEGIN
    SELECT pracownicy.imie, pracownicy.nazwisko
    FROM pracownicy
    INNER JOIN zatrudnienie ON pracownicy.PESEL = zatrudnienie.PESEL
    WHERE zatrudnienie.data_zak IS NULL
    ORDER BY pracownicy.nazwisko ASC, pracownicy.imie ASC;
END //
DELIMITER ;
```

**2. Przekaż do zmiennej maksymalne zarobki w firmie.**

```sql
DELIMITER //
CREATE PROCEDURE maximum_zarobek(OUT ile DECIMAL(10, 2))
BEGIN
    SELECT MAX(zarobek)
    INTO ile
    FROM zatrudnienie
    WHERE zatrudnienie.data_zak IS NULL;
END //
DELIMITER ;

SET @maksymalne_zarobki = 0;
CALL maximum_zarobek(@maksymalne_zarobki);
SELECT @maksymalne_zarobki;
```


**3. Przekaż nazwę działu, w którym pracuje podana przez użytkownika osoba (imię i nazwisko).**

```sql
DELIMITER //
CREATE PROCEDURE dzial(
    IN p_imie VARCHAR(20),
    IN p_nazwisko VARCHAR(40)
)
BEGIN
    SELECT dzialy_stanow.nazwa_dzialu
    FROM dzialy_stanow
    INNER JOIN zatrudnienie
        ON dzialy_stanow.id_dzial_stanow = zatrudnienie.id_dzial_stanow
    INNER JOIN pracownicy
        ON zatrudnienie.PESEL = pracownicy.PESEL
    WHERE pracownicy.imie = p_imie
      AND pracownicy.nazwisko = p_nazwisko
      AND zatrudnienie.data_zak IS NULL;
END //
DELIMITER ;
```


**4. Wyświetl średnie zarobki pracowników w każdym dziale i przekaż do zmiennej maksymalne zarobki z działu podanego przez użytkownika.**

```sql
DELIMITER //
CREATE PROCEDURE avg_zarobki(
    IN p_dzial VARCHAR(50),
    OUT p_maksymalne_zarobki DECIMAL(10, 2)
)
BEGIN
    SELECT dzialy_stanow.nazwa_dzialu, AVG(zatrudnienie.zarobek) AS srednie_zarobki
    FROM zatrudnienie
    INNER JOIN dzialy_stanow
        ON dzialy_stanow.id_dzial_stanow = zatrudnienie.id_dzial_stanow
    WHERE zatrudnienie.data_zak IS NULL
    GROUP BY dzialy_stanow.nazwa_dzialu;

    SELECT MAX(zatrudnienie.zarobek)
    INTO p_maksymalne_zarobki
    FROM zatrudnienie
    INNER JOIN dzialy_stanow
        ON dzialy_stanow.id_dzial_stanow = zatrudnienie.id_dzial_stanow
    WHERE dzialy_stanow.nazwa_dzialu = p_dzial
      AND zatrudnienie.data_zak IS NULL;
END //
DELIMITER ;

SET @maksymalne_zarobki_dzialu = 0;
CALL avg_zarobki('IT', @maksymalne_zarobki_dzialu);
SELECT @maksymalne_zarobki_dzialu;
```
