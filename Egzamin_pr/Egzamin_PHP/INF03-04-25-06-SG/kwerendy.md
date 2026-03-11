kw1:
```sql
SELECT id_zadania, zadanie, data FROM zadania;
```
kw2:
```sql
INSERT INTO zadania VALUES (NULL, 'Spotkania firmowe', '2024-05-10', 1);
```
kw3:
```sql
DELETE FROM zadania WHERE id_zadania = 2;
```
kw4:
```sql
SELECT imie, nazwisko, telefon, zadanie, data FROM zadania INNER JOIN osoby ON id_osoba = osoba_id;
```