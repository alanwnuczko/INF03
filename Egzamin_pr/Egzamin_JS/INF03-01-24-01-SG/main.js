function przeslij(){
    let imie = document.getElementById("inputImie").value;
    let nazwisko = document.getElementById("inputNazwisko").value;
    let email = document.getElementById("inputEmail").value;
    let zgloszenie = document.getElementById("inputZgloszenie").value;
    let paragrafWynik = document.getElementById("wynik");
    let imieWielkieLitery = imie.toUpperCase();
    let nazwiskoWielkieLitery = nazwisko.toUpperCase();

    if(document.getElementById("inputRegulamin").checked){
        paragrafWynik.style.color = "navy";
        paragrafWynik.innerHTML = `${imieWielkieLitery} ${nazwiskoWielkieLitery} <br>Treść twojej sprawy: ${zgloszenie}`;
        // paragrafWynik.innerHTML = `Treść twojej sprawy: ${zgloszenie}`;
    }
    else{
        paragrafWynik.style.color = "red";
        paragrafWynik.innerHTML = "Musisz zapoznać się z regulaminem";
    }
}