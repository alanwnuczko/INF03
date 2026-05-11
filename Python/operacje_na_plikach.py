# Otwieranie pliku
plik1 = open("nazwa_pliku.txt")

# Wczytywanie pliku
read_content = plik1.read()

plik1.close

# Zapis do pliku
plik2 = open('plik2.txt', 'w')
plik2.write('Wpisane do pliku.')
plik2.close()
