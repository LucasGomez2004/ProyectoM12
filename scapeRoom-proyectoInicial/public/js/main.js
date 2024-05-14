document.addEventListener("DOMContentLoaded", function() {
    
    /* correo */
    document.getElementById('exampleEmail').addEventListener('input', function() {
        var email = this.value;
        validarEmail(email);
    });

    document.getElementById('filterRol').addEventListener('change', function() {
        var selectedRole = this.value;
        filterByRole(selectedRole);
    });
    
    document.getElementById('formulari').addEventListener('submit', function(event) {
        var email = document.getElementById('exampleEmail').value;
    
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/llistaNicknames.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
    
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                var outputString = "";
                for (var key in response) {
                    if (response.hasOwnProperty(key)) {
                        outputString += "<b>" + key + "</b>: " + response[key] + "<br>";
                    }
                }
                document.getElementById('formulari').reset();
                document.getElementById("reposta").innerHTML = outputString;
            } else {
                // Mostrar el mensaje de error si hubo un problema con la solicitud
                document.getElementById('email_error').style.display = 'block';
            }
        };
        xhr.send("Email=" + email );
    });
});


function validarEmail(email) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../php/llistaNicknames.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            tractarError(response);
        }
    };
    xhr.send("email=" + email);
}

function tractarError(response) {
    var errorSpan = document.getElementById('email_error');
    var matchesDiv = document.getElementById('similars');

    if (response.trim() === "1") {
        errorSpan.innerText = "El Correo ya existeix.";
        matchesDiv.innerHTML = "";
    } else if (response.trim() === "2") {
        errorSpan.innerText = "";
        matchesDiv.innerHTML = "";
    } else if (response.trim() === "3") {
        errorSpan.innerText = "";
        matchesDiv.innerHTML = "<b>Correo similares:</b> No hay coincidencias.";
    } else {
        errorSpan.innerText = "";
        matchesDiv.innerHTML = "<b>Correo similares:</b> " + response;
    }
}

