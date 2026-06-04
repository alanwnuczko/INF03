kw1:
```sql
SELECT * FROM opony ORDER BY cena ASC LIMIT 10;
```

kw2:
```sql
SELECT producent, model, sezon, cena FROM opony WHERE nr_kat = 9;
```

kw3:
```sql
SELECT id_zam, ilosc, model, cena FROM zamowienie JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1;
```

kw4:
```sql
UPDATE opony SET cena = cena - cena *0.25 WHERE sezon = "letnia";
```