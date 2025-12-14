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

logoutBtn.addEventListener("click", () => {
    localStorage.removeItem("isLoggedIn");
    alert("Logged out successfully");
    window.location.reload();
});

addCarLink.addEventListener("click", (e) => {
    if (isLoggedIn !== "true") {
        e.preventDefault();
        alert("You must be logged in to add a car.");
        window.location.href = "../login.html";
    }
});