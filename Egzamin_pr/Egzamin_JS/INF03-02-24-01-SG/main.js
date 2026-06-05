function wyslij(){
    let imie = document.getElementById("inputImie").value;
    let nazwisko = document.getElementById("inputNazwisko").value;
    let email = document.getElementById("inputEmail").value;
    let emailLowerCase = email.toLowerCase();
    let usluga = document.getElementById("selectZgloszenie").value;

    const paragrafWynik = document.getElementById("wynik");

    paragrafWynik.innerHTML = `${imie} ${nazwisko}<br>${emailLowerCase}<br>Usługa: ${usluga}`;
}