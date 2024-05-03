const container = document.querySelector(".container");
//const menuIcon = document.querySelector(".menu-icon");
const headingRight = document.querySelector(".main-heading-right");
const headingLeft = document.querySelector(".main-heading-left");

/*menuIcon.addEventListener("click", () => {
  container.classList.toggle("navigate");
});*/

const responsiveDesign = () => {
    if (window.innerWidth <= 700) {
        headingRight.style.display = "none";
        headingLeft.textContent = "ESCAPE OR DIE";
    } else {
        headingRight.style.display = "block";
        headingLeft.textContent = "ESCAPE";
    }
};

window.addEventListener("resize", () => {
    responsiveDesign();
});

setTimeout(function () {
    var statusMessage = document.getElementById("status-message");
    if (statusMessage) {
        statusMessage.style.transition =
            "opacity 0.5s ease-in-out, visibility 0s linear 0.5s";
        statusMessage.style.opacity = "0";
        setTimeout(function () {
            statusMessage.style.display = "none";
        }, 500);
    }

    var captchaMessage = document.getElementById("captcha-message");
    if (captchaMessage) {
        captchaMessage.style.transition =
            "opacity 0.5s ease-in-out, visibility 0s linear 0.5s";
        captchaMessage.style.opacity = "0";
        setTimeout(function () {
            captchaMessage.style.display = "none";
        }, 500);
    }
}, 5000);

responsiveDesign();

function confirmDelete(deleteUrl) {
    Swal.fire({
        title: "¿Quieres Eliminarlo?",
        text: "¡No podrás revertir los cambios!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "green",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, eliminarlo",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = deleteUrl;
        }
    });
}
