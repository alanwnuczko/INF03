kw1:
```sql
SELECT AVG(liczba_pracownikow) AS "średnia", MIN(liczba_pracownikow) AS "najmniej", MAX(liczba_pracownikow) AS "najwięcej" FROM wykonawcy;
```
kw2:
```sql
SELECT nazwa_firmy, liczba_pracownikow FROM wykonawcy WHERE liczba_pracownikow >= 40;
```
kw3:
```sql
SELECT DISTINCT miasto FROM klienci ORDER BY miasto;
```
kw4:
```sql
SELECT imie, cena FROM klienci JOIN zlecenia USING(id_klienta) WHERE miasto = "Poznań" AND rodzaj = "malowanie";
```
kw5:
```sql
SELECT imie, nazwa_firmy FROM klienci JOIN zlecenia ON klienci.id_klienta = zlecenia.id_klienta JOIN wykonanie ON zlecenia.id_zlecenia = wykonanie.id_zlecenia JOIN wykonawcy ON wykonanie.id_wykonawcy = wykonawcy.id_wykonawcy;
```