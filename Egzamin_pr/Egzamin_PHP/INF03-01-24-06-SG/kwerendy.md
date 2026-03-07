kw1:
```sql
SELECT nazwa FROM wycieczki WHERE poczatek="Muszyna" OR poczatek="Wieliczka";
```
kw2:
```sql
SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki JOIN zdjecia ON zdjecia.id = wycieczki.id_zdjecia;
```
kw3:
```sql
SELECT COUNT(*) AS liczba FROM wycieczki;
```
kw4:
```sql
ALTER TABLE wycieczki ADD ocena INT;
```