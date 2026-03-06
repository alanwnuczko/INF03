const odpowiedzi = [
"Świetnie!",
"Kto gra główną rolę?",
"Lubisz filmy Tego reżysera?",
"Będę 10 minut wcześniej",
"Może kupimy sobie popcorn?",
"Ja wolę Colę",
"Zaproszę jeszcze Grześka",
"Tydzień temu też byłem w kinie na Diunie",
"Ja funduję bilety"
];

function wyslij()
{
    const messageInput = document.getElementById('wiadomosc');
    const chat = document.getElementById('chat');

    const jolkaDiv = document.createElement('div');
    jolkaDiv.classList.add('jolka');

    const jolkaimg = document.createElement('img');
    jolkaimg.src='Jolka.jpg';
    jolkaimg.alt='Jolanta Nowak';

    const jolkaP = document.createElement('p');
    jolkaP.textContent = messageInput.value;

    jolkaDiv.appendChild(jolkaimg);
    jolkaDiv.appendChild(jolkaP);
    chat.appendChild(jolkaDiv);

    chat.scrollTop = chat.scrollHeight;

    messageInput.value = '';
}

function generuj()
{
    const randomIndex = Math.floor(Math.random()*odpowiedzi.length);
    const randomResponse = odpowiedzi[randomIndex];
    const chat = document.getElementById('chat');

    const krzysiekDiv = document.createElement('div');
    krzysiekDiv.classList.add('krzysiek');

    const krzysiekimg = document.createElement('img');
    krzysiekimg.src = 'Krzysiek.jpg';
    krzysiekimg.alt = 'Krzysztof Łukasiński';

    const krzysiekP = document.createElement('p');
    krzysiekP.textContent = randomResponse;

    krzysiekDiv.appendChild(krzysiekimg);
    krzysiekDiv.appendChild(krzysiekP);
    chat.appendChild(krzysiekDiv);

    chat.scrollTop = chat.scrollHeight;

}