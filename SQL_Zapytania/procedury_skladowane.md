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