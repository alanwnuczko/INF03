kw1:
```sql
SELECT miejsce, liczbaDni WHERE cena < 1000;
```
kw2:
```sql
SELECT liczbaDni, AVG(cena) AS sredniaCena FROM wycieczki GROUP BY liczbaDni;
```
kw3:
```sql
SELECT miejsce, nazwa FROM wycieczki JOIN zdjecia ON wycieczki.id = wycieczki_id WHERE cena > 500;
```
kw4:
```sql
CREATE USER 'Ewa'@'localhost' IDENTIFIED BY 'Ewa!Ewa';
```