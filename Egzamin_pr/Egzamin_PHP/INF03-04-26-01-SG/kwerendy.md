kw1:
```sql
SELECT id, imie, nazwisko FROM maturzysta WHERE szkola = "T3" ORDER BY nazwisko ASC;
```

kw2:
```sql
SELECT DISTINCT przedmiot FROM arkusz;
```

kw3:
```sql
SELECT MIN(rok), MAX(rok) FROM arkusz;
```

kw4:
```sql
SELECT maturzysta_id, AVG(punkty) AS "wynik" FROM wynik GROUP BY maturzysta_id ORDER BY wynik DESC LIMIT 1;
```

kw5:
```sql
SELECT rok, sesja, przedmiot, punkty FROM arkusz JOIN wynik ON arkusz.symbol = wynik.symbol WHERE maturzysta_id = 31;
```