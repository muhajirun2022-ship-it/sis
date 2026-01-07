// Toggle Sidebar Mobile
const hamburger = document.getElementById("hamburger");
const closeSidebar = document.getElementById("closeSidebar");
const sidebar = document.getElementById("sidebar");

// Buat overlay element
const overlay = document.createElement("div");
overlay.className = "overlay";
document.body.appendChild(overlay);

function toggleMenu() {
  sidebar.classList.toggle("show");
  overlay.classList.toggle("show");
}

if (hamburger) hamburger.addEventListener("click", toggleMenu);
if (closeSidebar) closeSidebar.addEventListener("click", toggleMenu);
overlay.addEventListener("click", toggleMenu); // Klik luar untuk tutup

// Dark Mode
const themeToggle = document.getElementById("themeToggle");
const body = document.body;

if (localStorage.getItem("theme") === "dark") {
  body.classList.add("dark");
  themeToggle.textContent = "☀️";
}

if (themeToggle) {
  themeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    const isDark = body.classList.contains("dark");
    localStorage.setItem("theme", isDark ? "dark" : "light");
    themeToggle.textContent = isDark ? "☀️" : "🌙";
  });
}
