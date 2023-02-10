window.onload = () => {
    Consultar_Departamentos();
}

function Consultar_Empleados() { // todos los empleados
    const url = '../php/scripts/solicitudes_inventario.php?consultar_empleados';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            if (data.empleados != null) {
                var empleados = data.empleados;
                for (let i = 0; i < empleados.length; i++) {
                    setTimeout(Crear_Tabla_Empleados, 100 * i, empleados[i], i);
                }
            }
            document.getElementById('empleado_total').innerHTML = empleados.length;
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Consultar_Departamentos() {
    const url = '../../php/scripts/solicitudes_inventario.php?consultar_departamentos';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            if (data.departamentos !== null) {
                var departamentos = data.departamentos;
                for (let x = 0; x < departamentos.length; ++x) {
                    setTimeout(Cargar_Select_Dep, 100 * 1, departamentos[x]);
                }
            } else {
                alert('No hay departamentos registrados.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Cargar_Select_Dep(dep) {
    var depto = {
        'ID': dep.ID_Departamento,
        'Departamento': dep.Departamento
    }

    var opcion = document.createElement('option');
    opcion.value = depto.ID;
    opcion.innerHTML = depto.Departamento;
    document.getElementById('Seleccion_Departamento').appendChild(opcion);
}

function Mostrar_Empleados_Dep(option) {
    if (option.value === "") {
        Limpiar_Tabla_Nominas_Registro()
    } else {
        Consultar_Empleados_Departamentos(option.value);
    }
}

function Consultar_Empleados_Departamentos(dep) {
    const url = '../../php/scripts/solicitudes_inventario.php?consultar_empleados_departamentos&id=' + dep;
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            if (data !== null) {
                var empleado = data.departamentos;
                for (let x = 0; x < empleado.length; ++x) {
                    Limpiar_Tabla_Nominas_Registro();
                    setTimeout(Cargar_Tabla_Nominas_Registro, 100 * x, empleado[x], x);
                }
            } else {
                alert('No hay departamentos registrados.!');
            }

        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Cargar_Tabla_Nominas_Registro(em, cantidad) {

    let json = {
        'ID_Empleado': em.ID_Empleado,
        'ID_Puesto': em.ID_Puesto,
        'ID_Departamento': em.ID_Departamento,
        'Nombres': em.Nombres,
        'Apellidos': em.Apellidos,
        'Departamento': em.Departamento,
        'Salario_Semanal': em.Salario_Semanal,
        'Horas_Laborales': em.Horas_Laborales,
        'Precio_Hora': em.Precio_Hora,
        'Puesto': em.Nombre_Puesto
    }
    var arreglo = [];
    if (json.Salario_Semanal === null || json.Horas_Laborales === null || json.Precio_Hora === null) {
        arreglo = [cantidad + 1, json.Nombres, json.Apellidos, json.Departamento, json.Puesto, "$0.00", "0", "$0.00", '<button class="btn btn-primary" onclick = "Modificar(' + json.ID_Empleado + ",'" + json.Nombres + " " + json.Apellidos + "','" + json.Puesto + "'," + 0.00 + ',' + 0.00 + ',' + 0.00 + ')">Modificar</button>'];
    } else {
        arreglo = [cantidad + 1, json.Nombres, json.Apellidos, json.Departamento, json.Puesto, json.Salario_Semanal, json.Horas_Laborales, json.Precio_Hora, 'onclick =" Modificar(' + json.ID_Empleado + ",'" + json.Nombres + " " + json.Apellidos + "','" + json.Puesto + "'," + ',' + json.Salario_Semanal + ',' + json.Horas_Laborales + ',' + json.Precio_Hora + ')>Modificar</button>'];
    }
    var tr = document.createElement('tr');
    if (json.ID_Empleado !== null) {
        for (let i = 0; i < arreglo.length; i++) {
            let td = document.createElement('td');
            td.setAttribute['scope', 'col'];
            td.innerHTML = arreglo[i];
            tr.appendChild(td);
        }
        document.getElementById('tabla_empleados').appendChild(tr);
    }
}

function Modificar(id, nombres, cargo, salario, horas, pago) {
    Limpiar_Formulario();
    Guardar_ID(id);
    const form = document.forms['formulario_nominas_registro'];
    form[0].value = nombres;
    form[1].value = cargo;
    if(salario !== null){
        form[2].value = salario;
        form[3].value = horas;
        form[4].value = pago;
    }
    form[2.].removeAttribute('disabled');
    form[3].removeAttribute('disabled');
    form[4].removeAttribute('disabled');
}

function Limpiar_Formulario() {
    const form = document.forms['formulario_nominas_registro'];
    for (let i = 0; i < form.length; i++) {
        form[i].value = "";

    }
    form[2].setAttribute('disabled', true);
    form[3].setAttribute('disabled', true);
    form[4].setAttribute('disabled', true);
}

function Limpiar_Tabla_Nominas_Registro() {
    let tabla = document.getElementById('tabla_empleados');
    while (tabla.lastElementChild) {
        tabla.removeChild(tabla.lastElementChild);
    }
}

var id;

function Guardar_ID(i){
    id = i;
}
function Obtener_ID(){
    return id;
}


$(function () {
    $("#exporttable").click(function (e) {
        var table = $("#tabla_empleados_");
        $(table).toggleClass
        if (table && table.length < 0) {
            $(table).addClass('text-dark');

            //tabla.removeChild(tabla.lastChild);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "excel_nominas_fecha_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: true
            });
        }
        else {
            alert('No se puede descargar una tabla vacia');
        }
    });

});

function Validar_Formulario() {
    const form = document.forms['formulario_nominas_registro'];
    let salario = form.value;
    let horas = form.value;
    let pagoxhora = form.value;
    json = {
        "Salario": salario,
        "Horas": horas,
        "Pagos": pagoxhora
    }
    return false;
}

function Actualizar_Nomina(json){
    let url = '../../php/scripts/'
}