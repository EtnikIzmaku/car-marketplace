const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const nameRegex = /^[A-Za-z\s]{3,}$/;
const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/;

function showError(input, message) {
  clearError(input);
  const err = document.createElement('div');
  err.className = 'error-message';
  err.textContent = message;
  input.classList.add('invalid');
  input.parentNode.insertBefore(err, input.nextSibling);
}

function clearError(input) {
  const next = input.nextElementSibling;
  if (next && next.classList && next.classList.contains('error-message')) {
    next.remove();
  }
  input.classList.remove('invalid');
}

const loginForm = document.getElementById("loginForm");
if (loginForm) {
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');

  [emailInput, passwordInput].forEach(inp => {
    inp && inp.addEventListener('input', () => clearError(inp));
  });

  loginForm.addEventListener('submit', function (e) {
    let isValid = true;
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    clearError(emailInput);
    clearError(passwordInput);

    if (!emailRegex.test(email)) {
      showError(emailInput, 'Email format jo valid');
      isValid = false;
    }

    if (!passwordRegex.test(password)) {
      showError(passwordInput, 'Password duhet te kete minimum 8 karaktere, te pakten 1 shkronje dhe 1 numer');
      isValid = false;
    }

    if (!isValid) e.preventDefault();
  });
}

const registerForm = document.getElementById("registerForm");
if (registerForm) {
  const fullNameInput = document.getElementById('fullName');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const confirmInput = document.getElementById('confirmPassword');

  [fullNameInput, emailInput, passwordInput, confirmInput].forEach(inp => {
    inp && inp.addEventListener('input', () => clearError(inp));
  });

  registerForm.addEventListener('submit', function (e) {
    let isValid = true;
    const fullName = fullNameInput.value.trim();
    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();
    const confirmPassword = confirmInput.value.trim();

    clearError(fullNameInput);
    clearError(emailInput);
    clearError(passwordInput);
    clearError(confirmInput);

    if (!nameRegex.test(fullName)) {
      showError(fullNameInput, 'Emri duhet te kete minimum 3 shkronja');
      isValid = false;
    }

    if (!emailRegex.test(email)) {
      showError(emailInput, 'Email jo valid');
      isValid = false;
    }

    if (!passwordRegex.test(password)) {
      showError(passwordInput, 'Password duhet te kete minimum 8 karaktere, te pakten 1 shkronje dhe 1 numer');
      isValid = false;
    }

    if (password !== confirmPassword) {
      showError(confirmInput, 'Passwordet nuk perputhen');
      isValid = false;
    }

    if (!isValid) e.preventDefault();
  });
}