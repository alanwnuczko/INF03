# Zadanie 1 - Tekst

def powitaj():
    print("Witaj w swiecie pythona")

# Zadanie 2 - Pole kwadratu
def pole_kwadratu(a):
    return a * a

# Zadanie 3 - Średnia
def srednia(a, b, c):
    return (a + b + c) / 3

# Zadanie 4 - Czy liczba jest parzysta
def czy_parzysta(n):
    return n % 2 == 0

# Zadanie 5 - Liczba samogłosek
def licz_samogloski(tekst):
    samogloski = "aeiouAEIOUąęóĄĘÓ"
    return sum(1 for znak in tekst if znak in samogloski)

# Wywolania do funkcji

powitaj()
print(pole_kwadratu(5))
print(srednia(5, 5, 5))
print(czy_parzysta(5))
print(licz_samogloski("Python"))
