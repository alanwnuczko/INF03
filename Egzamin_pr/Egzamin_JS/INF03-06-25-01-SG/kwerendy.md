kw1:
```sql
SELECT pseudonim FROM zawodnicy WHERE data_zdobycia BETWEEN "2020-07-01" AND "2020-07-31";
```

kw2:
```sql
SELECT pseudonim, tytul FROM zawodnicy WHERE klasa = "3A" AND tytul != "";
```

kw3:
```sql
SELECT pseudonim, klasa, ranking FROM zawodnicy ORDER BY ranking ASC LIMIT 10;
```

kw4:
```sql
SELECT pseudonim, data_zdobycia, DATEDIFF(CURRENT_DATE(), data_zdobycia) AS "dni" FROM zawodnicy WHERE tytul != "";
```