kw1:
```sql
SELECT id, nazwa, zdjecie FROM gry;
```
kw2:
```sql
SELECT nazwa, LEFT(opis, 100), punkty, cena FROM gry WHERE id = 1;
```
kw3:
```sql
SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;
```
kw4:
```sql
INSERT INTO `gry` (`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('Zamczysko','Na odludziu stoi opuszczone zamczysko, w którym znajduje się skarb strzeżony przez złowrogie demony i duchy','200','50','zamczysko.jpg');
```