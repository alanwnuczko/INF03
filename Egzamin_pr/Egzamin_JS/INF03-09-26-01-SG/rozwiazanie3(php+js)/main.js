function pokazKolor(){
    document.getElementById("sekcja1").style.display = "block";
    document.getElementById("sekcja2").style.display = "none";
    document.getElementById("sekcja3").style.display = "none";

    document.getElementById("buttonPokazKolor").style.backgroundColor = "salmon";
    document.getElementById("buttonPokazKsztalt").style.backgroundColor = "crimson";
    document.getElementById("buttonPokazWzor").style.backgroundColor = "crimson";
}

function pokazKsztalt(){
    document.getElementById("sekcja1").style.display = "none";
    document.getElementById("sekcja2").style.display = "block";
    document.getElementById("sekcja3").style.display = "none";
    
    document.getElementById("buttonPokazKolor").style.backgroundColor = "crimson";
    document.getElementById("buttonPokazKsztalt").style.backgroundColor = "salmon";
    document.getElementById("buttonPokazWzor").style.backgroundColor = "crimson";
}

function pokazWzor(){
    document.getElementById("sekcja1").style.display = "none";
    document.getElementById("sekcja2").style.display = "none";
    document.getElementById("sekcja3").style.display = "block";
    
    document.getElementById("buttonPokazKolor").style.backgroundColor = "crimson";
    document.getElementById("buttonPokazKsztalt").style.backgroundColor = "crimson";
    document.getElementById("buttonPokazWzor").style.backgroundColor = "salmon";
}