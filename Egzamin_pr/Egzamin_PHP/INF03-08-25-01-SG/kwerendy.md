kw1:
```sql
SELECT COUNT(*) FROM klienci;
```
kw2:
```sql
SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta ORDER BY data_odbioru;
```
kw3:
```sql
SELECT nazwisko, imie, zamowienia.id, kod_koloru, pojemnosc, data_odbioru FROM klienci JOIN zamowienia ON klienci.id = id_klienta WHERE data_odbioru >= "2021-11-05" AND data_odbioru <= "2021-11-07" ORDER BY data_odbioru;
```
kw4:
```sql
SELECT imie, nazwisko FROM klienci WHERE plec="k";
```