kw1:
```sql
SELECT ROUND(AVG(temperatura), 2) FROM pomiary WHERE id_miesiac = 7;
```

kw2:
```sql
INSERT INTO miejscowosc (nazwa, kraj) VALUES ("Kijów", "Ukraina");
```

kw3:
```sql
SELECT nazwa, kraj, temperatura FROM miejscowosc JOIN pomiary ON pomiary.id_miejscowosc = miejscowosc.id WHERE id_miesiac = 7;
```

kw4:
```sql
SELECT nazwa, AVG(pomiary.temperatura) FROM miesiace JOIN pomiary ON pomiary.id_miesiac = miesiace.id GROUP BY miesiace.id;
```