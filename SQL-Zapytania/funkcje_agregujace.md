# Funkcje agregujące

Funkcje agregujące wykonują obliczenia na zbiorze wierszy i zwracają jedną wartość.

## Funkcje

| Funkcja  | Co robi                        |
|----------|--------------------------------|
| `MIN()`  | Zwraca najmniejszą wartość     |
| `MAX()`  | Zwraca największą wartość      |
| `COUNT()`| Zlicza wiersze                 |
| `SUM()`  | Sumuje wartości                |
| `AVG()`  | Oblicza średnią arytmetyczną   |

---

## MIN() - wartość minimalna

**Składnia:**
```sql
SELECT MIN(nazwa_kolumny) FROM nazwa_tabeli;
```
**Przykłady:**
```sql
--Zwraca najmniejszą wartość z kolumny wynagrodzenie z tabeli pracownicy
SELECT MIN(wynagrodznie) FROM pracownicy;

--Zwraca najmniejsze wynagrodzenie wśród pracowników działu IT
SELECT MIN(wynagrodzenie) FROM pracownicy WHERE dzial = 'IT';
```
---
## MAX() - wartość maksymalna

**Składnia:**
```sql
SELECT MAX(nazwa_kolumny) FROM nazwa_tabeli;
```
**Przykłady:**
```sql
--Zwraca największą wartość z kolumny wynagrodzenie z tabeli pracownicy
SELECT MAX(wynagrodznie) FROM pracownicy;

--Zwraca największe wynagrodzenie wśród pracowników działu HR
SELECT MAX(wynagrodzenie) FROM pracownicy WHERE dzial = 'HR';
```
---
## COUNT() - liczba wierszy

**Składnia:**
```sql
SELECT COUNT(nazwa_kolumny) FROM nazwa_tabeli;
```
**Przykłady:**
```sql
--Zwraca liczbę wszystkich wierszy w tabeli pracownicy
SELECT COUNT(*) FROM pracownicy;

--Zwraca liczbę wszystkich niepustych wartości w kolumnie wynagrodzenie
SELECT COUNT(wynagrodzenie) FROM pracownicy;
```
---
## SUM() - suma wartości

**Składnia:**
```sql
SELECT SUM(nazwa_kolumny) FROM nazwa_tabeli;
```
**Przykład:**
```sql
--Zwraca sumę wszystkich wynagrodzeń w tabeli pracownicy
SELECT SUM(wynagrodzenie) FROM pracownicy;
```