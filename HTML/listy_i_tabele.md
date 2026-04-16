## LISTY

### Lista nieuporządkowana `<ul>`
```html
<ul>
  <li>Mleko</li>
  <li>Jajka</li>
  <li>Chleb</li>
  <li>Masło</li>
</ul>
```
Wynik:
> Mleko  
> Jajka  
> Chleb  
> Masło  


### Lista uporządkowana `<ol>`
```html
<ol>
  <li>Zagotuj wodę</li>
  <li>Wsyp makaron</li>
  <li>Gotuj 8 minut</li>
  <li>Odcedź i podaj</li>
</ol>
```
Wynik:
> 1. Zagotuj wodę
> 2. Wsyp makaron
> 3. Gotuj 8 minut
> 4. Odcedź i podaj


### Zagnieżdżanie list
```html
<ul>
  <li>Europa
    <ul>
      <li>Polska</li>
      <li>Niemcy</li>
    </ul>
  </li>
  <li>Azja
    <ul>
      <li>Japonia</li>
      <li>Chiny</li>
    </ul>
  </li>
</ul>
```
Wynik:
> - Europa
>   - Polska
>   - Niemcy
> - Azja
>   - Japonia
>   - Chiny

---

## TABELE
 
### Tabela `<table>`, `<tr>`, `<td>`
```html
<table>
  <tr>
    <td>Komórka 1</td>
    <td>Komórka 2</td>
  </tr>
  <tr>
    <td>Komórka 3</td>
    <td>Komórka 4</td>
  </tr>
</table>
```
Wynik:
> | Komórka 1 | Komórka 2 |  
> | Komórka 3 | Komórka 4 |  
 
 
### Nagłówek kolumny `<th>`
```html
<table>
  <tr>
    <th>Imię</th>
    <th>Wiek</th>
    <th>Miasto</th>
  </tr>
  <tr>
    <td>Anna</td>
    <td>28</td>
    <td>Warszawa</td>
  </tr>
  <tr>
    <td>Piotr</td>
    <td>34</td>
    <td>Kraków</td>
  </tr>
</table>
```
Wynik:
> | **Imię** | **Wiek** | **Miasto** |
> |----------|----------|------------|
> | Anna     | 28       | Warszawa   |
> | Piotr    | 34       | Kraków     |