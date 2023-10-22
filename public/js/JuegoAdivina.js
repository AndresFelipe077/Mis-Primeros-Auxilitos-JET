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
let isChecking = false;

listFruit.forEach((fruit) => {
    templateHTML += `
    <div class="card">
        <div class="sides front"></div>
        <div class="sides back">${fruit}</div>
    </div>
    `;
});

app.innerHTML = templateHTML;

app.addEventListener('click', (e) => {
    let value = e.target.matches('.front');

    if (value && ArrayCard.length < 2 && !isChecking) {
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
    if (ArrayCard.length === 2) {
        isChecking = true;
        if (ArrayFruit[0] === ArrayFruit[1]) {
            ArrayCard = [];
            ArrayFruit = [];
            isChecking = false;

            if (app.querySelectorAll('.rotate').length === listFruit.length) {
                const modal = document.getElementById('myModal');
                modal.style.display = 'block';
            }
        } else {
            setTimeout(() => {
                ArrayCard[0].classList.remove('rotate');
                ArrayCard[1].classList.remove('rotate');
                ArrayCard = [];
                ArrayFruit = [];
                isChecking = false;
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

// Evento para cerrar el modal
const closeModalButton = document.getElementById('closeModal');
const modal = document.getElementById('myModal');
closeModalButton.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Evento para cerrar el modal haciendo clic fuera del mismo
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});

