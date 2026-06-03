function wyslijWiadomosc(){
    let tekstWiadomosci = document.getElementById("inputWiadomosc").value;
    let blokChatu = document.getElementById("blokChatu");

    let wiadomosc = document.createElement("section");
    wiadomosc.id = "blokJolanta";
    wiadomosc.innerHTML = `<img src="Jolka.jpg" alt="Jolanta Nowak"><p>${tekstWiadomosci}</p>`;
    blokChatu.appendChild(wiadomosc);
    blokChatu.scrollTop = blokChatu.scrollHeight;
    document.getElementById("inputWiadomosc").value = "";

}

let tekstyDoChatu = [
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety"
];

function generujWiadomosc(){
    let tekstGenerowanejWiadomosci = tekstyDoChatu[Math.floor(Math.random() * tekstyDoChatu.length)];
    let blokChatu = document.getElementById("blokChatu");

    let wiadomosc = document.createElement("section");
    wiadomosc.id = "blokKrzysztof";
    wiadomosc.innerHTML = `<img src="Krzysiek.jpg" alt="Krzysztof Łukasiński"><p>${tekstGenerowanejWiadomosci}</p>`;
    blokChatu.appendChild(wiadomosc);
    blokChatu.scrollTop = blokChatu.scrollHeight;
}