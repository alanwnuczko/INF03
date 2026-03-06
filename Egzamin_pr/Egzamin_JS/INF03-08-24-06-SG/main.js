function aktywujZakladke(zakladkaId){
    document.getElementById('mainKlient').style.display = 'none';
    document.getElementById('mainAdres').style.display = 'none';
    document.getElementById('mainKontakt').style.display = 'none';

    document.getElementById(zakladkaId).style.display = 'block';
}

function klient(){
    aktywujZakladke('mainKlient');
}
function adres(){
    aktywujZakladke('mainAdres');
}
function kontakt(){
    aktywujZakladke('mainKontakt');
}

let postep = 0;

function updatePostep(){
    if(postep < 100){
        postep += 12;
    
    if(postep > 100){
        postep = 100;
    }
        document.querySelector('#postep > div').style.width = postep + '%';
    }
}

document.querySelectorAll('input[type="text"], input[type="date"], input[type="number"], input[type="tel"]').forEach(function (input){
    input.addEventListener('blur', updatePostep);
});

function zatwierdz(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;
    let data = document.getElementById('data_u').value;
    let ulica = document.getElementById('ulica').value;
    let numer = document.getElementById('numer').value;
    let miasto = document.getElementById('miasto').value;
    let tel = document.getElementById('telefon').value;
    let rodo = document.getElementById('rodo').checked;

    console.log(imie + ", " + nazwisko + ", " + data + ", " + ulica + ", " + numer + ", " + miasto + ", " + tel + ", " + rodo);
}