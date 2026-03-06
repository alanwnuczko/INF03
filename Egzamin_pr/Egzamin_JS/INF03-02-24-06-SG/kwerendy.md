kw1:
```sql
INSERT INTO logowanie (id, nick, haslo) VALUES (3, 'Jeremi', 'Jer123');
```
kw2:
```sql
SELECT FLOOR(AVG(rokUr)) AS "Średni rok urodzenia" FROM uczestnicy;
```
kw3:
```sql
SELECT imie, nazwisko, nick, haslo FROM uczestnicy JOIN logowanie ON logowanie_id = logowanie.id WHERE imie like "J%";
```
kw4:
```sql
CREATE USER uczestnik@localhost IDENTIFIED BY "Ucz123&";
```
kw5:
```sql
GRANT SELECT, UPDATE ON chat.uczestnicy TO uczestnik@localhost;
```