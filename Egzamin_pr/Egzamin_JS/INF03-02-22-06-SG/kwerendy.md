kw1:
```sql
SELECT marka, rocznik FROM samochody WHERE kolor = "Niebieski";
```
kw2:
```sql
SELECT COUNT(*) FROM samochody WHERE (marka = 'Toyota' OR 'Opel') AND stan = 'bardzo dobry';
```
kw3:
```sql
UPDATE samochody SET stan = 'dobry' WHERE rocznik < 2004;
```
kw4:
```sql
CREATE USER 'jan'@'localhost' IDENTIFIED BY 'janKowalski1@';
```
kw5:
```sql
GRANT SELECT, INSERT, UPDATE ON samochody TO 'jan'@'localhost';
```