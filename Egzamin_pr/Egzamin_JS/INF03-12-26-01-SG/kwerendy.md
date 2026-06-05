kw1:
```sql
SELECT wzor, cena FROM tatuaze WHERE kolor = "czarny" AND cena > 100 ORDER BY cena DESC;
```

kw2:
```sql
SELECT kolor, COUNT(*) FROM tatuaze GROUP BY kolor;
```

kw3:
```sql
SELECT wzor, nazwa FROM tatuaze JOIN style ON tatuaze.style_id = style.id WHERE kolor = "zielony";
```

kw4:
```sql
UPDATE tatuaze SET cena = cena * 1.1 WHERE kolor = "czerwony";
```