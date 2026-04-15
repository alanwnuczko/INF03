const identyfikatorySekcji = ['baza', 'opisy', 'galeria'];
const activeColor = 'mistyrose';
const nonActiveColor = '#FFAEA5';

function pokazSekcje(aktywna) {
    identyfikatorySekcji.forEach((id) => {
        document.getElementById('nav' + id).style.backgroundColor = id === aktywna ? activeColor : nonActiveColor;
        document.getElementById(id).style.display = id === aktywna ? 'block' : 'none';
    });
}