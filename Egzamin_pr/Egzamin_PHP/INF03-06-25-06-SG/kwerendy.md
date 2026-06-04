kw1:
```sql
SELECT id, tytul FROM ksiazka WHERE gatunek = "liryka";
```

kw2:
```sql
SELECT tytul, id_cz, data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY data_odd ASC LIMIT 15;
```

kw3:
```sql
ALTER TABLE ksiazka ADD COLUMN rezerwacja TINYINT(1) DEFAULT 0;
```

kw4:
```sql
UPDATE ksiazka SET rezerwacja = 1 WHERE id = 1;
```
kw5:
```sql
SELECT tytul FROM ksiazka WHERE id = 4;
```