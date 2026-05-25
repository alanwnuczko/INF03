kw1:
```sql
SELECT imie, nazwisko FROM osoby WHERE imie LIKE "A%";
```

kw2:
```sql
SELECT zadanie, data FROM zadania WHERE zadanie LIKE "%mebli%" ORDER BY data;
```

kw3:
```sql
SELECT osoby.nazwisko, COUNT(zadania.zadanie) AS "Liczba zadań" FROM osoby JOIN zadania ON zadania.osoba_id = osoby.id_osoba GROUP by osoby.nazwisko;
```

kw4:
```sql
ALTER TABLE osoby DROP COLUMN telefon;
```