let numerZdjecia = 1;

function poprzedniObraz(){
    numerZdjecia--;
    if(numerZdjecia < 1){
        numerZdjecia = 7;
        let nazwaZdjecia = `${numerZdjecia}.jpg`;
        document.getElementById("aktywneZdjecie").setAttribute("src", nazwaZdjecia);
    }
    else{
        let nazwaZdjecia = `${numerZdjecia}.jpg`;
        document.getElementById("aktywneZdjecie").setAttribute("src", nazwaZdjecia);
    }
}

function nastepnyObraz(){
    numerZdjecia++;
    if(numerZdjecia > 7){
        numerZdjecia = 1;
        let nazwaZdjecia = `${numerZdjecia}.jpg`;
        document.getElementById("aktywneZdjecie").setAttribute("src", nazwaZdjecia);
    }
    else{
        let nazwaZdjecia = `${numerZdjecia}.jpg`;
        document.getElementById("aktywneZdjecie").setAttribute("src", nazwaZdjecia);
    }
}