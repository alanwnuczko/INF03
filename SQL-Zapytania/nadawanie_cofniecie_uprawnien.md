## GRANT - Nadanie uprawnień

**Składnia:**
```sql
GRANT uprawnienie ON tabela TO uzytkownik/rola;
```

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

**Przykłady:**
```sql
-- Nadanie SELECT na tabeli pracownicy użytkownikowi
GRANT SELECT ON pracownicy TO jan;

--Nadanie kilku uprawnien na raz
GRANT SELECT, INSERT, UPDATE ON zamowienia TO martyna;
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
```