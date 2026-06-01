kw1: 
```sql
SELECT LOWER(nazwa) FROM wojewodztwa;
```

kw2:
```sql
SELECT COUNT(nazwa) FROM miasta WHERE id_wojewodztwa = 1;
```

kw3:
```sql
SELECT miasta.nazwa, wojewodztwa.nazwa FROM miasta JOIN wojewodztwa ON miasta.id_wojewodztwa = wojewodztwa.id WHERE miasta.nazwa LIKE "Lu%" ORDER BY miasta.nazwa;
```

kw4:
```sql
SELECT wojewodztwa.nazwa, COUNT(miasta.nazwa) AS "Liczba miast" FROM wojewodztwa JOIN miasta ON wojewodztwa.id = miasta.id_wojewodztwa GROUP BY wojewodztwa.nazwa;
```