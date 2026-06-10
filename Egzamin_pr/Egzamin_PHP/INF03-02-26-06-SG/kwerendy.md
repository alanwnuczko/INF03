kw1:
```sql
SELECT idKontynent, nazwa FROM kontynenty;
```

kw2:
```sql
SELECT idWodospadu, panstwo, nazwa, wysokosc FROM wodospady;
```

kw3:
```sql
SELECT idWodospadu, panstwo, nazwa, wysokosc FROM wodospady WHERE idKontynent = 6;
```
kw4:
```sql
INSERT INTO wpisy (idWodospadu, idTurysta) VALUES (1, 1);
```

kw5:
```sql
SELECT idTurysta, nick FROM turysci ORDER BY nick;
```