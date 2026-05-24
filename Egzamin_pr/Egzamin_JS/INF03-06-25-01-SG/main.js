function binarny(){
    let liczbaDziesietna = parseInt(document.getElementById("liczba").value);

    if(liczbaDziesietna === 0){
        document.getElementById("wynik").innerHTML = "0";
    }

    let wynikBinarny = "";

    while(liczbaDziesietna > 0){
        wynikBinarny = (liczbaDziesietna % 2) + wynikBinarny;
        liczbaDziesietna = Math.floor(liczbaDziesietna / 2);
    }

    document.getElementById("wynik").innerHTML = wynikBinarny + "<sub>(2)</sub>";
}