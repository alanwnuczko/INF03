function oblicz(){
    let rodzaj = document.getElementById('rodzaj').value;
    let litry = document.getElementById('litry').value;
    let koszt = 0;

    if(rodzaj == 1){
        koszt = litry * 4;
    }
    else if(rodzaj == 2){
        koszt == litry * 3.5;
    }
    document.getElementById('wynik').innerHTML = "koszt paliwa: " + koszt + " zł";
}