// let wybranoBaza = document.getElementById("navBaza");

function navBaza(){
    // document.getElementById("Baza").style.color = "indigo";
    document.getElementById("Baza").style.backgroundColor = "mistyrose";
    document.getElementById("Opisy").style.backgroundColor = "#FFAEA5";
    document.getElementById("Galeria").style.backgroundColor = "#FFAEA5";
    document.getElementById("section1").style.display = "block";
    document.getElementById("section2").style.display = "none";
    document.getElementById("section3").style.display = "none";
}

function navOpisy(){
    // document.getElementById("Opisy").style.color = "indigo";
    document.getElementById("Baza").style.backgroundColor = "#FFAEA5";
    document.getElementById("Opisy").style.backgroundColor = "mistyrose";
    document.getElementById("Galeria").style.backgroundColor = "#FFAEA5";
    document.getElementById("section1").style.display = "none";
    document.getElementById("section2").style.display = "block";
    document.getElementById("section3").style.display = "none";
}

function navGaleria(){
    // document.getElementById("Galeria").style.color = "indigo";
    document.getElementById("Baza").style.backgroundColor = "#FFAEA5";
    document.getElementById("Opisy").style.backgroundColor = "#FFAEA5";
    document.getElementById("Galeria").style.backgroundColor = "mistyrose";
    document.getElementById("section1").style.display = "none";
    document.getElementById("section2").style.display = "none";
    document.getElementById("section3").style.display = "block";
}