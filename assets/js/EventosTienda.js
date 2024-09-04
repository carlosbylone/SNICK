
document.querySelectorAll(".product button").forEach(button => {
    button.addEventListener("click", function(event) {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Se ha añadido correctamente",
            showConfirmButton: false,
            timer: 1500
          });
        event.preventDefault();
    });
});