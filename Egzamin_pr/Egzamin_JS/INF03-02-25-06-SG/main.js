const listaZadan = document.querySelector('main ul');
const poleZadania = document.querySelector('#zadanie');
const przyciskDodaj = document.querySelector('nav button');

function wykonane(btn) {
    const li = btn.closest('li');
    if (li) {
        li.style.textDecoration = 'line-through';
    }
}

function dodajZadanie() {
    const trescZadania = poleZadania.value.trim();

    if (!trescZadania) {
        return;
    }

    const nowyElement = document.createElement('li');
    nowyElement.textContent = trescZadania + ' ';

    const nowyPrzycisk = document.createElement('button');
    nowyPrzycisk.type = 'button';
    nowyPrzycisk.textContent = 'Wykonane';
    nowyPrzycisk.setAttribute('onclick', 'wykonane(this)');

    nowyElement.appendChild(nowyPrzycisk);
    listaZadan.appendChild(nowyElement);

    poleZadania.value = '';
}

przyciskDodaj.addEventListener('click', dodajZadanie);