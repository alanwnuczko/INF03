function oblicz(){
        let wynik = document.getElementById("wynik");
        let cena = 0;

        if (document.getElementById('peeling').checked){
            cena = cena + 45;
        }

        if (document.getElementById('maska').checked){
            cena = cena + 30;
        }

        if (document.getElementById('masaz').checked){
            cena = cena + 20;
        }

        if (document.getElementById('makijaz').checked){
            cena = cena + 50;
        }

        wynik.innerHTML = "<p>Cena zabiegów: " + cena + "</p>";
    }