# Podzapytania

Podzapytanie to `SELECT` w nawiasach `( )` wewnątrz innego zapytania.

---

## Przykładowe tabele

```sql
CREATE TABLE dzialy (
    id     INT PRIMARY KEY,
    nazwa  VARCHAR(50)
);

CREATE TABLE pracownicy (
    id             INT PRIMARY KEY,
    imie           VARCHAR(50),
    id_dzialu      INT,
    wynagrodzenie  DECIMAL(10,2)
);

INSERT INTO dzialy VALUES
(1, 'IT'), (2, 'HR'), (3, 'Finanse'), (4, 'Marketing');

INSERT INTO pracownicy VALUES
(1, 'Anna',     1,    7500),
(2, 'Bartek',   1,    6200),
(3, 'Celina',   2,    4800),
(4, 'Damian',   2,    5100),
(5, 'Ewa',      3,    8200),
(6, 'Filip',    3,    5900),
(7, 'Grzegorz', 1,    9100),
(8, 'Hanna',    NULL, 5300);
```

Marketing nie ma pracowników. Hanna nie ma działu. Średnia pensja wynosi 6512.50.

---

## Jedna wartość w warunku


```sql
-- Więcej niż średnia wszystkich
SELECT imie, wynagrodzenie
FROM pracownicy
WHERE wynagrodzenie > (SELECT AVG(wynagrodzenie) FROM pracownicy);
```

| imie     | wynagrodzenie |
|----------|---------------|
| Anna     | 7500.00       |
| Ewa      | 8200.00       |
| Grzegorz | 9100.00       |

```sql
-- Największa pensja
SELECT imie, wynagrodzenie
FROM pracownicy
WHERE wynagrodzenie = (SELECT MAX(wynagrodzenie) FROM pracownicy);
```

| imie     | wynagrodzenie |
|----------|---------------|
| Grzegorz | 9100.00       |

---

## IN i NOT IN

`IN` sprawdza, czy wartość jest na liście z podzapytania.

```sql
-- Pracownicy z IT i HR
SELECT imie
FROM pracownicy
WHERE id_dzialu IN (SELECT id FROM dzialy WHERE nazwa IN ('IT', 'HR'));
```

| imie     |
|----------|
| Anna     |
| Bartek   |
| Celina   |
| Damian   |
| Grzegorz |

`NOT IN` nie zwraca wierszy, gdy lista zawiera `NULL`.

```sql
SELECT nazwa
FROM dzialy
WHERE id NOT IN (SELECT id_dzialu FROM pracownicy);
```

Wynik jest pusty. Po odrzuceniu `NULL` wychodzi Marketing:

```sql
SELECT nazwa
FROM dzialy
WHERE id NOT IN (SELECT id_dzialu FROM pracownicy WHERE id_dzialu IS NOT NULL);
```

| nazwa     |
|-----------|
| Marketing |

To samo daje `NOT EXISTS`:

```sql
SELECT d.nazwa
FROM dzialy d
WHERE NOT EXISTS (SELECT 1 FROM pracownicy p WHERE p.id_dzialu = d.id);
```

---

## EXISTS i NOT EXISTS

`EXISTS` zostawia wiersz, gdy podzapytanie coś zwróci.

```sql
-- Działy, w których ktoś pracuje
SELECT d.nazwa
FROM dzialy d
WHERE EXISTS (SELECT 1 FROM pracownicy p WHERE p.id_dzialu = d.id);
```

| nazwa   |
|---------|
| IT      |
| HR      |
| Finanse |

`NOT EXISTS` zostawia działy bez pracowników (Marketing).

---

## ANY() i ALL()

| Zapis   | Znaczenie                                      |
|---------|------------------------------------------------|
| `> ANY` | większe od przynajmniej jednej wartości (`> MIN`) |
| `> ALL` | większe od wszystkich wartości (`> MAX`)      |
| `= ANY` | to samo co `IN`                                |
| `<> ALL`| to samo co `NOT IN`                            |

W HR pensje to 4800 i 5100.

```sql
-- Więcej niż ktokolwiek z HR
SELECT imie, wynagrodzenie
FROM pracownicy
WHERE wynagrodzenie > ANY (
    SELECT wynagrodzenie FROM pracownicy WHERE id_dzialu = 2
);
```

