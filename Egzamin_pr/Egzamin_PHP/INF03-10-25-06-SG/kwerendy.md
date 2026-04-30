kw1:
```sql
SELECT kod, nazwa, cena FROM kursy ORDER BY cena;
```
kw2: 
```sql
SELECT nazwa FROM kursy;
```
kw3: 
```sql
INSERT INTO `uczestnicy` (`imie`, `nazwisko`, `wiek`) VALUES ('Tadeusz', 'Wysocki', '36');
```
kw4: 
```sql
SELECT COUNT(kod_kursu) AS 'Zapisanych', nazwa FROM kursy JOIN kursy_uczestnicy ON kod = kod_kursu GROUP BY nazwa;
```