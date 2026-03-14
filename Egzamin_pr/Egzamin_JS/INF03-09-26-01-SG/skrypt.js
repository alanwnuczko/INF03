//Skrypt1:
const res = document.getElementById("res");

let html = '';

for(let i = 1; i <= 10; i++){
    html += `<img src="${i}.jpg" class="wzory" alt="${i}">`
    }
    res.innerHTML = html;


//Skrypt2:
function changeTab(nazwaZakladki) {
    
    const s1 = document.getElementById('s1')
    const s2 = document.getElementById('s2')
    const s3 = document.getElementById('s3')
    
    const p1 = document.getElementById('p1')
    const p2 = document.getElementById('p2')
    const p3 = document.getElementById('p3')

    if(nazwaZakladki == 'kolor'){
        s1.style.display = 'block';
        s2.style.display = 'none';
        s3.style.display = 'none';

        p1.style.backgroundColor = 'salmon';
        p2.style.backgroundColor = 'Crimson';
        p3.style.backgroundColor = 'Crimson';
    }

    if(nazwaZakladki == 'ksztalt'){
        s1.style.display = 'none';
        s2.style.display = 'block';
        s3.style.display = 'none';

        p1.style.backgroundColor = 'Crimson';
        p2.style.backgroundColor = 'salmon';
        p3.style.backgroundColor = 'Crimson';
    }

    if(nazwaZakladki == 'wzor'){
        s1.style.display = 'none';
        s2.style.display = 'none';
        s3.style.display = 'block';

        p1.style.backgroundColor = 'Crimson';
        p2.style.backgroundColor = 'Crimson';
        p3.style.backgroundColor = 'salmon';
    }
}
