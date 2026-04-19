kw1:
```sql
SELECT nazwa FROM miejsca ORDER BY nazwa ASC;
```
kw2:
```sql
SELECT cena FROM miejsca WHERE nazwa = "Malbork";
```
kw3:
```sql
SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE "0%";
```

kw4:
```sql
SELECT nazwa, ROUND(AVG(liczba_doroslych)) FROM miejsca JOIN wycieczki USING(id_miejsca) GROUP BY nazwa;
```

kw5:
```sql
CREATE TABLE klienci (id_klienta INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, imie VARCHAR(20), nazwisko VARCHAR(40), data_ur DATE);
```