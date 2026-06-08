kw1:
```sql
SELECT data FROM imieniny WHERE imiona Like "%Karola%";
```

kw2:
```sql
SELECT imiona FROM imieniny WHERE data = "05-04";
```

kw3:
```sql
SELECT COUNT(data) FROM imieniny WHERE imiona LIKE "%mir%";
```

kw4:
```sql
ALTER TABLE imieniny ADD COLUMN zyczenia VARCHAR(500);
```