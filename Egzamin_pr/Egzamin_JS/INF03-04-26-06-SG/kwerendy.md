kw1:
```sql
SELECT imie, nazwisko FROM rezerwacje WHERE wyzywienie = 3;
```

kw2:
```sql
SELECT COUNT(Wycieczki_id) FROM rezerwacje WHERE Wycieczki_id = 2 AND wylot = "Warszawa";
```

kw3;
```sql
SELECT imie, nazwisko, miejsce FROM rezerwacje JOIN wycieczki ON rezerwacje.Wycieczki_id = wycieczki.id;
```

kw4:
```sql
SELECT miejsce, SUM(rezerwacje.osob) FROM rezerwacje JOIN wycieczki ON rezerwacje.Wycieczki_id = wycieczki.id GROUP BY miejsce;
```