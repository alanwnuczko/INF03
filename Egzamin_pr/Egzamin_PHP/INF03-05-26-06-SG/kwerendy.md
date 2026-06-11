kw1:
```sql
SELECT idMeble, nazwa, plik, styl, cena, opis FROM meble WHERE kategoria = 1;
```

kw2:
```sql
INSERT INTO zakupy (`idKlienci`, `idMeble`, `sztuk`) VALUES (1, 6, 1);
```

kw3:
```sql
SELECT nazwa, cena FROM meble JOIN zakupy ON meble.idMeble = zakupy.idMeble WHERE idKlienci = 1;
```

kw4:
```sql
SELECT nazwa, imie, nazwisko FROM meble JOIN zakupy ON meble.idMeble = zakupy.idMeble JOIN klienci ON zakupy.idKlienci = klienci.idKlienci;
```