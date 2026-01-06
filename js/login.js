// Show / hide password
const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");

togglePassword.addEventListener("click", () => {
  const type = passwordInput.type === "password" ? "text" : "password";
  passwordInput.type = type;
  togglePassword.textContent = type === "password" ? "👁" : "🙈";
});

// Dark mode toggle
const themeToggle = document.getElementById("themeToggle");
const body = document.body;

// Load theme
if (localStorage.getItem("theme") === "dark") {
  body.classList.add("dark");
  themeToggle.textContent = "☀️";
}

themeToggle.addEventListener("click", () => {
  body.classList.toggle("dark");
  const isDark = body.classList.contains("dark");
  localStorage.setItem("theme", isDark ? "dark" : "light");
  themeToggle.textContent = isDark ? "☀️" : "🌙";
});

// Form validation
const form = document.querySelector("form");
const usernameInput = document.querySelector("input[name='username']");

form.addEventListener("submit", (e) => {
  let isValid = true;
  const username = usernameInput.value.trim();
  const password = passwordInput.value;

  // Clear previous error messages
  clearErrors();

  // Validate username
  if (username === "") {
    showError(usernameInput, "Username tidak boleh kosong");
    isValid = false;
  }

  // Validate password
  if (password === "") {
    showError(passwordInput, "Password tidak boleh kosong");
    isValid = false;
  } else if (password.length < 6) {
    showError(passwordInput, "Password minimal 6 karakter");
    isValid = false;
  }

  if (!isValid) {
    e.preventDefault(); // Prevent form submission
  }
});

function showError(input, message) {
  const errorElement = document.createElement("div");
  errorElement.className = "error-message";
  errorElement.textContent = message;
  input.parentElement.appendChild(errorElement);
}

function clearErrors() {
  const errors = document.querySelectorAll(".error-message");
  errors.forEach((error) => error.remove());
}
