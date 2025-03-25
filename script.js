

document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.querySelector("#formulario");
    const mensaje = document.createElement("div");  // Crear mensaje
    mensaje.classList.add("mensaje-exito");
    document.body.appendChild(mensaje);

    formulario.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(formulario);

        fetch("backend/insertar.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.mensaje) {
                lanzarConfetti();
                mostrarMensaje("🎉 Usuario guardado con éxito!", "success");
                formulario.reset();  // Limpiar formulario
            } else {
                mostrarMensaje("⚠️ Hubo un error al guardar.", "error");
            }
        })
        .catch(() => {
            mostrarMensaje("❌ Error de conexión.", "error");
        });
    });

    function lanzarConfetti() {
        confetti({
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 }
        });
    }

    function mostrarMensaje(texto, tipo) {
        mensaje.textContent = texto;
        mensaje.style.backgroundColor = tipo === "success" ? "#4CAF50" : "#D9534F";
        mensaje.style.display = "block";

        setTimeout(() => {
            mensaje.style.display = "none";
        }, 3000);
    }
});
