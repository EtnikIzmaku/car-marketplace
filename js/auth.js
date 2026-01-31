
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const nameRegex = /^[A-Za-z\s]{3,}$/;
const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/;

const loginForm = document.getElementById("loginForm");

if (loginForm) {
  loginForm.addEventListener("submit", function (e) {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!emailRegex.test(email)) {
      alert("Email format jo valid");
      e.preventDefault();
      return;
    }

    if (!passwordRegex.test(password)) {
      alert("Password duhet të ketë minimum 8 karaktere, të paktën 1 shkronjë dhe 1 numër");
      e.preventDefault();
      return;
    }
  });
}

const registerForm = document.getElementById("registerForm");

if (registerForm) {
  registerForm.addEventListener("submit", function (e) {
    const fullName = document.getElementById("fullName").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();

    if (!nameRegex.test(fullName)) {
      alert("Emri duhet të ketë minimum 3 shkronja");
      e.preventDefault();
      return;
    }

    if (!emailRegex.test(email)) {
      alert("Email jo valid");
      e.preventDefault();
      return;
    }

    if (!passwordRegex.test(password)) {
      alert("Password duhet të ketë minimum 8 karaktere, të paktën 1 shkronjë dhe 1 numër");
      e.preventDefault();
      return;
    }

    if (password !== confirmPassword) {
      alert("Passwordet nuk përputhen");
      e.preventDefault();
      return;
    }
  });
}