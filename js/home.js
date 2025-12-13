// shikon nese eshte bere login
const isLoggedIn = localStorage.getItem("isLoggedIn");

const logoutBtn = document.getElementById("logoutBtn");
const loginBtn = document.getElementById("loginBtn");
const addCarLink = document.getElementById("addCarLink");
const profileLink = document.getElementById("profileLink");

if (isLoggedIn === "true") {
    logoutBtn.style.display = "inline";
    loginBtn.style.display = "none";
} else {
    logoutBtn.style.display = "none";
    profileLink.style.display = "none";
}

// funksionaliteti kur user behet logout
logoutBtn.addEventListener("click", function () {
    localStorage.removeItem("isLoggedIn");
    alert("Logged out successfully");
    window.location.reload();
});

// user duhet te jete login per te shtuar nje veture
addCarLink.addEventListener("click", function (e) {
    if (isLoggedIn !== "true") {
        e.preventDefault();
        alert("You must be logged in to add a car.");
        window.location.href = "login.html";
    }
});
// 
function searchCars() {
    const brand = document.getElementById("brand").value;
    const model = document.getElementById("model").value;
    const price = document.getElementById("price").value;

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
    slides.forEach(slide => slide.classList.remove("active"));
    slides[index].classList.add("active");
}

setInterval(() => {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}, 3500); // nderron slided pas 3.5 sekondave
