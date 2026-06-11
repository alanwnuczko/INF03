document.getElementById("buttonUczestnik").style.backgroundColor = "DodgerBlue";

function uczestnik(){
    document.getElementById("buttonUczestnik").style.backgroundColor = "DodgerBlue";
    document.getElementById("buttonRezerwacja").style.backgroundColor = "SkyBlue";
    document.getElementById("inputOsob").disabled = true;
    document.getElementById("listaWylot").disabled = true;
    document.getElementById("radioSniadania").disabled = true;
    document.getElementById("radioSniadaniaObiadokolacje").disabled = true;
    document.getElementById("radioAllInclusive").disabled = true;

    document.getElementById("inputImie").disabled = false;
    document.getElementById("inputNazwisko").disabled = false;
}

function rezerwacja(){
    document.getElementById("buttonUczestnik").style.backgroundColor = "SkyBlue";
    document.getElementById("buttonRezerwacja").style.backgroundColor = "DodgerBlue";
    document.getElementById("inputOsob").disabled = false;
    document.getElementById("listaWylot").disabled = false;
    document.getElementById("radioSniadania").disabled = false;
    document.getElementById("radioSniadaniaObiadokolacje").disabled = false;
    document.getElementById("radioAllInclusive").disabled = false;

    document.getElementById("inputImie").disabled = true;
    document.getElementById("inputNazwisko").disabled = true;
}

let i = 1;

function poprzedniObraz(){
    i--;
    if(i < 1){
        i = 3;
    }
    document.getElementById("obrazMiejsca").src = `${i}.jpg`;
}

function nastepnyObraz(){
    i++;
    if(i > 3){
        i = 1;
    }
    document.getElementById("obrazMiejsca").src = `${i}.jpg`;
}