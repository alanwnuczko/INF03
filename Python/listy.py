# 1
imiona = ["Ala", "Ola", "Ela"]
imiona.append("Ula") # Dodaje na koncu
imiona.insert(0, "Basia") # Dodaje w miejscu liczby 0 = 1 pozycja 1 = 2 pozycja itd
imiona.remove("Ola") # Usuwa czesc listy
print(imiona) # Pokazuje liste

# 2
oceny = [3,4,5,3,2,5,3]
print(oceny.count(3)) # Pokazuje ilosc # w tym przypadku 3
print(oceny.index(5)) # Zwraca pozycje pierwszego # w liscie w tym przypadku 2 czyli 3 pozycja

#3
liczby = [7,2,9,1]
liczby.sort() # Sortuje liste rosnaco
print(liczby)
liczby.reverse() # Sortuje liste malejaco
print(liczby)

#4 
zakupy = ["chleb", "masło", "mleko"]
zakupy.clear() # Czysci liste
print(zakupy)

#5
kwadraty = [x**2 for x in range (1,11)] # Mnoży każdą liczbe przez 2 i zwraca wynik
print(kwadraty)

#6
Liczby = [1,2,3,4,5,6]
parzyste = [x for x in Liczby if x % 2 == 0] # Sprawdza ktore liczby sa parzyste
print(parzyste)
