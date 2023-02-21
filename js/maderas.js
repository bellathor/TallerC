function CargarDatos() {
    LimpiarTabla();
}

function Contador() {
    url = "../../php/scripts/apis/maderas/api_maderas.php?consultar_maderas";
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(datos => {
            var madera = datos.maderas;
            document.getElementById('maderas_total').innerText = madera.length;
        })
        .catch(error => console.error("Error encontrado: ", error));

}

function Validar_Formulario(opcion, id, entrada_salida, cantidad) { // formulario madera
    const form = document.forms['formulario_madera'];
    var codigo = form[0];
    var madera = form[1];
    var precio = form[2];

    var json = {
        'ID': id,
        'Codigo': codigo.value,
        'Madera': madera.value,
        'Precio': precio.value
    };
    if (opcion == false) {
        if (confirm('¿Desea registrar esta madera?') == true) {
            EnviarDatos(json, 'insertar_maderas');
        }
    } else if (opcion == 'modificar') {
        if (confirm('¿Desea actualizar esta madera?') == true) {
            EnviarDatos(json, 'actualizar_madera');
        }
    }
    return false;
}
function EnviarDatos(objeto, opcion, stock_opcion) {
    var url = '../../php/scripts/apis/maderas/api_maderas.php';
    if (opcion == 'insertar_maderas') { // POST
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(objeto)
        })
            .then(response => response.json())
            .then(datos => {
                var maderas = datos.maderas;
                if (maderas === "Registro exitoso.!") {
                    alert('Madera registrada exitosamente.!');
                    LimpiarTabla();
                    LimpiarFormulario();
                    EnviarDatos('', 'consultar_maderas');
                    document.forms['formulario_madera'].setAttribute('onsubmit', 'return Validar_Formulario(false)');
                } else if (maderas === "Error Registro") {
                    alert('Ocurrió un error durante el registro.!');
                } else if (maderas === "Existe") {
                    alert('El código de esta madera ya existe.!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    } else if (opcion == 'consultar_maderas') { // GET
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {
                if (datos != null) {
                    var madera = datos.maderas;
                    if (madera !== 'Sin registro') {
                        for (let i = 0; i < madera.length; i++) {
                            setTimeout(DatosTabla, 100 * i, madera[i], false, i);
                        }
                        Contador();
                    } else {
                        alert('No hay maderas registradas.!');
                    }
                } else {
                    alert('Ocurrio un error.!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'consultar_madera_stock') { // GET
        var urlEnvio = url + '/?' + opcion + "&id=" + objeto;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {

                if (stock_opcion == true) {
                    DatosTabla(datos, true);
                } else {
                    DatosTabla(datos);
                }

            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'consultar_reportes_madera') { // GET
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {
                var reportes = datos.reportes;
                if (reportes !== 'Sin registros') {
                    for (let i = 0; i < reportes.length; i++) {
                        LimpiarTablaReporte();
                        setTimeout(DatosTablaReporte, 100 * i, reportes[i], i);
                    }
                } else {
                    alert('No hay reportes de salida ni de entrada');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'actualizar_madera') { // PUT
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(objeto)
        })
            .then(response => response.json())
            .then(datos => {
                if (datos.error == 'true') {
                    alert('Ocurrio un error con la actualizacion.!');
                }
                else {
                    alert('Se actualizaron los datos correctamente.!');
                    LimpiarTabla();
                    LimpiarFormulario();
                    EnviarDatos('', 'consultar_maderas');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'actualizar_entrada_salida') { // PUT
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(objeto)
        })
            .then(response => response.json())
            .then(datos => {
                var maderas = datos.maderas;
                if (maderas !== 'exitoso') {
                    alert('Ocurrio un error con la actualizacion.!');
                }
                else {
                    alert('Se actualizaron los datos correctamente.!');
                    Cargar_Stock();
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'eliminar_madera') { // DELETE
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(objeto)
        })
            .then(response => response.json())
            .then(datos => {
                if (datos.error == 'false') {
                    EnviarDatos('', 'consultar_maderas');
                    LimpiarTabla();
                    alert('Se elimino correctamente.!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
}
/*function Filtrar_Tabla(select){
    
    if(tabla);
}*/
function Filtrar_Textos(input) {
    var formato = /^[A-z0-9]+$/;
    if (input.name == 'cod') {
        if (input.value.match(formato)) {
            if (input.value.toLowerCase()) {
                input.value = input.value.toUpperCase();
            }
        } else {
            if (input.value != "") {
                alert('Solo se permite numeros y letras.!');
                input.value = input.value.substring(0, input.value.length - 1);
            }
        }
    }
}
function DatosTabla(datos, stock, cantidad) {
    var form = document.forms['formulario_madera_stocks'];
    if (stock == false) {
        var json = {
            'ID': datos.ID_Madera,
            'Codigo': datos.Codigo,
            'Nombre_Madera': datos.Nombre_Madera,
            'Precio': datos.Precio_Unidad
        };

        var arreglojson = [cantidad + 1, json.Codigo, json.Nombre_Madera, json.Precio];
        var arreglo = [arreglojson[0], arreglojson[1], arreglojson[2], arreglojson[3], "<a class='btn btn-primary' onclick='Modificar(" + JSON.stringify(json) + ")'>Modificar</a>", "<a class='btn btn-danger' onclick='Eliminar(" + json.ID + ")'>Eliminar</a>"];
        var tr = document.createElement('tr');
        var select = document.getElementById('sel_maderas');
        var opcion = document.createElement('option');
        for (let i = 0; i < arreglo.length; ++i) {
            var td = document.createElement('td');
            if (i == 0) {
                td.innerHtml = i;
                opcion.value = json.ID;
            } else if (i == 1) {
                opcion.innerHTML = "(" + arreglo[i] + ") " + datos.Nombre_Madera;
                select.appendChild(opcion);
            }
            td.setAttribute('scope', 'col');
            td.innerHTML = arreglo[i];
            tr.appendChild(td);

        }
        document.getElementById('tabla_madera').appendChild(tr);
    }
    else {
        form[4].value = datos.stock[0].Precio_Unidad;
        form[5].value = datos.stock[0].Stock;
    }
}
function DatosTablaReporte(datos, cantidad) {
    var json;
    if (datos.Accion == 'Entrada') {
        if (datos.ID_Madera != null) {
            json = {
                'ID': datos.ID_Madera,
                'Codigo': datos.Codigo,
                'Nombre_Madera': datos.Nombre_Madera,
                'Empleado': datos.Nombres + " " + datos.Apellidos,
                'Dep': datos.Departamento,
                'Puesto': datos.Nombre_Puesto,
                'Entrada': datos.Cantidad,
                'Salida': 0,
                'Stock': datos.Stock,
                'Gasto': datos.Gasto_Entrada,
                'Fecha_Registro': datos.Fecha,
                'Hora_Registro': datos.Hora
            };
        }
    } else {
        if (datos.ID_Madera != null) {
            json = {
                'ID': datos.ID_Madera,
                'Codigo': datos.Codigo,
                'Nombre_Madera': datos.Nombre_Madera,
                'Empleado': datos.Nombres + " " + datos.Apellidos,
                'Dep': datos.Departamento,
                'Puesto': datos.Nombre_Puesto,
                'Entrada': 0,
                'Salida': datos.Cantidad,
                'Stock': datos.Stock,
                'Gasto': datos.Gasto_Entrada,
                'Fecha_Registro': datos.Fecha,
                'Hora_Registro': datos.Hora
            };
        }
    }
    var arreglo = [cantidad + 1, json.Codigo, json.Nombre_Madera, json.Empleado, json.Dep, json.Puesto, json.Entrada, json.Salida, json.Stock, '$' + json.Gasto, json.Fecha_Registro, json.Hora_Registro];
    var tr = document.createElement('tr');
    for (let i = 0; i < arreglo.length; ++i) {
        var td = document.createElement('td');
        td.setAttribute('scope', 'col');
        td.innerHTML = arreglo[i];
        tr.appendChild(td);
    }
    document.getElementById('tabla_reporte_madera_body').appendChild(tr);
}
function Modificar(datos) {
    var form = document.forms['formulario_madera'];
    form[0].value = datos.Codigo;
    form[1].value = datos.Nombre_Madera;
    form[2].value = datos.Precio;
    form.setAttribute('onsubmit', "return Validar_Formulario(" + '"modificar"' + ',' + datos.ID + ");");
    document.getElementById('btn_submit').innerHTML = 'Actualizar';
    document.getElementById('btn_submit').classList.replace('btn-success', 'btn-primary');
    document.documentElement.scrollTop = 0;
}
function LimpiarFormulario() {
    var form = document.forms['formulario_madera'];
    document.getElementById('btn_submit').innerHTML = 'Registrar';
    document.getElementById('btn_submit').classList.replace('btn-primary', 'btn-success');
    form.setAttribute('onsubmit', "return Validar_Formulario();");
    for (let x = 0; x < form.length; x++) {
        form[x].value = "";
    }
}
function LimpiarFormularioStock() {
    var form = document.forms['formulario_madera_stocks'];
    document.getElementById('btn_submit').innerHTML = 'Registrar';
    document.getElementById('btn_submit').classList.replace('btn-primary', 'btn-success');
    form.setAttribute('onsubmit', "return Validar_Formulario();");
    for (let x = 0; x < form.length; x++) {
        form[x].value = "";
    }
    form[2].setAttribute('disabled', '');
    form[3].setAttribute('disabled', '');
    document.getElementById('sel_maderas').setAttribute('disabled', '');
    LimpiarSelect();
}
function LimpiarTabla() {
    var tabla = document.getElementById('tabla_madera');
    var ultimo_tabla = tabla.lastElementChild;
    while (ultimo_tabla) {
        tabla.removeChild(ultimo_tabla);
        ultimo_tabla = tabla.lastElementChild;
    }
}
function LimpiarTablaReporte() {
    var tabla = document.getElementById('tabla_reporte_madera_body');
    var ultimo_tabla = tabla.lastElementChild;
    while (ultimo_tabla) {
        tabla.removeChild(ultimo_tabla);
        ultimo_tabla = tabla.lastElementChild;
    }
}
function Cargar_Stock() {
    LimpiarTabla();
    /* LimpiarSelect();
     LimpiarFormularioStock();
     LimpiarTablaReporte();*/
}
function LimpiarSelect() {
    var select = document.getElementById('sel_maderas');
    var ultima_opcion = select.lastElementChild;
    while (ultima_opcion) {
        select.removeChild(ultima_opcion);
        ultima_opcion = select.lastElementChild;
    }
    var select = document.getElementById('sel_maderas');
    var opcion = document.createElement('option');
    opcion.innerHTML = "Seleccionar";
    select.appendChild(opcion);
    EnviarDatos('', 'consultar_maderas');
}
function Eliminar(id) {
    if (confirm('¿Seguro quiere eliminar esta madera?') == true) {
        let json = {
            'ID': id
        };
        EnviarDatos(json, 'eliminar_madera');
    }
}
$(function () {
    $("#exporttable_madera1").click(function (e) {
        var table = $("#tabla_madera_");
        var tbody = $("#tabla_madera");
        $(table).toggleClass
        if (table && tbody.children().length > 0) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "excel_maderas" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: true
            });
        } else {
            alert('No se puede descargar una tabla vacia.!');
        }
    });

});

$(function () {
    $("#exporttable_madera2").click(function (e) {
        var table = $("#tabla_reporte_madera");
        var tbody = $("#tabla_reporte_madera_body");
        $(table).toggleClass
        if (table && tbody.children().length > 0) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "excel_maderas" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: true
            });
        } else {
            alert('No se puede descargar una tabla vacia.!');
        }
    });

});

function Mostrar_Tabla(btn, activar) {
    if (btn.id == 'btn_mostrar') {
        var tabla = document.getElementById('tabla_madera');
        var btn = document.getElementById('btn_mostrar');
        if (activar === false) {
            tabla.classList.remove('d-none');
            btn.innerHTML = "Ocultar Tabla";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla(' + 'this' + ', true)');
            EnviarDatos('', 'consultar_maderas');
        } else {
            tabla.classList.add('d-none')
            btn.innerHTML = "Mostrar Tabla";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla(' + 'this' + ', false)');
            LimpiarTabla();
        }
    }
}
function Mostrar_Tabla_Reportes(btn, activar) {
    if (btn.id == 'btn_mostrar_reporte') {
        var btn = document.getElementById('btn_mostrar_reporte');
        if (activar === false) {
            btn.innerHTML = "Ocultar Reportes";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla_Reportes(' + 'this' + ', true)');
            EnviarDatos('', 'consultar_reportes_madera');
        } else {
            btn.innerHTML = "Mostrar Reportes";
            btn.removeAttribute('onclick');
            LimpiarTablaReporte();
            btn.setAttribute('onclick', 'Mostrar_Tabla_Reportes(' + 'this' + ', false)');
        }
    }
}

function Seleccion_Opcion(opcion) {
    var form = document.forms['formulario_madera_stocks'];
    LimpiarSelect();
    if (opcion.value == 1) {
        form[1].removeAttribute('disabled');
        form[2].removeAttribute('disabled');
        form[3].setAttribute('disabled', '');
        form[3].value = "";
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks(' + '"' + 'entrada' + '"' + ')');
    } else if (opcion.value == 2) {
        form[1].removeAttribute('disabled');
        form[2].setAttribute('disabled', '');
        form[2].value = "";
        form[3].removeAttribute('disabled');
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks(' + '"' + 'salida' + '"' + ')');
    } else {
        document.getElementById('sel_maderas').value = "";
        document.getElementById('sel_maderas').setAttribute('disabled', true);
        form[0].removeAttribute('disabled');
        form[1].setAttribute('disabled', '');
        form[2].setAttribute('disabled', '');
        form[3].setAttribute('disabled', '');
        form[2].value = "";
        form[3].value = "";
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks()');
    }
}
function Seleccion_Madera(seleccion) {
    EnviarDatos(seleccion.value, 'consultar_madera_stock', true);
}
function Validar_Formulario_Stocks(opcion) { // formulario stock
    var form = document.forms['formulario_madera_stocks'];
    let usuario = JSON.parse(sessionStorage.getItem('Sesion'));
    var id_empleado = usuario[0].ID_Empleado;
    var id = form[1];
    var Precio = form[4];
    var Total;
    var stock = form[5];
    var cantidad;
    var json;
    let confirmar_entrada;
    var date = new Date();
    var year = date.getFullYear();
    var mes = date.getMonth() + 1;
    var dia = date.getDate();
    var hora = date.getHours();
    var min = date.getMinutes();
    var seg = date.getSeconds();
    var hora;
    var fecha;
    if (mes.toString().length < 2) {
        mes = '0' + mes;
    }
    fecha = year + '-' + mes + '-' + dia;
    if (hora.toString().length < 2) {
        hora = '0' + hora;
    }
    if (min.toString().length < 2) {
        min = '0' + min;
    }
    if (seg.toString().length < 2) {
        seg = '0' + seg;
    }

    hora = hora + ":" + min + ":" + seg;
    if (opcion == 'entrada') {
        cantidad = form[2].value;
        confirmar_entrada = confirm('¿Desea registrar de entrada ' + cantidad + ' al stock?');
        if (confirmar_entrada == true) {
            var nuevo_stock = parseInt(stock.value) + parseInt(cantidad);
            var total = parseFloat(cantidad) * parseFloat(Precio.value);
            json = {
                'ID_Empleado': id_empleado,
                'ID': id.value,
                'Entrada': cantidad,
                'Stock': parseInt(nuevo_stock),
                'Fecha_Registro': fecha,
                'Hora_Registro': hora,
                'Accion': 'Entrada',
                'Cantidad': cantidad,
                'Gasto_Entrada': total,

            };
            EnviarDatos(json, 'actualizar_entrada_salida');
        }
    } else if (opcion == 'salida') {
        cantidad = form[3].value;
        confirmar_entrada = confirm('¿Desea registrar de salida ' + cantidad + ' al stock?');
        if (confirmar_entrada == true) {
            var nuevo_stock = parseInt(stock.value) - parseInt(cantidad);
            json = {
                'ID_Empleado': id_empleado,
                'ID': id.value,
                'Salida': cantidad,
                'Stock': nuevo_stock,
                'Fecha_Registro': fecha,
                'Hora_Registro': hora,
                'Accion': 'Salida',
                'Cantidad': cantidad,
                'Gasto_Entrada': 'Ninguno'
            };
            EnviarDatos(json, 'actualizar_entrada_salida');

        }
    }
    return false;
}
function filtrarCantidad(opcion) {
    var form = document.forms['formulario_madera_stocks'];
    var stock = form[5];
    if (form[1].value !== "Seleccionar") {
        if (opcion.name === 'entradaMadera') {
            if (opcion.value < 0) {
                opcion.value = opcion.value.substring(0, opcion.value.length - 1);
                opcion.value = "";
                alert('Solo numeros positivos');
            }
        } else if (opcion.name === 'salidaMadera') {
            if (opcion.value < 0) {
                opcion.value = opcion.value.substring(0, opcion.value.length - 1);
                opcion.value = "";
                alert('Solo numeros positivos');
            } else {
                if (parseInt(opcion.value) > parseInt(stock.value)) {
                    opcion.value = opcion.value.substring(0, opcion.value.length - 1);
                    alert('La cantidad de salida sobrepasa el stock.');
                }
            }
        }
        else if (opcion.name === 'precio') {
            if (opcion.value < 0) {
                opcion.value = opcion.value.substring(0, opcion.value.length - 1);
                opcion.value = "";
                alert('Solo numeros positivos');
            }
        }
    } else {
        alert('Debe seleccionar una tipo de madera o registrar si no sale alguna.!');
        opcion.value = opcion.value.substring(0, opcion.value.length - 1);
    }
}

window.onload = () => {
    let usuario = JSON.parse(sessionStorage.getItem('Sesion'));
    if (usuario !== null) {
        document.getElementById('nombre_empleado').innerText = usuario[0].Nombres + " " + usuario[0].Apellidos;
        if (usuario[0].ID_Puesto == 1 || usuario[0].ID_Puesto == 9) {
            Contador();
        } else {
            sessionStorage.clear();
            window.location.replace('../../login.php');
        }
    }
    else {
        sessionStorage.clear();
        window.location.replace('../../login.php');
    }
};
function Salir() {
    sessionStorage.clear();
    window.location.replace('../../login.php');
}