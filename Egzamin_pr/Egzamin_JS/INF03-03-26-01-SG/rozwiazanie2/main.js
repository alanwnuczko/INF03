function kliknieto1m(){
    document.getElementById("duzyObraz").src = "1d.bmp";
}

function kliknieto2m(){
    document.getElementById("duzyObraz").src = "2d.bmp";

}

function oblicz(){
    if(duzyObraz.getAttribute("src") === "1d.bmp"){
        // document.getElementById("wynik").innerHTML = "Trojkąt";
        let input1 = document.getElementById("input1").value; // a
        let input2 = document.getElementById("input2").value; // h
        let pole = input1 * input2 / 2;

        document.getElementById("wynik").innerHTML = `${pole}`;
    }
    else{
        let input1 = document.getElementById("input1").value; // a
        let input2 = document.getElementById("input2").value; // b
        let pole = input1 * input2;

        document.getElementById("wynik").innerHTML = `${pole}`;
        
    }
}