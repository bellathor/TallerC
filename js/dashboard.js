function consultaEmpleados() { // todos los empleados
    const url = '../php/scripts/solicitudesEmpleados_bd.php?controlempleados';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var empleados = data.empleados;
            document.getElementById('empleado_total').innerHTML = empleados.length;
        }
        )
        .catch(error => console.error("Error encontrado: ", error));
}

function consultaMaderas() { // todos los empleados
    const url = '../php/scripts/solicitudesMaderas_bd.php?consultarMaderas';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var maderas = data.maderas;
            document.getElementById('maderas_total').innerHTML = maderas.length;
        }
        )
        .catch(error => console.error("Error encontrado: ", error));
}

/*function consultaEmpleados() { // todos los empleados
    const url = '/Proyecto_TallerC_Mexico/php/scripts/solicitudesEmpleados_bd.php?controlempleados';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            if (data.empleados != null) {
                var empleados = data.empleados;
                for (let i = 0; i < empleados.length; i++) {
                    setTimeout(CrearTablaEmpleados, 100 * i, empleados[i], i);
                }
                document.getElementById('empleado_total').innerHTML = empleados.length;
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}*/

function consultarMuebles() { // todos las maderas
    const url = '../php/scripts/solicitudesMuebles_bd.php?consultarMuebles';
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'image/jpeg',
        }

    })
        .then(response => response.json())
        .then(data => {
            if (data.muebles != null) {
                var mueble = data.muebles;
                document.getElementById('muebles_total').innerHTML = mueble.length;
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

window.onload = () => {
    consultaEmpleados();
    consultaMaderas();
    consultarMuebles();
};