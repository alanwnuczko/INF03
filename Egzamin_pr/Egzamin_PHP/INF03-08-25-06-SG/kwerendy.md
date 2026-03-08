kw1:
```sql
SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = "Polska";
```
kw2:
```sql
SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC;
```
kw3:
```sql
SELECT rok, AVG(dlugosc) AS "Średnia długość" FROM parada JOIN udzial ON parada.id = id_parada JOIN smok ON id_smok = smok.id WHERE rok > 2005 GROUP BY rok;
```
kw4:
```sql
ALTER TABLE parada ADD COLUMN lokalizacja VARCHAR(100);
```