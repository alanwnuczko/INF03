kw1:
```sql
SELECT data, temat FROM szkolenia ORDER BY data;
```
kw2:
```sql
SELECT data, temat, nazwisko, imie FROM szkolenia JOIN trenerzy ON trenerzy.id = szkolenia.id_trenera;
```
kw3:
```sql
SELECT imie, nazwisko, COUNT(*) FROM trenerzy JOIN szkolenia ON trenerzy.id = id_trenera GROUP BY trenerzy.id;
```
kw4:
```sql
ALTER TABLE zapisy CHANGE COLUMN id_klienta id_sluchacza INT;
```