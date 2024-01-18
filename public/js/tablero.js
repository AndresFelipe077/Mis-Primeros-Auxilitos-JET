const mainCanvas = document.getElementById("main-canvas");
const context = mainCanvas.getContext("2d");
const resetCanvas = () => {
    context.clearRect(0, 0, mainCanvas.width, mainCanvas.height); // Borra todo el contenido del lienzo
};

// Puedes llamar a esta función cuando desees reiniciar el dibujo, por ejemplo, al hacer clic en un botón "Reiniciar".
const resetButton = document.getElementById("reset-button"); // Asigna el botón de reinicio (necesitas tener un botón con el id "reset-button" en tu HTML)
resetButton.addEventListener("click", resetCanvas);

let initialX;
let initialY;
let selectedColor = "#000"; // Color de trazo inicial

const colorPicker = document.getElementById("color-picker");
colorPicker.addEventListener("input", (evt) => {
    selectedColor = evt.target.value;
});

const dibujar = (cursorX, cursorY) => {
    context.beginPath();
    context.moveTo(initialX, initialY);
    context.lineWidth = 5;
    context.strokeStyle = selectedColor; // Usar el color seleccionado
    context.lineCap = "round";
    context.lineJoin = "round";
    context.lineTo(cursorX, cursorY);
    context.stroke();
    initialX = cursorX;
    initialY = cursorY;
};

const mouseDown = (evt) => {
    initialX = evt.offsetX;
    initialY = evt.offsetY;
    dibujar(initialX, initialY);
    mainCanvas.addEventListener("mousemove", mouseMoving);
};

const mouseMoving = (evt) => {
    dibujar(evt.offsetX, evt.offsetY);
};

const mouseUp = () => {
    mainCanvas.removeEventListener("mousemove", mouseMoving);
};

mainCanvas.addEventListener("mousedown", mouseDown);
mainCanvas.addEventListener("mouseup", mouseUp);

