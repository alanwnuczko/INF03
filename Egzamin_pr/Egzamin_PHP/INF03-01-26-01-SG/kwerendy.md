kw1:
```sql
SELECT marka, model, cena FROM pojazdy WHERE marka = "BM" ORDER BY cena DESC LIMIT 15;
```

kw2:
```sql
SELECT AVG(cena) AS "Średnia cena", MAX(cena) AS "Maksymalna cena" FROM pojazdy WHERE model = "meta";
```

kw3:
```sql
SELECT marka, model, cena, nazwa, doplata FROM pojazdy JOIN kolory ON pojazdy.kolor = kolory.id WHERE model = "alfa";
```

kw4:
```sql
SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;
```