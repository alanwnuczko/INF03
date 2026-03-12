kw1:
```sql
SELECT imie, nazwisko, stanowisko FROM kadra WHERE stanowisko = "fryzjer" OR stanowisko = "stylista";
```
kw2:
```sql
SELECT COUNT(*), MAX(cena) FROM uslugi WHERE rodzaj = 2;
```
kw3:
```sql
SELECT nazwa, imie FROM uslugi JOIN kadra ON kadra_id = kadra.id WHERE rodzaj > 1;
```
kw4:
```sql
ALTER TABLE uslugi ADD opinia TEXT;
```