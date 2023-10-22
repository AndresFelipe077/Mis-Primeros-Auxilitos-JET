const slider = document.querySelector(".slider");
const slides = document.querySelectorAll(".slide");
const prevButton = document.querySelector(".prev-slide");
const nextButton = document.querySelector(".next-slide");
const slideIndicatorsContainer = document.querySelector(".slide-indicators");

let currentIndex = 0;

function updateSlider() {
  const translateX = currentIndex * -100;
  slider.style.transform = `translateX(${translateX}%)`;
}

function updateIndicators() {
  const indicators = Array.from(document.querySelectorAll(".slide-indicator"));
  indicators.forEach((indicator, index) => {
    if (index === currentIndex) {
      indicator.classList.add("active");
    } else {
      indicator.classList.remove("active");
    }
  });
}

function goToSlide(index) {
  currentIndex = index;
  updateSlider();
  updateIndicators();
}

prevButton.addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  updateSlider();
  updateIndicators();
});

nextButton.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % slides.length;
  updateSlider();
  updateIndicators();
});

slides.forEach((slide, index) => {
  const indicator = document.createElement("div");
  indicator.classList.add("slide-indicator");
  indicator.addEventListener("click", () => {
    goToSlide(index);
  });
  slideIndicatorsContainer.appendChild(indicator);
});

updateIndicators();

// Cambia automáticamente de diapositiva cada 5 segundos (ajusta el intervalo según tus necesidades)
setInterval(() => {
  currentIndex = (currentIndex + 1) % slides.length;
  updateSlider();
  updateIndicators();
}, 5000);


/*
============================================
INPUT DATE
============================================
*/
function cambiarTipo() {
  const fechaInput = document.getElementById("date");
  fechaInput.type = "date";
  fechaInput.removeEventListener("click", cambiarTipo);
}

// Añade un evento para volver a cambiar el tipo si el usuario sale del campo sin seleccionar una fecha
document.getElementById("date").addEventListener("blur", function() {
  this.type = "text";
});