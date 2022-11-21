$(document).ready(function () {
    $('#empleados').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'colvis',
            'excel',
            'print'
        ]
    });
});

const getEmpleado = async (id) => {
    try {
        const response = await axios ({
            method: 'get',
                url: "http://127.0.0.1:8000/empleados/" + id,
            }
        );

        const data = response.data;
        document.getElementById("nombres").value = data.nombres;
        document.getElementById("apellidos").value = data.apellidos;
        document.getElementById("direccion").value = data.direccion;
        document.getElementById("identificacion").value = data.identificacion;
        document.getElementById("telefono").value = data.telefono;
        document.getElementById("departamentoNacimiento").value = data.departamentoNacimiento;
        document.getElementById("ciudadNacimiento").value = data.ciudadNacimiento;
        $("#empleado-modal").modal('toggle');
    } catch (error) {
        console.log(error)
    }
}

const deleteEmpleado = async (id) => {
    if (confirm("¿Deseas eliminar a este empleado?")){
        try {
            const response = await axios ({
                method: 'delete',
                    url: "http://127.0.0.1:8000/empleados/" + id,
                }
            );

            window.location.replace("/empleados");
        } catch (error) {
            console.log(error)
        }
    }
}