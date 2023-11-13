let currentSlide = 0;

  function showSlide(index) {
    const slides = document.querySelector('.slides');
    const slideWidth = document.querySelector('.slide').offsetWidth;

    currentSlide = index;
    slides.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
  }

  function nextSlide() {
    const totalSlides = document.querySelectorAll('.slide').length;
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
  }

  function prevSlide() {
    const totalSlides = document.querySelectorAll('.slide').length;
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
  }