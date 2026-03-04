## GRANT - Nadanie uprawnień


**Nadawane uprawnienia:**
|Uprawnienie       | Co umożliwia                   |
|------------------|--------------------------------|
| `SELECT`         | Odczyt danych                  |
| `INSERT`         | Dodawanie wierszy              |
| `UPDATE`         | Modyfikowanie wierszy          |
| `DELETE`         | Usuwanie wierszy               |
| `ALL PRIVILEGES` | Wszystko powyżej               |
| `EXECUTE`        | Uruchamianie funkcji/procedur  |
| `CREATE`         | Tworzenie obiektów/użytkowników|

**Składnia:**
```sql
GRANT uprawnienie ON tabela TO uzytkownik/rola;
```
**Przykłady:**
```sql
-- Nadanie SELECT na tabeli pracownicy użytkownikowi
GRANT SELECT ON pracownicy TO jan;

--Nadanie kilku uprawnien na raz
GRANT SELECT, INSERT, UPDATE ON zamowienia TO martyna;

--Nadanie wszystkich uprawnień użytkownikowi u1 w tabeli wizyta
GRANT ALL PRIVILEGES ON przychodnia.wizyta FROM 'u1'@'localhost';
```

---
## REVOKE - Cofnięcie uprawnień
**Składnia:**
```sql
REVOKE uprawnienie ON tabela FROM jan;
```

**Przykłady:**
```sql
--Cofnięcie SELECT na tabeli pracownicy użytkownikowi
REVOKE SELECT ON pracownicy FROM jan;

--Odebranie wszytskich uprawnień
REVOKE ALL PRIVILEGES ON zamowienia FROM martyna;

--Cofnięcie uprawnienia SELECT użytkownikowi u1 na tabeli wizyta w bazie danych przychodnia
REVOKE SELECT ON przychodnia.wizyta FROM 'u1'@'localhost';
```
---
```sql
--Wyświetlenie uprawnień użytkownika u1
SHOW GRANTS FOR 'u1'@'localhost';
```
