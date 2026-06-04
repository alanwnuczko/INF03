function dodajDoKoszyka(){
    const cenaBlyszczacy = 1.5;
    const cenaMatowy = 2;

    let nazwaPliku = document.getElementById("inputPlik").files[0].name;
    let liczbaKopii = document.getElementById("inputLiczbaKopii").value;
    let papierBlyszczacy = document.getElementById("inputRodzajBlyszczacy");
    let papierMatowy = document.getElementById("inputRodzajMatowy");

    if(papierBlyszczacy.checked){
        let cena = liczbaKopii * cenaBlyszczacy;
        let listaKoszyk = document.createElement("li");
        listaKoszyk.className = "elementListyWynik";
        listaKoszyk.innerHTML = `<img src="${nazwaPliku}"><div><p>Liczba kopii: ${liczbaKopii}</p><p>Cena: ${cena}</p></div>`;
        document.getElementById("wynik").appendChild(listaKoszyk);
    }
    if(papierMatowy.checked){
        let cena = liczbaKopii * cenaMatowy;
        let listaKoszyk = document.createElement("li");
        listaKoszyk.className = "elementListyWynik";
        listaKoszyk.innerHTML = `<img src="${nazwaPliku}"><div><p>Liczba kopii: ${liczbaKopii}</p><p>Cena: ${cena}</p></div>`;
        document.getElementById("wynik").appendChild(listaKoszyk);
    }
}