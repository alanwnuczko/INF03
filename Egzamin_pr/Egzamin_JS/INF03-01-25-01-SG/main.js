function oblicz(){
    let cena = 0;
    let miasto = document.getElementById("miasto").value;
    let liczbaRat = document.getElementById("liczbaRat").value;
    const wynik = document.getElementById("wynik");
    const react = document.getElementById("react");
    const javascript = document.getElementById("javascript");

    if(react.checked){
        cena += 5000;
    }
    if(javascript.checked){
        cena += 3000;
    }

    let cenaRaty = parseInt(cena / liczbaRat);

    wynik.textContent = `Kurs odbędzie się w ${miasto}. Koszt calkowity: ${cena} zł. Płacisz ${liczbaRat} rat po ${cenaRaty} zł`;
}


