## AVG() – średnia wartość

**Składnia:**
```sql
SELECT AVG(nazwa_kolumny) FROM nazwa_tabeli;
```
**Przykłady:**
```sql
--Zwraca średnie wynagrodzenie wszystkich pracowników z relacji pracownicy
SELECT AVG(wynagrodzenie) FROM pracownicy;

--Zwraca średnie wynagrodzenie tylko pracowników działu IT
SELECT AVG(wynagrodzenie) FROM pracownicy WHERE dzial = 'IT';
```

---

## AVG() z JOIN (połączenie tabel)
`JOIN` łączy tabele na podstawie relacji, dzięki czemu można używać danych z obu tabel jednocześnie:

**Składnia:**
```sql
SELECT AVG(t1.nazwa_kolumny)
FROM tabela1 t1
JOIN tabela2 t2 ON t1.klucz_obcy = t2.klucz_glowny;
```

**Przykłady:**
```sql
--Zwraca średnie wynagrodzenie dla każdego działu, wyświetlając jego nazwę
SELECT d.nazwa, AVG(p.wynagrodzenie) AS srednia
FROM pracownicy p
JOIN dzialy d ON p.id_dzialu = d.id_dzialu
GROUP BY d.nazwa;
```