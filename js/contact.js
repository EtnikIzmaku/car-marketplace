const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const nameRegex = /^[A-Za-z\s]{3,}$/;

const contactForm = document.getElementById("contactForm");

if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
        let isValid = true;
        const nameInput = document.getElementById("name");
        const emailInput = document.getElementById("email");
        const messageInput = document.getElementById("message");
        
        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const message = messageInput.value.trim();

        nameInput.value = name;
        emailInput.value = email;
        messageInput.value = message;

        if (!nameRegex.test(name)) {
            alert("Name must be at least 3 letters");
            isValid = false;
        }

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address");
            isValid = false;
        }

        if (message.length < 10) {
            alert("Message must be at least 10 characters");
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
}