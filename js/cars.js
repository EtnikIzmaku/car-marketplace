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
    loginBtn.style.display = "inline";
}

logoutBtn.addEventListener("click", function (e) {
    e.preventDefault();
    localStorage.removeItem("isLoggedIn");
    alert("Logged out successfully");
    window.location.reload();
});

addCarLink.addEventListener("click", function (e) {
    if (isLoggedIn !== "true") {
        e.preventDefault();
        alert("You must be logged in to add a car.");
        window.location.href = "login.html";
    }
});

profileLink.addEventListener("click", function (e) {
    if (isLoggedIn !== "true") {
        e.preventDefault();
        alert("You must be logged in to view your profile.");
        window.location.href = "login.html";
    }
});