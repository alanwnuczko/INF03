const zastosuj=()=>{
        if(blu.checked)
        {
            obraz1.style.filter="blur(8px)";
        }
        if(sepia.checked)
        {
            obraz1.style.filter="sepia(100%)";
        }
        if(negatyw.checked)
        {
            obraz1.style.filter="invert(100%)";
        }
    }

    const czarnoBialy=()=>{
        obraz2.style.filter="grayscale(100%)";
    }

    const kolor=()=>{
        obraz2.style.filter="none";
    }

    const przezroczystosc=()=>{
        obraz3.style.filter="opacity("+suwak1.value+"%)";
    }

    const jasnosc=()=>{
        obraz4.style.filter="brightness("+suwak2.value+"%)";
    }