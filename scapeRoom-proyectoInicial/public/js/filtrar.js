
document.addEventListener("DOMContentLoaded", function() {

    // FILTRAR POR ROL (USUARIOS)

    var filterRol = document.getElementById('filterRol');
    if (filterRol) {
        filterRol.addEventListener('change', function() {
            var selectedRole = this.value;
            if (selectedRole === '0') {
                window.location.href = userListUrl;
            } else {
                document.getElementById('filterForm').submit();
            }
        });

        var urlParams = new URLSearchParams(window.location.search);
        var selectedRole = urlParams.get('filterRol');

        if (selectedRole) {
            document.getElementById('filterRol').value = selectedRole;
        }
    }

    // FILTRAR POR LOCALIDAD (RESERVAS)
    
    var filterLocalidad = document.getElementById('filterLocalidad');
    if (filterLocalidad) {
        filterLocalidad.addEventListener('change', function() {
            var selectedLocation = this.value;
            if (selectedLocation === '0') {
                window.location.href = reservationListUrl;
            } else {
                document.getElementById('filterForm').submit();
            }
        });

        var urlParams = new URLSearchParams(window.location.search);
        var selectedLocation = urlParams.get('filterLocalidad');

        if (selectedLocation) {
            document.getElementById('filterLocalidad').value = selectedLocation;
        }
    }
});



function filterByRole(role) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/users?filterRol=" + role, true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onload = function() {
        if (xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById("dataTable").innerHTML = response;
        } else {
            console.error("Error al filtrar por rol");
        }
    };
    xhr.send();
}


