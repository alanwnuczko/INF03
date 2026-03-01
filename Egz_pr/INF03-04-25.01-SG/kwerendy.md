kw1:
```sql
SELECT model FROM produkt;
```
kw2:
```sql
SELECT model, nazwa, cena, nazwa_pliku FROM buty JOIN produkt USING(model);
```
kw3:
```sql
SELECT nazwa, cena, kod_produktu, material, nazwa_pliku FROM buty JOIN produkt USING(model) WHERE model = "P-59-03";
```
kw4:
```sql
INSERT INTO kategorie VALUES (null, 'Sandały');
```