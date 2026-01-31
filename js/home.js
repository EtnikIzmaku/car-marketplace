function searchCars() {
    const brandEl = document.getElementById("brand");
    const modelEl = document.getElementById("model");
    const priceEl = document.getElementById("price");

    const brand = brandEl ? brandEl.value : '';
    const model = modelEl ? modelEl.value : '';
    const price = priceEl ? priceEl.value : '';

    alert(
        "Search values:\n" +
        "Brand: " + brand + "\n" +
        "Model: " + model + "\n" +
        "Max Price: " + price
    );
}

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
