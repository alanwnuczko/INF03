kw1:
```sql
SELECT data FROM imieniny WHERE imiona LIKE "%Karola";
```
kw2:
```sql
SELECT imiona FROM imieniny WHERE data LIKE "05-04";
```
kw3:
```sql
SELECT COUNT(data) FROM imieniny WHERE imiona LIKE "%mir%";
```
kw4:
```sql
ALTER TABLE imieniny ADD COLUMN zyczenia VARCHAR(500);
```
#
EXPORT DO CSV:
```sql
SELECT * FROM imieniny INTO OUTFILE 'C:/xampp/mysql/data/imieniny.csv' FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n';
```