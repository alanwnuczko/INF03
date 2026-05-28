kw1:
```sql
SELECT id, imie, nazwisko FROM personel WHERE status = "policjant";
```

kw2:
```sql
SELECT typ, COUNT(id) FROM pojazdy GROUP BY typ;
```

kw3:
```sql
SELECT personel.id, personel.nazwisko FROM personel LEFT JOIN rejestr ON personel.id = rejestr.id_personel WHERE id_personel IS NULL;
```

kw4:
```sql
INSERT INTO rejestr (data, id_personel, id_pojazd) VALUES (CURRENT_DATE, 1, 14);
```