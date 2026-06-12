let gracz = "kolko";

function wybrano(obraz){
    if(obraz.src.includes("nic.png")){
        if(gracz === "kolko"){
            obraz.src = "o.png";
            document.getElementById("left").style.visibility = "hidden";
            document.getElementById("right").style.visibility = "visible";
            gracz = "krzyzyk";
        }

        else if(gracz === "krzyzyk"){
            obraz.src = "x.png";
            document.getElementById("left").style.visibility = "visible";
            document.getElementById("right").style.visibility = "hidden";
            gracz = "kolko";
        }

    }
}