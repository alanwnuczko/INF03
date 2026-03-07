kw1:
```sql
SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;
```
kw2:
```sql
SELECT Ryby_id, wymiar_ochronny FROM okres_ochronny WHERE wymiar_ochronny < 30;
```
kw3:
```sql
SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.ryby_id WHERE lowisko.rodzaj = 3;
```
kw4:
```sql
ALTER TABLE ryby ADD COLUMN dobowy_limit TINYINT UNSIGNED;
```