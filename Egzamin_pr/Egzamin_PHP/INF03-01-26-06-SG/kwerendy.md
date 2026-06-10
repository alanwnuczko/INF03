kw1:
```sql
SELECT idObiekt, plik, nazwa FROM obiekty WHERE panstwo = "Islandia";
```

kw2:
```sql
SELECT plik, nazwa, nazwaCechy, wartoscCechy, opis, rodzaj FROM obiekty JOIN rodzaje ON obiekty.idRodzaj = rodzaje.idRodzaj WHERE idObiekt = 46;
```

kw3:
```sql
SELECT nazwa FROM obiekty WHERE idRodzaj = 10;
```

kw4;
```sql
SELECT rodzaj, COUNT(obiekty.idObiekt) AS "Liczba obiektów" FROM rodzaje JOIN obiekty ON rodzaje.idRodzaj = obiekty.idRodzaj GROUP BY rodzaj;
```