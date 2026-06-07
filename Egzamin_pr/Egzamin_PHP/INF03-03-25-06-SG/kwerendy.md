kw1:
```sql
SELECT nazwisko, imie, klasa, data_wypozyczenia FROM uczniowie WHERE data_wypozyczenia > "2020-03-02";
```

kw2:
```sql
SELECT nazwisko, imie, data_wypozyczenia, ksiazki.autor, ksiazki.kod FROM uczniowie JOIN ksiazki ON uczniowie.id_ksiazki = ksiazki.id;
```

kw3:
```sql
DELETE FROM ksiazki WHERE autor = "0";
```

kw4:
```sql
SELECT autor, tytul, kod FROM ksiazki ORDER BY RAND() LIMIT 5;
```