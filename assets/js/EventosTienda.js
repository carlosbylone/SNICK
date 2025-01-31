
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector(".navbar-toggle");
    const navMenu = document.querySelector("nav ul");

    toggleButton.addEventListener("click", function () {
        navMenu.classList.toggle("active");
    });
});
function confirmDelete() {
    return confirm("¿Estás seguro de que deseas eliminar este producto?");
}