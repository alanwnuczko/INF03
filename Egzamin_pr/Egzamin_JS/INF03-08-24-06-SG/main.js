let licznik = 0;

function pokazKlient(){
    document.getElementById("sectionKlient").style.display = "block";
    document.getElementById("sectionAdres").style.display = "none";
    document.getElementById("sectionKontakt").style.display = "none";
}

function pokazAdres(){
    document.getElementById("sectionKlient").style.display = "none";
    document.getElementById("sectionAdres").style.display = "block";
    document.getElementById("sectionKontakt").style.display = "none";
}

function pokazKontakt(){
    document.getElementById("sectionKlient").style.display = "none";
    document.getElementById("sectionAdres").style.display = "none";
    document.getElementById("sectionKontakt").style.display = "block";
}

function aktualizujPostep(){
    licznik += 12;
    if(licznik > 100){
        licznik = 100;
    }

    document.getElementById("pasekPostepu").style.width = `${licznik}%`;
}

function zatwierdz(){
    let imie = document.getElementById("inputImie").value;
    let nazwisko = document.getElementById("inputNazwisko").value;
    let dataUrodzenia = document.getElementById("inputData").value;
    let ulica = document.getElementById("inputUlica").value;
    let numer = document.getElementById("inputNumer").value;
    let miasto = document.getElementById("inputMiasto").value;
    let telefon = document.getElementById("inputTelefon").value;
    let RODO = document.getElementById("inputRODO").value;

    console.log(`${imie}, ${nazwisko}, ${dataUrodzenia}, ${ulica}, ${numer}, ${miasto}, ${telefon}, ${RODO}`);
}