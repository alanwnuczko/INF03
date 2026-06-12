kw1:
```sql
SELECT nazwa, potrzebne FROM grytowarzyskie WHERE liczbaGraczy > 4;
```

kw2:
```sql
SELECT AVG(czasRozgrywki) AS "średnia w minutach" FROM grytowarzyskie WHERE liczbaGraczy = 2;
```

kw3:
```sql
SELECT nazwa FROM grytowarzyskie WHERE czasRozgrywki = (SELECT MAX(czasRozgrywki) FROM grytowarzyskie);
```

kw4:
```sql
SELECT nazwa FROM grytowarzyskie WHERE nazwa LIKE "%karty%" AND liczbaGraczy < 4;
```