kw1:
```sql
SELECT imie, pensja FROM pracownicy WHERE staz > 5;
```
kw2:
```sql
SELECT AVG(pensja), nazwa FROM pracownicy JOIN stanowiska ON stanowiska_id = stanowiska.id GROUP BY nazwa;
```
kw3:
```sql
SELECT imie, nazwisko pensja FROM pracownicy WHERE pensja = (SELECT MAX(pensja) FROM pracownicy);
```
kw4:
```sql
UPDATE pracownicy SET staz = staz+1;
```