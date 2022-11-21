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
                url: "http://127.0.0.1:8000/cargos/" + id,
            }
        );

        const data = response.data;
        document.getElementById("empleado_id").value = data.empleado_id;
        document.getElementById("area_id").value = data.area_id;
        document.getElementById("cargo_id").value = data.cargo_id;
        document.getElementById("role_id").value = data.role_id;
        document.getElementById("empleado_jefe_id").value = data.empleado_jefe_id;
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
                    url: "http://127.0.0.1:8000/cargos/" + id,
                }
            );
            window.location.replace("/cargos");
        } catch (error) {
            console.log(error)
        }
    }
}