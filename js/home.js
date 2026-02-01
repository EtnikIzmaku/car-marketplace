// funksionaliteti i sliderit
const slides = document.querySelectorAll("#carSlider img");
let currentSlide = 0;

function showSlide(index) {
    if (!slides || slides.length === 0) return;
    slides.forEach(slide => slide.classList.remove("active"));
    slides[index].classList.add("active");
}

if (slides && slides.length > 0) {
    showSlide(0);
    if (slides.length > 1) {
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }, 3500); // nderron slided pas 3.5 sekondave
    }
}
