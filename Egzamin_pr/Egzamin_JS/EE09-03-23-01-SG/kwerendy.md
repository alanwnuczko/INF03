kw1:
```sql
SELECT id, tytul FROM ogloszenia ORDER BY tytul ASC;
```
kw2:
```sql
SELECT tytul FROM ogloszenia WHERE kategoria = 1 AND podkategoria = 13;
```
kw3:
```sql
UPDATE ogloszenia SET podkategoria = 1 WHERE id = 5;
```
kw4:
```sql
ALTER TABLE ogloszenia DROP COLUMN uzytkownik_id;
```