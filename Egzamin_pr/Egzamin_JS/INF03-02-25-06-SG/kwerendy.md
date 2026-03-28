kw1:
```sql
SELECT MIN(priorytet) FROM notatki WHERE Osoby_id = 3;
```
kw2:
```sql
SELECT nazwa, priorytet FROM notatki WHERE nazwa LIKE "%na%";
```
kw3:
```sql
SELECT imie, nazwa FROM notatki JOIN osoby ON osoby.id = osoby_id WHERE priorytet = 5;
```
kw4:
```sql
SELECT imie, COUNT(Osoby_id) FROM notatki JOIN osoby ON Osoby_id = osoby.id GROUP BY imie;
```