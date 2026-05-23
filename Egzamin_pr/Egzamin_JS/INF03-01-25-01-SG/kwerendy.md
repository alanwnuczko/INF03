kw1:
```sql
SELECT kolor, material FROM produkt WHERE wysokosc_buta > 10;
```

kw2:
```sql
SELECT nazwa, cena, nazwa_kat FROM buty JOIN kategorie ON buty.id_kat = kategorie.id_kat;
```

kw3:
```sql
CREATE USER 'Marek'@'localhost' IDENTIFIED BY 'M@reK';
```

kw4:
```sql
GRANT SELECT, UPDATE ON produkt TO 'Marek'@'localhost';
```