kw1:
```sql
SELECT COUNT(*), pensja FROM pracownicy GROUP BY pensja ORDER BY pensja DESC;
```
kw2:
```sql
SELECT imie, nazwisko, nazwa FROM pracownicy JOIN stanowiska ON pracownicy.stanowiska_id WHERE staz > 10;
```
kw3:
```sql
SELECT nazwisko, pensja FROM pracownicy WHERE staz BETWEEN 10 AND 20;
```
kw4:
```sql
ALTER TABLE stanowiska ADD COLUMN minPensja INT;
```