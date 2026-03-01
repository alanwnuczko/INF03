let zdjecieIndex = 1;
const zdjecia = 7;

function poprzednie()
{
    zdjecieIndex--;
    if(zdjecieIndex < 1)
    {
        zdjecieIndex = zdjecia;
    }
    aktualizuj();
}


function nastepne()
{
    zdjecieIndex++;
    if (zdjecieIndex > zdjecia)
    {
        zdjecieIndex = 1;
    }
    aktualizuj();
}

function aktualizuj()
{
    const zdjecieElement = document.querySelector("#middle img");
    zdjecieElement.src = zdjecieIndex + ".jpg";
}