# JOIN

> JOIN służy do łączenia wierszy z dwóch lub więcej tabel na podstawie wspólnej kolumny (klucza obcego / klucza głównego).
> https://www.youtube.com/watch?v=G3lJAxg1cy8
---

## Przykładowe tabele użyte w całym dokumencie:

```sql
-- Tabela: klienci
CREATE TABLE klienci (
    id       INT PRIMARY KEY,
    imie     VARCHAR(50),
    miasto   VARCHAR(50)
);

-- Tabela: zamowienia
CREATE TABLE zamowienia (
    id          INT PRIMARY KEY,
    klient_id   INT,          -- klucz obcy → klienci.id
    produkt     VARCHAR(100),
    kwota       DECIMAL(10,2)
);
```

Przykładowe dane:

| klienci.id | imie    | miasto   |
|-----------|---------|----------|
| 1         | Anna    | Gdańsk   |
| 2         | Bartek  | Warszawa |
| 3         | Celina  | Kraków   |
| 4         | Damian  | Poznań   |

| zamowienia.id | klient_id | produkt  | kwota  |
|--------------|-----------|----------|--------|
| 1            | 1         | Laptop   | 3200   |
| 2            | 1         | Mysz     | 89     |
| 3            | 2         | Monitor  | 1100   |
| 4            | 5         | Klawiatura | 200  |

> Klient o `id = 4` (Damian) nie ma żadnego zamówienia.  
> Zamówienie `id = 4` ma `klient_id = 5`, który nie istnieje w tabeli `klienci`.

---

## INNER JOIN

Zwraca tylko wiersze, dla których istnieje dopasowanie **w obu tabelach**.

```
Tabela A    Tabela B
  [ A ∩ B ]
```

```sql
SELECT k.imie, z.produkt, z.kwota
FROM klienci k
INNER JOIN zamowienia z ON k.id = z.klient_id;
```

**Wynik:**

| imie   | produkt | kwota |
|--------|---------|-------|
| Anna   | Laptop  | 3200  |
| Anna   | Mysz    | 89    |
| Bartek | Monitor | 1100  |

- Damian (id=4) nie pojawia się – brak zamówień.
- Zamówienie klient_id=5 nie pojawia się – brak klienta.

---

## LEFT JOIN

Zwraca wszystkie wiersze z lewej tabeli oraz dopasowane wiersze z prawej.  
Gdzie nie ma dopasowania – wartości prawej tabeli to `NULL`.

```
Tabela A    Tabela B
[ A        ]
            [ A ∩ B ]
```

```sql
SELECT k.imie, z.produkt, z.kwota
FROM klienci k
LEFT JOIN zamowienia z ON k.id = z.klient_id;
```

**Wynik:**

| imie   | produkt | kwota  |
|--------|---------|--------|
| Anna   | Laptop  | 3200   |
| Anna   | Mysz    | 89     |
| Bartek | Monitor | 1100   |
| Celina | NULL    | NULL   |
| Damian | NULL    | NULL   |

- Celina i Damian pojawiają się z `NULL` – nie mają zamówień.
- `LEFT JOIN` = `LEFT OUTER JOIN` (zapis równoważny).

**Znajdź klientów BEZ zamówień:**

```sql
SELECT k.imie
FROM klienci k
LEFT JOIN zamowienia z ON k.id = z.klient_id
WHERE z.id IS NULL;
```

| imie   |
|--------|
| Celina |
| Damian |

---

## RIGHT JOIN

Zwraca **wszystkie wiersze z prawej tabeli** oraz dopasowane wiersze z lewej.  
Gdzie nie ma dopasowania – wartości lewej tabeli to `NULL`.

```
Tabela A    Tabela B
          [         B ]
[ A ∩ B ]
```

```sql
SELECT k.imie, z.produkt, z.kwota
FROM klienci k
RIGHT JOIN zamowienia z ON k.id = z.klient_id;
```

**Wynik:**

| imie   | produkt    | kwota |
|--------|------------|-------|
| Anna   | Laptop     | 3200  |
| Anna   | Mysz       | 89    |
| Bartek | Monitor    | 1100  |
| NULL   | Klawiatura | 200   |

- Zamówienie z `klient_id = 5` pojawia się z `NULL` – klient nie istnieje.
- `RIGHT JOIN` = `RIGHT OUTER JOIN`.

---

## Porównanie typów JOIN

| Typ              | Lewa tabela | Prawa tabela | Opis                                      |
|------------------|-------------|--------------|-------------------------------------------|
| `INNER JOIN`     | dopasowane  | dopasowane   | Tylko wspólne rekordy                     |
| `LEFT JOIN`      | **wszystkie** | dopasowane lub NULL | Wszystkie z lewej + dopasowania z prawej |
| `RIGHT JOIN`     | dopasowane lub NULL | **wszystkie** | Wszystkie z prawej + dopasowania z lewej |

---

## Przykłady

### JOIN z WHERE

```sql
-- Zamówienia klientów z Gdańska powyżej 500 zł
SELECT k.imie, z.produkt, z.kwota
FROM klienci k
INNER JOIN zamowienia z ON k.id = z.klient_id
WHERE k.miasto = 'Gdańsk' AND z.kwota > 500;
```

### JOIN z GROUP BY

```sql
-- Suma zamówień na klienta
SELECT k.imie, COUNT(z.id) AS liczba_zamowien, SUM(z.kwota) AS suma
FROM klienci k
LEFT JOIN zamowienia z ON k.id = z.klient_id
GROUP BY k.id, k.imie
ORDER BY suma DESC;
```

### Aliasy

```sql
SELECT k.imie, z.produkt
FROM klienci AS k
JOIN zamowienia AS z ON k.id = z.klient_id;
```
