# LISTY
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

```text
• Mleko
• Jajka
• Chleb
• Masło
```

Styl punktora można zmieniać w CSS:
```css
ul{
  list-style-type: none;   /* Brak punktora */
  list-style-type: square; /* Kwadratowy punktor */
}
```

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

```text
1. Zagotuj wodę
2. Wsyp makaron
3. Gotuj 8 minut
4. Odcedź i podaj
```

### Lista definicji `<dl>`

```html
<dl>
  <dt>Termin</dt>
  <dd>Wyjaśnienie terminu</dd>
  <dt>Kolejny termin</dt>
  <dd>Wyjaśnienie drugiego terminu</dd>
</dl>
```

Wynik:

```text
Termin
    Wyjaśnienie terminu

Kolejny termin
    Wyjaśnienie drugiego terminu
```

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

```text
• Europa
    • Polska
    • Niemcy

• Azja
    • Japonia
    • Chiny
```

---

# TABELE

### Tabela `<table>`, `<tr>`, `<th>`, `<td>`
```html
<table>
  <tr>
    <th>Komórka 1</th>
    <th>Komórka 2</th>
  </tr>
  <tr>
    <td>Komórka 3</td>
    <td>Komórka 4</td>
  </tr>
</table>
```

Wynik:

| Komórka 1 | Komórka 2 |
|-----------|-----------|
| Komórka 3 | Komórka 4 |

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

| Imię  | Wiek | Miasto   |
|--------|------|----------|
| Anna   | 28   | Warszawa |
| Piotr  | 34   | Kraków   |