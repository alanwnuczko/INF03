const dodajDoKoszyka=()=>
{
    console.log(plik.files);


    const nazwaPliku=plik.files[0].name;
    const liczbaKopii=kopie.value;

    let cena = 0;
    if(radioPapierBlyszczacy.checked){
        cena = 1.5*liczbaKopii;
    }else{
        cena = 2*liczbaKopii;
    }

    const img = document.createElement("img");
    img.src = nazwaPliku;
    img.alt = "Obraz do sprzedaży";

    const akapitKopie = document.createElement("p");
    akapitKopie.innerText="Liczba kopii: "+liczbaKopii;

    const akapitCena = document.createElement("p");
    akapitCena.innerText="Cena: "+cena;

    wynik.appendChild(img);
    wynik.appendChild(akapitKopie);
    wynik.appendChild(akapitCena);
}