kw1:
```sql
SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = "Malbork";
```
kw2:
```sql
SELECT id_kwiaciarni, COUNT(*) FROM zamowienia GROUP BY id_kwiaciarni;
```
kw3:
```sql
SELECT nazwa, miasto, kwiaty FROM zamowienia JOIN kwiaciarnie ON zamowienia.id_kwiaciarni = kwiaciarnie.id_kwiaciarni WHERE data = "2017-01-07";
```
kw4:
```sql
CREATE TABLE klienci (id INT NOT NULL AUTO_INCREMENT, imie VARCHAR(15), nazwisko VARCHAR(15), rabat INT UNSIGNED, PRIMARY KEY (id));
```