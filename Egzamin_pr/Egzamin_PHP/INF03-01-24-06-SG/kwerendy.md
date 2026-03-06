```sql
SELECT nazwa FROM wycieczki WHERE poczatek="Muszyna" OR poczatek="Wieliczka";
```

```sql
SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki JOIN zdjecia ON zdjecia.id = wycieczki.id_zdjecia;
```

```sql
SELECT COUNT(*) AS liczba FROM wycieczki;
```

```sql
ALTER TABLE wycieczki ADD ocena INT;
```