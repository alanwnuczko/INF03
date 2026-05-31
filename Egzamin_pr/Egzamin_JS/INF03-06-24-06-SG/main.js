function nastepnaKarta1(){
    if(document.getElementById("formularzImie").value !== "" && document.getElementById("formularzNazwisko").value !== ""){
        imie = document.getElementById("formularzImie").value;
        nazwisko = document.getElementById("formularzNazwisko").value;
        document.getElementById("daneOsobowe").style.visibility = "hidden";
        document.getElementById("daneKontaktowe").style.visibility = "visible";
        document.getElementById("hasloLogowania").style.visibility = "hidden";
    }
}

function nastepnaKarta2(){
    if(document.getElementById("formularzEmail").value !== "" && document.getElementById("formularzTelefon").value !== ""){
        email = document.getElementById("formularzEmail").value;
        telefon = document.getElementById("formularzTelefon").value;
        document.getElementById("daneOsobowe").style.visibility = "hidden";
        document.getElementById("daneKontaktowe").style.visibility = "hidden";
        document.getElementById("hasloLogowania").style.visibility = "visible";
    }
}

function zatwierdz(){
    if(document.getElementById("formularzHaslo").value !== "" && document.getElementById("formularzPowtorzHaslo").value !== ""){
        haslo1 = document.getElementById("formularzHaslo").value;
        haslo2 = document.getElementById("formularzPowtorzHaslo").value;
        if(haslo1 !== haslo2){
            alert("Podane hasła różnią się");
        }
        else{
            console.log(`Witaj ${imie} ${nazwisko}`);
        }
    }
}