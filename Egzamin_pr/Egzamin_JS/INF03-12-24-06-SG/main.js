function efektPszczola(){
    if(document.getElementById("pszczolaBlur").checked){
        // filter: blur(10px);
        document.getElementById("imgPszczola").style.filter = "blur(5px)";
    }
    if(document.getElementById("pszczolaSepia").checked){
        document.getElementById("imgPszczola").style.filter = "sepia(100%)";
    }
    if(document.getElementById("pszczolaNegatyw").checked){
        document.getElementById("imgPszczola").style.filter = "invert(100%)";
    }
}

function efektPomaranczaKolor(){
    document.getElementById("imgPomarancza").style.filter = "grayscale(0%)";
}

function efektPomaranczaGrayscale(){
    document.getElementById("imgPomarancza").style.filter = "grayscale(100%)";
}

function efektOwoce(){
    let wartoscSuwakaOwoce = document.getElementById("owoceSuwak").value;
    document.getElementById("imgOwoce").style.filter = `opacity(${wartoscSuwakaOwoce}%)`;
}

function efektZolw(){
    let wartoscSuwakaZolw = document.getElementById("zolwSuwak").value;
    document.getElementById("imgZolw").style.filter = `brightness(${wartoscSuwakaZolw}%)`;
}