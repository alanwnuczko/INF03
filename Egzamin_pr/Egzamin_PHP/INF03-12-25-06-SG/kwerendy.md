kw1:
```sql
SELECT nazwa, cena, opis FROM abonamenty;
```
kw2:
```sql
SELECT ROUND(AVG(cena), 2) AS Srednio_abonament FROM abonamenty;
```
kw3:
```sql
SELECT nazwa, cecha FROM abonamenty JOIN szczegolyabonamentu ON abonamenty.id = abonamenty_id JOIN cechy ON cechy.id = cechy_id WHERE abonamenty.id = 1;
```
kw4:
```sql
SELECT nazwa, opis FROM abonamenty WHERE opis LIKE "%zdrowie%" OR opis LIKE "%opieką%";
```