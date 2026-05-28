kw1:
```sql
SELECT nazwa FROM choroby WHERE zakazna = "T" ORDER BY nazwa ASC;
```

kw2:
```sql
SELECT id, nazwa FROM choroby;
```

kw3:
```sql
SELECT objawy.nazwa FROM objawy JOIN choroby_objawy ON objawy.id = choroby_objawy.id_objawy WHERE id_choroby = 5;
```

kw4:
```sql
SELECT choroby.nazwa, COUNT(objawy.nazwa) FROM choroby JOIN choroby_objawy ON choroby_objawy.id_choroby = choroby.id JOIN objawy ON choroby_objawy.id_objawy = objawy.id WHERE choroby.zakazna = "T" GROUP BY choroby.nazwa;
```