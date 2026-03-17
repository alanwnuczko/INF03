kw1:
```sql
SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = 7;
```
kw2:
```sql
SELECT p.nazwa, r.rodzaj FROM potrawy p JOIN rodzaje r ON p.idRodzaje = r.idRodzaje WHERE p.idPotrawy = 7;
```
kw3:
```sql
SELECT p.nazwa, a.alergen FROM potrawy p JOIN lista_alergenow lA ON p.idPotrawy = lA.idPotrawy JOIN alergeny a ON lA.idAlergeny = a.idAlergeny WHERE p.idPotrawy = 7;
```
kw4:
```sql
SELECT przepis, plik FROM potrawy WHERE idPotrawy = 7;
```