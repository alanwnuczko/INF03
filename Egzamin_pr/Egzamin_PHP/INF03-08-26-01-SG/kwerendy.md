kw1:
```sql
SELECT id, nazwa FROM szczyty ORDER BY wysokosc DESC;
```
kw2:
```sql
SELECT plik, nazwa FROM szczyty LIMIT 10;
```
kw3:
```sql
SELECT s.plik, s.nazwa, s.wysokosc, s.pasmo, o.opis FROM szczyty s JOIN opis o ON s.id = o.szczyty_id WHERE s.id = 1;
```
kw4:
```sql
SELECT nazwa, wysokosc, pasmo FROM szczyty WHERE pasmo LIKE "Beskid%";
```