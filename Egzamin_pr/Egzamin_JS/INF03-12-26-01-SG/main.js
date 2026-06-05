function dodajWzor(){
    let plikZeSciezka = document.getElementById("inputPlik").value;
    let nazwaPliku = plikZeSciezka.substr(12, 999);
    let kolor = document.getElementById("inputKolor").value;
    let cena = document.getElementById("inputCena").value;

    alert(`Wzór: ${nazwaPliku}, kolor ${kolor} w cenie ${cena} zł`);


    let img = document.createElement("img");
    img.className = "miniatury";
    img.src = nazwaPliku;
    img.alt = nazwaPliku;

    document.getElementById("sectionGaleria").appendChild(img);
}