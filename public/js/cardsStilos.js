const smallImage = document.getElementById('movable-image');
const largeImage = document.getElementById('large-image');
const container1 = document.getElementById('container-1');
const container2 = document.getElementById('container-2');
let isLarge = false;

function moveImageRandomly() {
    const maxX = window.innerWidth - smallImage.clientWidth;
    const maxY = window.innerHeight - smallImage.clientHeight;

    const randomX = Math.random() * maxX;
    const randomY = Math.random() * maxY;

    container1.style.left = randomX + 'px';
    container1.style.top = randomY + 'px';

    if (isLarge) {
        smallImage.style.transform = 'scale(1)';
        smallImage.style.opacity = 1;
        largeImage.style.display = 'none';
        isLarge = false;
    }
}

function toggleImageSize(event) {
    const x = event.clientX - 100;
    const y = event.clientY - 200; // Ajusta el valor para posicionar la imagen más arriba.

    smallImage.style.transform = 'scale(2)';
    smallImage.style.opacity = 0;

    container2.style.left = x + 'px';
    container2.style.top = y + 'px';
    largeImage.style.display = 'block';

    isLarge = true;
}

smallImage.addEventListener('click', toggleImageSize);

// Llama a la función para mover la imagen aleatoriamente cada cierto intervalo de tiempo.
setInterval(moveImageRandomly, 3000); // Cambia 3000 a la cantidad de milisegundos que desees entre movimientos.