kw1:
```sql
SELECT imie, nazwisko, koszt FROM uczestnicy WHERE zapłacono = False;
```
kw2:
```sql
SELECT AVG(koszt) AS "Średni koszt", SUM(koszt) AS "Całkowity Koszt", COUNT(*) AS "Liczba uczestników" FROM uczestnicy;
```
kw3:
```sql
SELECT nazwa, imie, nazwisko, email FROM uczestnicy JOIN wyklady ON wyklady_id = wyklady.id WHERE zaplacono=TRUE;
```
kw4:
```sql
ALTER TABLE uczestnicy DROP COLUMN haslo;
```