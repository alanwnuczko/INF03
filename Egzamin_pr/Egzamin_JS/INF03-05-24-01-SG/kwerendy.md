kw1:
```sql
SELECT nazwa, cena FROM uslugi WHERE cena >= 50;
```
kw2:
```sql
SELECT AVG(cena), COUNT(*) FROM uslugi WHERE rodzaj = 1;
```
kw3:
```sql
CREATE USER 'kosmetyczka'@'localhost' IDENTIFIED BY 'Kosmet34';
```
kw4:
```sql
GRANT SELECT, UPDATE ON salon.uslugi TO 'kosmetyczka'@'localhost';
```
