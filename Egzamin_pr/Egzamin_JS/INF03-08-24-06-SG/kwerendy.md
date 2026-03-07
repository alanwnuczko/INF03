kw1:
```sql
SELECT imie, nazwisko FROM osoby WHERE dataUr >="2001-01-01";
```
kw2:
```sql
SELECT DISTINCT miasto FROM adresy ORDER BY miasto;
```
kw3:
```sql
SELECT imie, nazwisko, telefony.numer FROM osoby JOIN telefony ON osoby.id = telefony.osoby_id;
```
kw4:
```sql
ALTER TABLE adresy ADD COLUMN numerMieszkania INT AFTER numer;
```