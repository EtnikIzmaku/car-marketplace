const loginForm = document.getElementById("loginForm");

if (loginForm) {
  loginForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Validon email
    if (email === "") {
      alert("Email cannot be empty!");
      return;
    }

    // Validon password 
    if (password.length < 6) {
      alert("Password must be at least 6 characters long!");
      return;
    }

    // ruan login state dhe ben redirect
    localStorage.setItem("isLoggedIn", "true");
    localStorage.setItem("redirectToHome", "true");

    alert("Login successful!");

    window.location.href = "index.html";
  });
}

const registerForm = document.getElementById("registerForm");

if (registerForm) {
  registerForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const fullName = document.getElementById("fullName").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();

    if (fullName === "" || email === "" || password === "" || confirmPassword === "") {
      alert("All fields are required!");
      return;
    }

    if (password.length < 6) {
      alert("Password must be at least 6 characters long!");
      return;
    }

    if (password !== confirmPassword) {
      alert("Passwords do not match!");
      return;
    }

    alert("Registration successful!");
    window.location.href = "login.html";
  });
}
