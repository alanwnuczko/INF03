kw1:
```sql
SELECT imie, kolor, cena FROM klienci WHERE topKlient = 1;
```
kw2:
```sql
SELECT imie, cena FROM klienci WHERE termin LIKE "2024-05-23%";
```
kw3:
```sql
SELECT klienci.imie, klienci.kolor, ksztalty.ksztalt FROM klienci JOIN ksztalty ON klienci.ksztalty_id = ksztalty.id WHERE ksztalty.ksztalt ='migdał';
```
kw4:
```sql
ALTER TABLE wzory ADD doplata INT;
```