kw1:
```sql
SELECT id_filmu, tytul, rok_produkcji, czas_trwania FROM filmy WHERE czas_trwania >= 100;
```

kw2:
```sql
SELECT imie, nazwisko, plik_awatara FROM aktorzy WHERE id_aktora = 3;
```

kw3:
```sql
SELECT * FROM aktorzy ORDER BY nazwisko, imie ASC;
```

kw4:
```sql
SELECT filmy.id_filmu, tytul, rok_produkcji FROM filmy JOIN filmy_aktorzy ON filmy.id_filmu = filmy_aktorzy.id_filmu WHERE filmy_aktorzy.id_aktora = 3;
```

kw5:
```sql
SELECT aktorzy.id_aktora, COUNT(filmy_aktorzy.id_filmu) AS "liczba_filmow" FROM aktorzy JOIN filmy_aktorzy ON aktorzy.id_aktora = filmy_aktorzy.id_aktora GROUP BY aktorzy.id_aktora;
```