// JS Slide
let currentSlide = 0;
const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slide').length;

function moveSlide(n) {
    currentSlide += n;
    if (currentSlide >= totalSlides) {
        currentSlide = 0;
    } else if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
    }
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
}

function autoSlide() {
    moveSlide(1);
}

setInterval(autoSlide, 3000);
//  JS Dropdown Dropdown
const navToggler = document.getElementById('navToggler');
const navbarNav = document.getElementById('navbarNav');

navToggler.addEventListener('click', () => {
    navbarNav.classList.toggle('show'); // Toggle the 'show' class
});

// JS price range
const priceRange = document.getElementById('priceRange');
const minPrice = document.getElementById('minPrice');
const maxPrice = document.getElementById('maxPrice');

priceRange.addEventListener('input', function () {
    minPrice.textContent = priceRange.value;
    maxPrice.textContent = 1000 - priceRange.value;
});