| imie     | wynagrodzenie |
|----------|---------------|
| Anna     | 7500.00       |
| Bartek   | 6200.00       |
| Damian   | 5100.00       |
| Ewa      | 8200.00       |
| Filip    | 5900.00       |
| Grzegorz | 9100.00       |
| Hanna    | 5300.00       |

```sql
-- Więcej niż każdy z HR
SELECT imie, wynagrodzenie
FROM pracownicy
WHERE wynagrodzenie > ALL (
    SELECT wynagrodzenie FROM pracownicy WHERE id_dzialu = 2
);
```

| imie     | wynagrodzenie |
|----------|---------------|
| Anna     | 7500.00       |
| Bartek   | 6200.00       |
| Ewa      | 8200.00       |
| Filip    | 5900.00       |
| Grzegorz | 9100.00       |
| Hanna    | 5300.00       |

---

## Odwołanie do wiersza z zewnątrz

Podzapytanie korzysta z kolumny zapytania zewnętrznego i liczy się dla każdego wiersza. Tabele mają aliasy `p` i `p2`.

```sql
-- Więcej niż średnia we własnym dziale
SELECT p.imie, p.id_dzialu, p.wynagrodzenie
FROM pracownicy p
WHERE p.wynagrodzenie > (
    SELECT AVG(p2.wynagrodzenie)
    FROM pracownicy p2
    WHERE p2.id_dzialu = p.id_dzialu
);
```

| imie     | id_dzialu | wynagrodzenie |
|----------|-----------|---------------|
| Damian   | 2         | 5100.00       |
| Ewa      | 3         | 8200.00       |
| Grzegorz | 1         | 9100.00       |

```sql
-- Najwięcej zarabiający w swoim dziale
SELECT p.imie, p.id_dzialu, p.wynagrodzenie
FROM pracownicy p
WHERE p.wynagrodzenie = (
    SELECT MAX(wynagrodzenie)
    FROM pracownicy
    WHERE id_dzialu = p.id_dzialu
);
```

| imie     | id_dzialu | wynagrodzenie |
|----------|-----------|---------------|
| Damian   | 2         | 5100.00       |
| Ewa      | 3         | 8200.00       |
| Grzegorz | 1         | 9100.00       |

---

## Dodatkowa kolumna

Podzapytanie w liście `SELECT` dodaje kolumnę i zwraca jedną wartość na wiersz.

```sql
SELECT d.nazwa,
       (SELECT COUNT(*) FROM pracownicy p WHERE p.id_dzialu = d.id) AS liczba
FROM dzialy d;
```

| nazwa     | liczba |
|-----------|--------|
| IT        | 3      |
| HR        | 2      |
| Finanse   | 2      |
| Marketing | 0      |

---

## W FROM

Podzapytanie w `FROM` jest tabelą i ma własny alias.

```sql
-- Działy ze średnią powyżej 6000
SELECT d.nazwa, t.srednia
FROM dzialy d
JOIN (
    SELECT id_dzialu, AVG(wynagrodzenie) AS srednia
    FROM pracownicy
    GROUP BY id_dzialu
) AS t ON t.id_dzialu = d.id
WHERE t.srednia > 6000
ORDER BY t.srednia DESC;
```

| nazwa   | srednia |
|---------|---------|
| IT      | 7600.00 |
| Finanse | 7050.00 |

---

## Kilka kolumn naraz

```sql
-- Osoba z działu 1 z największą pensją w tym dziale
SELECT imie
FROM pracownicy
WHERE (id_dzialu, wynagrodzenie) = (
    SELECT id_dzialu, MAX(wynagrodzenie)
    FROM pracownicy
    WHERE id_dzialu = 1
    GROUP BY id_dzialu
);
```

| imie     |
|----------|
| Grzegorz |

---

## INSERT, UPDATE, DELETE

```sql
INSERT INTO it_kopia (id, imie)
SELECT id, imie
FROM pracownicy
WHERE id_dzialu = (SELECT id FROM dzialy WHERE nazwa = 'IT');

UPDATE pracownicy
SET wynagrodzenie = wynagrodzenie + 500
WHERE id_dzialu = (SELECT id FROM dzialy WHERE nazwa = 'HR');

DELETE FROM pracownicy
WHERE id_dzialu IN (SELECT id FROM dzialy WHERE nazwa = 'HR');
```
