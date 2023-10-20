document.addEventListener('DOMContentLoaded', function() {
    // Llama a la función ramdon() cuando se carga la página
    ramdon();
});

const app = document.getElementById('app');
let templateHTML = '';
let ArrayCard = [];
let ArrayFruit = [];
const btn = document.getElementById('btn');
let listFruit = ['💉', '👸', '🚑', '⛑️', '🚑', '🏥', '💉', '👨‍⚕️', '👨‍⚕️', '⛑️', '👸', '🏥'];
let count = 0;
let isChecking = false; // Nueva variable para rastrear la comprobación
console.log(ArrayCard.length);
listFruit.forEach((fruit) => (
    templateHTML += `
    <div class="card">
        <div class="sides front"></div>
        <div class="sides back">${fruit}</div>
    </div>
    `
));

app.innerHTML = templateHTML;

app.addEventListener('click', (e) => {
    let value = e.target.matches('.front');

    if (value && ArrayCard.length < 2 && !isChecking) { // Evitar abrir más de dos cartas y comprobar durante la verificación
        if (count < 2) {
            let ElementCard = e.target.parentElement;
            let fruit = ElementCard.children[1].textContent;

            ElementCard.classList.add('rotate');
            ArrayCard = [...ArrayCard, ElementCard];
            ArrayFruit = [...ArrayFruit, fruit];

            VerificationsCards();
        }
    }
});

const VerificationsCards = () => {
    if (ArrayCard.length === 2) { // Verificar después de abrir dos cartas
        isChecking = true; // Iniciar la comprobación
        if (ArrayFruit[0] === ArrayFruit[1]) {
            ArrayCard = [];
            ArrayFruit = [];
            isChecking = false; // Finalizar la comprobación
        } else {
            setTimeout(() => {
                ArrayCard[0].classList.remove('rotate');
                ArrayCard[1].classList.remove('rotate');
                ArrayCard = [];
                ArrayFruit = [];
                isChecking = false; // Finalizar la comprobación
            }, 800);
        }
    }
};

const ramdon = () => {
    for (let index = app.children.length; index >= 0; index--) {
        app.appendChild(app.children[(Math.random() * index) | 0]);
    }
};

const cards = document.querySelectorAll('.card');

btn.addEventListener('click', () => {
    ramdon();

    for (let index of cards) {
        index.classList.remove('rotate');
    }
});
