function oblicz(){
    let szerokosc = document.getElementById("szerokosc").value;
    let dlugosc = document.getElementById("dlugosc").value;
    let typ = document.getElementsByName("typ").checked;
    const wynik = document.getElementById("wynik");

    let paneleLaminowane = document.getElementById("laminowane").checked;
    let paneleWinylowe = document.getElementById("winylowe").checked;
    let deskaPodlogowa = document.getElementById("podlogowa").checked;

    const cenaLaminowany = 12;
    const cenaWinylowy = 14;
    const cenaPodlogowa = 18;

    let polePowierzchni = szerokosc * dlugosc;


    if(szerokosc === '' || dlugosc === '' || paneleLaminowane === false && paneleWinylowe === false && deskaPodlogowa === false){
        wynik.innerHTML = "Wprowadź poprawne dane";
    }
    else{
        if(paneleLaminowane === true){
            let koszt = polePowierzchni * cenaLaminowany;
            wynik.innerHTML = `Pole powierzchni pomieszczenia: ${polePowierzchni}, koszt montażu ${koszt}`;
        }
        else{
            if(paneleWinylowe === true){
                let koszt = polePowierzchni * cenaWinylowy;
                wynik.innerHTML = `Pole powierzchni pomieszczenia: ${polePowierzchni}, koszt montażu ${koszt}`;
            }
            else{
                let koszt = polePowierzchni * cenaPodlogowa;
                wynik.innerHTML = `Pole powierzchni pomieszczenia: ${polePowierzchni}, koszt montażu ${koszt}`;
            }
        }
    }
}