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

        } else if (usuario[0].ID_Puesto == 10) {
            em.remove();
            ti.remove();
            pr.remove();
            bo.remove();
            co.remove();
            inv.remove();
            setTimeout(Cargar, 1000);
        }else {
            window.location.replace('../login.php');
        }
    }
    else {
        window.location.replace('../../login.php');
    }
};
function Cargar(){
    Eliminar_Tabla();
    let form = document.forms['formulario_gastos_generales'];
    var date = new Date();
    var year = date.getFullYear();
    var mes = date.getMonth() + 1;
    var dia = date.getDate();
    var fecha;
    if (mes.toString().length < 2) {
        mes = '0' + mes;
    }
    fecha = year + '-' + mes + '-' + dia;
    form[0].value = fecha;
}
function Salir() {
    sessionStorage.clear();
    window.location.replace('../../login.php');
}
function Validar_Formulario() {
    let form = document.forms['formulario_gastos_generales'];
    let fecha = form[0].value;
    let descrip = form[1].value;
    let monto = form[2].value;
    let comentario = form[3].value;
    let json = {
        "fecha": fecha,
        "descrip": descrip,
        "monto": monto,
        "comentario": comentario
    };
    let c = confirm('¿Desea registrar este gasto?');
    if (c == true) {
        Guardar_Gastos(json);
    }
    return false;
}

function Guardar_Gastos(json) {
    const url = '../../php/scripts/apis/admin_nominas/api_nominas.php?registrar_gastos';
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    })
        .then(response => response.json())
        .then(data => {
            var error = data.error;
            if (error === "true") {
                alert('Ocurrió un error al insertar el gasto.!');
            } else if (error === "false") {
                Eliminar_Tabla();
                Limpiar_Formulario();
                Consultar_Gastos();
                alert('Gasto registrado correctamente.!');
            } else {
                alert('Error: ocurrio algo no se pudo realizar el registro.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));

}
function Consultar_Gastos() {
    const url = '../../php/scripts/apis/admin_nominas/api_nominas.php?consultar_gastos';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var gastos = data.gastos;
            if (gastos !== "no existe") {
                for (let i = 0; i < gastos.length; i++) {
                    setTimeout(Datos_Gastos, 100 * i, gastos[i], i);
                }
            } else {
                alert('No hay gastos registrados.!');
            }

        })
        .catch(error => console.error("Error encontrado: ", error));

}
function Realizar_Cierre() {
    var table = $("#tabla_gastos_generales_");
    var tablebody = $("#tabla_gastos_generales");
    $(table).toggleClass
    if (table && tablebody.children().length > 0) {
        var confir = confirm('¿Desea realizar el cierre de nominas?');
        if (confir == true) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "Excel_Gastos_Generales" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: true
            });
            setTimeout(Eliminar_Gastos_Generales, 4000);
        } else {
            alert('Debe seleccionar un empleado para poder guardar.!');
        }
    } else {
        alert('No se puede descargar una tabla vacia.!');
    }
}
function Eliminar_Gastos_Generales() {
    const url = '../../php/scripts/apis/admin_nominas/api_nominas.php?eliminar_gastos_generales';
    fetch(url, {
        method: 'DELETE'
    })
        .then(response => response.json())
        .then(data => {
            var gastos = data.gastos;
            if (gastos === "eliminados") {
                Eliminar_Tabla();
                Consultar_Gastos();
                alert('Se realizo el cierre exitosamente.!');
            } else {
                alert('No hay gastos registrados.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));

}
function Datos_Gastos(gastos, cantidad) {
    let json = {
        'Fecha': gastos.Fecha,
        'Descripcion': gastos.Descripcion,
        'Monto': gastos.Monto,
        'Comentario': gastos.Comentario
    };
    let arreglo = [cantidad + 1, json.Fecha, json.Descripcion, json.Monto, json.Comentario, "<button class='btn btn-primary bg-primary' onclick='Modificar(" + JSON.stringify(json) + ")'>Modificar</a>"];
    let tr = document.createElement('tr');
    for (let x = 0; x < arreglo.length; x++) {
        let td = document.createElement('td');
        td.innerHTML = arreglo[x];
        td.setAttribute('scope', 'col');
        tr.appendChild(td);
    }
    document.getElementById('tabla_gastos_generales').appendChild(tr);
}
function Modificar(json) {
    let form = document.forms['formulario_gastos_generales'];
    form[1].value = json.Descripcion;
    form[2].value = json.Monto;
    form[3].value = json.Comentario;
}
function Eliminar_Tabla() {
    let tabla = document.getElementById('tabla_gastos_generales');
    let ultimo = tabla.lastElementChild;
    while (ultimo) {
        tabla.removeChild(ultimo);
        ultimo = tabla.lastElementChild;
    }
}
function Limpiar_Formulario() {
    const form = document.forms['formulario_gastos_generales'];
    for (x = 0; x < form.length; x++) {
        form[x].value = "";
    }
}
function Mostrar_Tabla(esto, boolean) {
    let btn = document.getElementById('btn_cierre');
    if (boolean == false) {
        esto.innerText = "Ocultar gastos";
        Consultar_Gastos();
        esto.setAttribute('onclick', 'Mostrar_Tabla(this, true)');
        btn.removeAttribute('disabled');
    } else {
        esto.innerHTML = "Mostrar gastos";
        Eliminar_Tabla();
        esto.setAttribute('onclick', 'Mostrar_Tabla(this, false)');
        btn.setAttribute('disabled', true);
    }

}

