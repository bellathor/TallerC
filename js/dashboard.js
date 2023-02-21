window.onload = () => {
    let em = document.getElementById('empleados');
    let ti = document.getElementById('tiendas');
    let pr = document.getElementById('produccion');
    let bo = document.getElementById('bodegas');
    let co = document.getElementById('compras');
    let ad = document.getElementById('administracion');
    let inv = document.getElementById('inventarios');
    let usuario = JSON.parse(sessionStorage.getItem('Sesion'));
    if (usuario !== null) {
        document.getElementById('nombre_empleado').innerText = usuario[0].Nombres + " " + usuario[0].Apellidos;
        if (usuario[0].ID_Puesto == 1 || usuario[0].ID_Puesto == 9) {
            document.getElementById('dash_muebles').remove();
            setTimeout(Cargar_Dashboard_Admin, 500);
        } else if (usuario[0].ID_Puesto == 10) {
            em.remove();
            ti.remove();
            pr.remove();
            bo.remove();
            co.remove();
            inv.remove();
            Remover_Dash_Nomina();
        } else if (usuario[0].ID_Puesto == 11) {
            em.remove();
            ti.remove();
            pr.remove();
            ad.remove();
            co.remove();
            inv.remove();
            Remover_Dash_Bodega();
            
        } else {
            sessionStorage.clear();
            window.location.replace('../login.php');
        }
    }
    else {
        sessionStorage.clear();
        window.location.replace('../login.php');

    }
};

function Cargar_Dashboard_Admin(){
    CargarMaderas();
    CargarMateriales();
}

function Remover_Dash_Bodega() {
    document.getElementById('dash_empleados').remove();
    document.getElementById('dash_muebles').remove();
    CargarMaderas();
    CargarMateriales();
}


function Remover_Dash_Nomina() {
    document.getElementById('dash_maderas').remove();
    document.getElementById('dash_materiales').remove();
    document.getElementById('dash_muebles').remove();
    CargarEmpleados();
}

function CargarEmpleados() {
    const url = '../php/scripts/apis/empleados/api_empleados.php?consultar_empleados';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var empleados = data.empleados;
            document.getElementById('empleado_total').innerHTML = empleados.length;

        })
        .catch(error => console.error("Error encontrado: ", error));
}

function CargarMaderas() {
    const url = '../php/scripts/apis/maderas/api_maderas.php?consultar_maderas';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(datos => {
            if (datos != null) {
                var madera = datos.maderas;
                document.getElementById('maderas_total').innerText = madera.length;
            } else {
                alert('Ocurrio un error.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function CargarMateriales() {
    var url = "../php/scripts/solicitudes_inventario.php?consultar_materiales";
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(datos => {
            if (datos != null) {
                var materiales = datos.materiales;
                document.getElementById('materiales_total').innerText = materiales.length;

            } else {
                alert('Ocurrio un error.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Salir() {
    sessionStorage.clear();
    window.location.replace('../login.php');
}