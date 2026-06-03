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
SELECT plik, nazwa, wysokosc, pasmo, opis FROM szczyty JOIN opis ON szczyty.id = opis.szczyty_id WHERE szczyty.id = 1;
```
kw4:
```sql
SELECT nazwa, wysokosc, pasmo FROM szczyty WHERE pasmo LIKE "Beskid%";
```