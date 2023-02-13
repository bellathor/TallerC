
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
            setTimeout(Consultar_Departamentos, 1000);
        } else if (usuario[0].ID_Puesto == 10) {
            em.remove();
            ti.remove();
            pr.remove();
            bo.remove();
            co.remove();
            inv.remove();
            setTimeout(Consultar_Departamentos, 1000);
        } else {
            window.location.replace('../login.php');
        }
    }
    else {
        window.location.replace('../../login.php');
    }
};
function Salir() {
    sessionStorage.clear();
    window.location.replace('../../login.php');
}
function Consultar_Empleados() { // todos los empleados
    const url = '../../php/scripts/apis/admin_nominas/api_nominas.php?consultar_empleados';
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
    const url = '../../php/scripts/apis/departamentos/api_departamentos.php?consultar_departamentos';
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
    const url = '../../php/scripts/apis/admin_nominas/api_nominas.php?consultar_empleados_departamentos&id=' + dep;
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var empleado = data.empleados;
            if (empleado !== 'no existe') {
                for (let x = 0; x < empleado.length; ++x) {
                    Limpiar_Tabla_Nominas_Registro();
                    setTimeout(Cargar_Tabla_Nominas_Registro, 100 * x, empleado[x], x);
                }
            } else {
                alert('No hay empleados en ese departamento.!');
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
        'Puesto': em.Nombre_Puesto,
        'Total': em.Total
    }
    var arreglo = [];
    if (json.Salario_Semanal === null || json.Horas_Laborales === null || json.Precio_Hora === null) {
        arreglo = [cantidad + 1, json.Nombres, json.Apellidos, json.Departamento, json.Puesto, "$0.00", "0", "$0.00", '<button class = "btn btn-primary" onclick = "Modificar(' + json.ID_Empleado + ",'" + json.Nombres + " " + json.Apellidos + "','" + json.Puesto + "'," + 0.00 + ',' + 0.00 + ',' + 0.00 + ')">Modificar</button>'];
    } else {
        arreglo = [cantidad + 1, json.Nombres, json.Apellidos, json.Departamento, json.Puesto, "$" + json.Salario_Semanal, "$" + json.Horas_Laborales, "$" + json.Precio_Hora, '<button class="btn btn-primary"  onclick = "Modificar(' + json.ID_Empleado + ",'" + json.Nombres + " " + json.Apellidos + "','" + json.Puesto + "'," + json.Salario_Semanal + ',' + json.Horas_Laborales + ',' + json.Precio_Hora + ')">Modificar</button>'];
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
    if (salario !== null) {
        form[2].value = salario;
        form[3].value = horas;
        form[4].value = pago;
    }
    form[2].removeAttribute('disabled');
    form[3].removeAttribute('disabled');
    form[4].removeAttribute('disabled');
    document.documentElement.scrollTop = 0;
}
function filtrarTextos(input) {
    if (input.name == 'salario') {
        input.value = "";
    } else if (input.name == 'horas_laborales') {
        input.value = "";
    } else if (input.name == 'pago_hora') {
        input.value = "";
    }
}
function Limpiar_Formulario() {
    const form = document.forms['formulario_nominas_registro'];
    for (let i = 0; i < form.length; i++) {
        form[i].value = "";

    }
    form[2].setAttribute('disabled', true);
    form[3].setAttribute('disabled', true);
    form[4].setAttribute('disabled', true);
    Borrar_ID();
}
function Limpiar_Tabla_Nominas_Registro() {
    let tabla = document.getElementById('tabla_empleados');
    while (tabla.lastElementChild) {
        tabla.removeChild(tabla.lastElementChild);
    }
}
var id;
function Guardar_ID(i) {
    id = i;
}
function Obtener_ID() {
    return id;
}
function Borrar_ID() {
    id = 0;
}
$(function () {
    $("#exporttable").click(function (e) {
        var table = $("#tabla_empleados_");
        var tableBody = $("#tabla_empleados");
        $(table).toggleClass
        if (table && tableBody.children().length > 0) {
            $(table).addClass('text-dark');
            //tabla.removeChild(tabla.lastChild);
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "Excel_Empleados_Registro_Nominas_fecha_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
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
function Cargar_Nominas() {
    Limpiar_Formulario();
    Limpiar_Select();
    Limpiar_Tabla_Nominas_Registro();
}
function Limpiar_Select() {
    let sel = document.getElementById('Seleccion_Departamento');
    let ultimo_sel = sel.lastElementChild;
    let option_sel = document.createElement('option');
    option_sel.value = 100;
    option_sel.innerHTML = "Seleccionar";
    while (ultimo_sel) {
        sel.removeChild(ultimo_sel);
        ultimo_sel = sel.lastElementChild;
    }
    sel.appendChild(option_sel);
    Consultar_Departamentos();
}
function Validar_Formulario() {
    const form = document.forms['formulario_nominas_registro'];
    let salario = form[2].value;
    let horas = form[3].value;
    let pagoxhora = form[4].value;
    if (form[0].value !== "") {
        let json = {
            "ID": Obtener_ID(),
            "Salario": salario,
            "Horas": horas,
            "Pagos": pagoxhora
        }
        var confir = confirm('¿Desea registrar con esta nomina a el empleado?');
        if (confir == true) {
            Actualizar_Nomina(json);
        }
    } else {
        alert('Debe seleccionar un empleado para poder guardar.!');
    }
    return false;
}

function Actualizar_Nomina(json) {
    let url = '../../php/scripts/apis/admin_nominas/api_nominas.php?actualizar_salario';
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    }).then(response => response.json())
        .then(data => {
            var error = data.error;
            if (error == "false") {
                alert('Se actualizo el salario de este empleado.!');
                Limpiar_Formulario();
                Limpiar_Tabla_Nominas_Registro();
                Limpiar_Select();
                Borrar_ID();
            } else if (error == 'true') {
                alert('Ocurrió un error.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}


// Gestio Nominas
function Cargar_Gestion() {
    Limpiar_Tabla_Nominas_Registro_Gest();
    Consultar_Departamentos_Gestion();
}
function Consultar_Departamentos_Gestion() {
    const url = '../../php/scripts/apis/departamentos/api_departamentos.php?consultar_departamentos';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            if (data.departamentos !== null) {
                var departamentos = data.departamentos;
                for (let x = 0; x < departamentos.length; ++x) {
                    Limpiar_Select_Gest();
                    setTimeout(Cargar_Select_Dep_Gestion, 100 * 1, departamentos[x]);
                }
            } else {
                alert('No hay departamentos registrados.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}
function Limpiar_Select_Gest() {
    let sel = document.getElementById('Seleccion_Departamento2');
    let ultimo_sel = sel.lastElementChild;
    let option_sel = document.createElement('option');
    let option_todos = document.createElement('option');
    option_sel.value = 100;
    option_sel.innerHTML = "Seleccionar";
    option_todos.value = "0";
    option_todos.innerHTML = "Todos";
    while (ultimo_sel) {
        sel.removeChild(ultimo_sel);
        ultimo_sel = sel.lastElementChild;
    }
    sel.appendChild(option_sel);
    sel.appendChild(option_todos);
}
function Cargar_Select_Dep_Gestion(dep) {
    var depto = {
        'ID': dep.ID_Departamento,
        'Departamento': dep.Departamento
    }

    var opcion = document.createElement('option');
    opcion.value = depto.ID;
    opcion.innerHTML = depto.Departamento;
    document.getElementById('Seleccion_Departamento2').appendChild(opcion);
}
function Mostrar_Empleados_Dep_Ges(option) {
    if (option.value == 0) {
        Consultar_Empleados_Departamentos_Gest_Todos();
    } else if (option.value == "100") {
        Limpiar_Tabla_Nominas_Registro_Gest();
    }
    else {
        Consultar_Empleados_Departamentos_Gest(option.value);
    }
}
function Limpiar_Tabla_Nominas_Registro_Gest() {
    let tabla = document.getElementById('tabla_empleados_gestion');
    let ultimo = tabla.lastElementChild;
    while (ultimo) {
        tabla.removeChild(ultimo);
        ultimo = tabla.lastElementChild;
    }
}
function Consultar_Empleados_Departamentos_Gest_Todos() {
    const url = '../../php/scripts/apis/admin_nominas/api_nominas.php?consultar_empleados_departamentos_todos';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var empleado = data.empleados;

            if (empleado !== 'no existe') {
                for (let x = 0; x < empleado.length; ++x) {
                    Limpiar_Tabla_Nominas_Registro_Gest();
                    setTimeout(Cargar_Tabla_Nominas_Registro_Gest, 100 * x, empleado[x], x);
                }
            } else {
                alert('No hay empleados en ese departamento.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}
function Consultar_Empleados_Departamentos_Gest(dep) {
    const url = '../../php/scripts/apis/admin_nominas/api_nominas.php?consultar_empleados_departamentos&id=' + dep;
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var empleado = data.empleados;
            if (empleado !== 'no existe') {
                for (let x = 0; x < empleado.length; ++x) {
                    Limpiar_Tabla_Nominas_Registro_Gest();
                    setTimeout(Cargar_Tabla_Nominas_Registro_Gest, 100 * x, empleado[x], x);
                }
            } else {
                alert('No hay empleados en ese departamento.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Cargar_Tabla_Nominas_Registro_Gest(em, cantidad) {
    let json = {
        'ID_Empleado': em.ID_Empleado,
        'ID_Puesto': em.ID_Puesto,
        'ID_Departamento': em.ID_Departamento,
        'Nombres': em.Nombres,
        'Apellidos': em.Apellidos,
        'Departamento': em.Departamento,
        'Salario_Semanal': em.Salario_Semanal,
        'Prestamos': em.Prestamos,
        'Horas_Laborales': em.Horas_Laborales,
        'Horas_Trabajadas': em.Horas_Trabajadas,
        'Horas_No_Laborales': em.Horas_No_Trabajadas,
        'Precio_Hora': em.Precio_Hora,
        'Descuento': em.Descuento,
        'Total': em.Total,
        'Comentario': em.Comentarios,
        'Puesto': em.Nombre_Puesto
    }
    var arreglo = [];
    arreglo = [cantidad + 1, json.Nombres, json.Apellidos, json.Departamento, json.Puesto, "$" + json.Salario_Semanal, "$" + json.Prestamos, json.Horas_Laborales, json.Horas_Trabajadas, json.Horas_No_Laborales, "$" + json.Precio_Hora, "$" + json.Descuento, "$" + json.Total, json.Comentario, '<button class="btn btn-primary"  onclick = "Modificar_Gest(' + json.ID_Empleado + ",'" + json.Nombres + " " + json.Apellidos + "','" + json.Puesto + "'," + json.Prestamos + ',' + json.Horas_Trabajadas + ',' + json.Horas_No_Laborales + ',' + json.Salario_Semanal + ',' + json.Horas_Laborales + ',' + json.Precio_Hora + ',' + json.Descuento + ',' + json.Total + ",'" + json.Comentario + "'" + ')">Modificar</button>'];
    var tr = document.createElement('tr');
    if (json.ID_Empleado !== null) {
        for (let i = 0; i < arreglo.length; i++) {
            let td = document.createElement('td');
            td.setAttribute['scope', 'col'];
            td.innerHTML = arreglo[i];
            tr.appendChild(td);
        }
        document.getElementById('tabla_empleados_gestion').appendChild(tr);
    }
}

function Modificar_Gest(id, nombres, cargo, prestamo, trabajadas, no_trabajadas, salario, horas, pago, descuento, total, coment) {
    Limpiar_Formulario();
    if (salario == 0 && horas == 0 && pago == 0) {
        alert('Debe primero llenar las nominas de salario, horas y pago por hora.!');
    } else {
        Guardar_ID(id);
        const form = document.forms['formulario_gestion_nominas'];
        form[0].removeAttribute('disabled');
        form[1].value = nombres;
        form[2].value = cargo;
        form[3].value = 0;
        form[4].value = 0;
        form[5].value = 0;
        form[6].value = salario;
        form[7].value = horas;
        form[8].value = pago;
        form[9].value = descuento;
        form[10].value = total;
        form[11].value = coment;

        Guardar_Prestamo(prestamo);
        Guardar_Horas_Trabajadas(trabajadas);
        Guardar_Horas_No_Trabajadas(no_trabajadas);
        Guardar_Descuento(descuento);
        Guardar_Total(total);

        document.documentElement.scrollTop = 0;
    }

}
var pre, ht, hnt, d, t;
function Guardar_Prestamo(n) {
    pre = parseFloat(n);
}
function Guardar_Horas_Trabajadas(n) {
    ht = parseFloat(n);
}
function Guardar_Horas_No_Trabajadas(n) {
    hnt = parseFloat(n);
}
function Guardar_Descuento(n) {
    d = parseFloat(n);
}
function Guardar_Total(n) {
    t = parseFloat(n);
}
function Obtener_Prestamo() {
    return pre;
}
function Obtener_Horas_Trabajadas() {
    return ht;
}
function Obtener_Horas_No_Trabajadas() {
    return hnt;
}
function Obtener_Descuento() {
    return d;
}
function Obtener_Total() {
    return t;
}
function Limpiar_Formulario_Gest() {
    const form = document.forms['formulario_gestion_nominas'];
    for (let i = 0; i < form.length; i++) {
        form[i].value = "";
    }
    form[0].setAttribute('disabled', true);
    form[3].setAttribute('disabled', true);
    form[4].setAttribute('disabled', true);
    form[5].setAttribute('disabled', true);
    form[11].setAttribute('disabled', true);
    Borrar_ID();
}

function Validar_Formulario_Gest() {
    const form = document.forms['formulario_gestion_nominas'];
    let Prestamo = form[3].value;
    let Horas_Trab = form[4].value;
    let Horas_No_Trab = form[5].value;
    let Salario = form[6].value;
    let Horas_Lab = form[7].value;
    let Pago_Hora = form[8].value;
    let Descuento = form[9].value;
    let Total = form[10].value;
    let Comentario = form[11].value;
    Prestamo = parseFloat(Obtener_Prestamo()) + parseFloat(Prestamo);
    Horas_Trab = parseFloat(Obtener_Horas_Trabajadas()) + parseFloat(Horas_Trab);
    Horas_No_Trab = parseFloat(Obtener_Horas_No_Trabajadas()) + parseFloat(Horas_No_Trab);
    Descuento = parseFloat(Obtener_Descuento()) + parseFloat(Descuento);
    Total = parseFloat(Obtener_Total()) + parseFloat(Total);
    Descuento = (parseFloat(Horas_No_Trab) * parseFloat(Pago_Hora));
    if (parseInt(Horas_Lab) <= parseInt(Horas_Trab)) {
        alert('El empleado ya alcanzo el maximo de horas trabajadas');
    }
    else {
        if (parseFloat(Salario) >= parseFloat(Prestamo)) {
            Total = (parseFloat(Salario) - parseFloat(Prestamo)) - (parseFloat(Descuento));
            if (form[1].value !== "") {
                let json = {
                    "ID": Obtener_ID(),
                    "Prestamo": Prestamo,
                    "Horas_Tr": Horas_Trab,
                    "Horas_No": Horas_No_Trab,
                    "Descuento": Descuento,
                    "Total": Total,
                    "Comentario": Comentario
                }
                var confir = confirm('¿Desea registrar con esta nomina a el empleado?');
                if (confir == true) {
                    Actualizar_Nomina_Gest(json);
                }
            } else {
                alert('Debe seleccionar un empleado para poder guardar.!');
            }
        } else {
            alert("El prestamo sobrepasa el Salario.!");
        }
    }
    return false;
}

function Limpiar_Nominas() {
    pre = 0;
    ht = 0;
    hnt = 0;
    d = 0;
    t = 0;

}
function Actualizar_Nomina_Gest(json) {
    let url = '../../php/scripts/apis/admin_nominas/api_nominas.php?actualizar_salario_gest';
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    }).then(response => response.json())
        .then(data => {
            var error = data.error;
            if (error == "false") {
                alert('Se actualizo el salario de este empleado.!');
                Limpiar_Formulario_Gest();
                Limpiar_Tabla_Nominas_Registro_Gest();
                Consultar_Empleados_Departamentos_Gest_Todos();
                Limpiar_Nominas();
                Borrar_ID();
            } else if (error == 'true') {
                alert('Ocurrió un error.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Seleccion_Opcion_Gest(select) {
    const form = document.forms['formulario_gestion_nominas'];
    form[11].removeAttribute('disabled');
    if (select.value == 1) {
        form[3].removeAttribute('disabled');
        form[4].removeAttribute('disabled');
        form[5].removeAttribute('disabled');
    } else if (select.value == 2) {
        form[3].removeAttribute('disabled');
        form[4].setAttribute('disabled', true);
        form[5].setAttribute('disabled', true);
    }
    else if (select.value == 3) {
        form[4].removeAttribute('disabled');
        form[3].setAttribute('disabled', true);
        form[5].setAttribute('disabled', true);
    }
    else if (select.value == 4) {
        form[5].removeAttribute('disabled');
        form[3].setAttribute('disabled', true);
        form[4].setAttribute('disabled', true);
    } else if (select.value == 100) {
        form[3].setAttribute('disabled', true);
        form[4].setAttribute('disabled', true);
        form[5].setAttribute('disabled', true);
        form[11].setAttribute('disabled', true);
    }
}
function filtrarTextosGest(input) {
    if (input.name == 'prestamo') {
        input.value = "";
    } else if (input.name == 'horas_trabajo') {
        input.value = "";
    } else if (input.name == 'horas_no_trabajadas') {
        input.value = "";
    }
    else if (input.name == 'coment') {
        input.value = "";
    }
}

function Realizar_Cierre() {
    var table = $("#tabla_empleados_gestion_");
    var tablebody = $("#tabla_empleados_gestion");
    $(table).toggleClass
    if (table && tablebody.children().length > 0) {
        let json = {
            "Prestamo": 0,
            "Horas_Tr": 0,
            "Horas_No": 0,
            "Descuento": 0,
            "Total": 0,
            "Comentario": "No hay comentarios.!"
        }
        var confir = confirm('¿Desea realizar el cierre de nominas?');
        if (confir == true) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "Excel_Nominas" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: true
            });
            setTimeout(Actualizar_Nomina_Gest_Cierre, 3000, json);
        } else {
            alert('Debe seleccionar un empleado para poder guardar.!');
        }
    } else {
        alert('No se puede descargar una tabla vacia.!');
    }
}

function Actualizar_Nomina_Gest_Cierre(json) {
    let url = '../../php/scripts/apis/admin_nominas/api_nominas.php?actualizar_salario_gest_cierre';
    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    }).then(response => response.json())
        .then(data => {
            var error = data.error;
            if (error == "false") {
                alert('Se actualizo el salario de este empleado.!');
                Limpiar_Formulario_Gest();
                Limpiar_Tabla_Nominas_Registro_Gest();
                Consultar_Empleados_Departamentos_Gest_Todos();
                Limpiar_Nominas();
                Borrar_ID();
            } else if (error == 'true') {
                alert('Ocurrió un error.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}