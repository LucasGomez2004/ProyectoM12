
document.addEventListener("DOMContentLoaded", function() {
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

        // Obtener el valor de filterRol pasado en la URL (si existe)
        var urlParams = new URLSearchParams(window.location.search);
        var selectedRole = urlParams.get('filterRol');

        // Si filterRol tiene un valor, establecer la opción seleccionada en el select
        if (selectedRole) {
            document.getElementById('filterRol').value = selectedRole;
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

