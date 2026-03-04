## Utworzenie użytkownika w bazie danych

Składnia:
```sql
CREATE USER nazwa_uzytkownika@serwer IDENTIFIED BY nowe_haslo;
```

Na przykład:
```sql
--Tworzenie uzytkownika jolanta2 z hasłem haslo!234
CREATE USER jolanta2@localhost IDENTIFIED BY haslo!234;
```
```sql
--Tworzenie uzytkownika u1 z hasłem hAslo0
CREATE USER 'u1'@'localhost' IDENTIFIED BY 'hAsl0';
```

#

**Sprawdzenie istniejących użytkowników:**
```sql
--Zwraca użytkowników i serwer na którym jest
SELECT user,  host FROM mysql.user;
```