kw1:
```sql
SELECT nazwa, trudnosc, kalorie FROM potrawy WHERE idPotrawy = 7;
```
kw2:
```sql
SELECT potrawy.nazwa, rodzaje.rodzaj FROM potrawy JOIN rodzaje ON potrawy.idRodzaje = rodzaje.idRodzaje WHERE idPotrawy = 7;
```
kw3:
```sql
SELECT potrawy.nazwa, alergeny.alergen FROM potrawy JOIN lista_alergenow ON potrawy.idPotrawy = lista_alergenow.idPotrawy JOIN alergeny ON lista_alergenow.idAlergeny = alergeny.idAlergeny WHERE potrawy.idPotrawy = 7;
```
kw4:
```sql
SELECT przepis, plik FROM potrawy WHERE idPotrawy = 7;
```