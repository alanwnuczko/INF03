kw1:
```sql
SELECT plik, nr_klienta, liczba_odbitek FROM zamowienia WHERE liczba_odbitek > 100 AND rodzaj = "matowy";
```
kw2:
```sql
SELECT (liczba_odbitek*cena) AS "Do zapłaty" FROM zamowienia JOIN zdjecia USING(rodzaj) WHERE nr_klienta = 3;
```
kw3:
```sql
SELECT SUM(liczba_odbitek) FROM zamowienia WHERE rodzaj = "błyszczący";
```
kw4:
```sql
CREATE USER 'Anna'@'localhost' IDENTIFIED BY '@NNa';
```