function noweZadanie(){
    let nazwaZadania = document.getElementById("dodajZadanie").value;
    const elementListy = document.createElement("li");
    elementListy.innerHTML = nazwaZadania + "<button onclick='usunZadanie(this)' class='przyciskLista'>Wykonane</button>";
    document.getElementById("listaZadan").appendChild(elementListy);

}

function usunZadanie(button){
    button.parentElement.style.textDecoration = "line-through";
}