const identyfikatoryNawigacji = ['navBaza', 'navOpisy', 'navGaleria'];
const identyfikatorySekcji = ['baza', 'opisy', 'galeria'];
const activeColor = 'mistyrose';
const nonActiveColor = '#FFAEA5';

function functionBaza(){
    identyfikatoryNawigacji.forEach((id) =>{
        const block = document.getElementById(id);

        if(block){
            block.style.backgroundColor = id === 'navBaza' ? activeColor : nonActiveColor;
        }
    });

    identyfikatorySekcji.forEach((id) =>{
        const sekcja = document.getElementById(id);

        if(sekcja){
            sekcja.style.display = id === 'baza' ? 'block' : 'none';
        }
    });

}

function functionOpisy(){
    identyfikatoryNawigacji.forEach((id) =>{
        const block = document.getElementById(id);

        if(block){
            block.style.backgroundColor = id === 'navOpisy' ? activeColor : nonActiveColor;
        }
    });

    identyfikatorySekcji.forEach((id) =>{
        const sekcja = document.getElementById(id);

        if(sekcja){
            sekcja.style.display = id === 'opisy' ? 'block' : 'none';
        }
    });
}

function functionGaleria(){
    identyfikatoryNawigacji.forEach((id) =>{
        const block = document.getElementById(id);

        if(block){
            block.style.backgroundColor = id === 'navGaleria' ? activeColor : nonActiveColor;
        }
    });

    identyfikatorySekcji.forEach((id) =>{
        const sekcja = document.getElementById(id);

        if(sekcja){
            sekcja.style.display = id === 'galeria' ? 'block' : 'none';
        }
    });
}