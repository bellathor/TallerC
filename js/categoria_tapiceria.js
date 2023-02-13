window.onload = () => {
    Cargar_Hilos();
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

        }  else if (usuario[0].ID_Puesto == 11) {
            em.remove();
            ti.remove();
            pr.remove();
            ad.remove();
            co.remove();
            inv.remove();
        }else {
            window.location.replace('../../login.php');
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
function Cargar_Hilos() {
    Fetch_GET(null, 'consultar_tapicerias');
}
function Fetch_GET(id, opcion) {
    var url = '../../php/scripts/apis/bodega_taller/api_tapiceria.php';

    if (opcion == 'consultar_tapicerias') {
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {

                if (datos.hilos != null) {
                    var hilos = datos.hilos;
                    for (let x = 0; x < hilos.length; x++) {

                        setTimeout(Llenar_Lista, 100 * x, hilos[x], hilos.length);
                    }
                } else if (hilos.error == 'true') {
                    alert('Hubo un problema con la base de datos.!');
                }

            })
            .catch(error => console.error("Error encontrado: ", error));
    } else if (opcion == 'consultar_tapiceria') {
        var urlEnvio = url + '/?' + opcion + "&id=" + id;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {
                if (datos.hilo != null) {
                    var hilo = datos.hilo;
                    for (let x = 0; x < hilo.length; x++) {
                        setTimeout(Llenar_Formulario, 100 * x, hilo[x], hilo.length);
                    }
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    if (opcion == 'consultar_reportes_materiales') { // GET
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {
                if (datos.reportes != null) {

                    var reportes = datos.reportes;
                    for (let i = 0; i < reportes.length; i++) {
                        LimpiarTablaReporte();
                        setTimeout(DatosTablaReporte, 100 * i, reportes[i], i);
                    }
                } else {
                    alert('No hay reportes de tapiceria.!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
}

function Llenar_Formulario(datos, cantidad) {
    var form = document.forms['formulario_stocks'];
    let json = {
        'Stock': datos.Stock,
        'Precio': datos.Precio_Unitario
    };
    form[2].value = json.Precio;
    form[3].value = json.Stock;
    console.log(form[2].value);
}


function Llenar_Lista(datos, cantidad) {
    let json = {
        'ID': datos.ID_Material,
        'Codigo': datos.Codigo,
        'Material': datos.Nombre_Material,
        'Stock': datos.Stock,
        'Precio': datos.Precio_Unitario,
        'Categoria': datos.Categoria,
    };
    var arreglo = [json.ID, json.Material];
    var option = document.createElement('option');
    for (let i = 0; i < arreglo.length; i++) {
        var select = document.getElementById('sel_material');
        if (i === 0) {
            option.value = arreglo[i];
        } else {
            option.innerText = arreglo[i] + "["+json.Codigo+"]";
        }

    }
    select.appendChild(option);
}

function Seleccion_Materiales(seleccion) {
    var form = document.forms['formulario_stocks'];

    if (seleccion.value != "Seleccionar") {
        Fetch_GET(seleccion.value, 'consultar_tapiceria');
        form[1].removeAttribute('disabled');
        form[1].value = "";
    } else {
        Limpiar_Formulario();
        form[1].setAttribute('disabled', '');
    }
}

function Limpiar_Formulario() {
    var form = document.forms['formulario_stocks'];
    for (let i = 0; i < form.length; i++) {
        form[i].value = "0";
    }
    form[1].setAttribute('disabled', '');
    form[0].value = form[0].options[0].text;
}

function Seleccion_Opcion(opcion) {
    var form = document.forms['formulario_stocks'];

    if (opcion.value == 1) {
        document.getElementById('sel_materiales').removeAttribute('disabled');
        form[2].removeAttribute('disabled');
        form[3].setAttribute('disabled', '');
        form[3].value = "";
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks(' + '"' + 'entrada' + '"' + ')');

    } else if (opcion.value == 2) {
        document.getElementById('sel_materiales').removeAttribute('disabled');
        form[3].removeAttribute('disabled');
        form[2].setAttribute('disabled', '');
        form[2].value = "";
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks(' + '"' + 'salida' + '"' + ')');
        document.getElementById('sel_materiales').value = "";
        document.getElementById('sel_materiales').setAttribute('disabled', true);
        form[0].removeAttribute('disabled');
        form[2].setAttribute('disabled', '');
        form[3].setAttribute('disabled', '');
        form[2].value = "";
        form[3].value = "";
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks()');
    }
}

function filtrarCantidad(opcion) {
    var form = document.forms['formulario_stocks'];
    var stock = form[3];
    if (opcion.name === 'salida') {
        if (form[0].value == "Seleccionar") {
            alert('Debe seleccionar un material para agregar entrada o salida.!');
            opcion.value = opcion.value.substring(0, opcion.value.length - 1);
        } else {
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
    }
}

function Validar_Formulario_Stocks() {
    var form = document.forms['formulario_stocks'];
    let usuario = JSON.parse(sessionStorage.getItem('Sesion'));
    var id_empleado = usuario[0].ID_Empleado;
    var id = form[0];
    var Total;
    var stock = form[3];
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
    fecha = year + '/' + mes + '/' + dia;

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
    if (id.value != "Seleccionar") {
        cantidad = form[1].value;
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
            Fetch_PUT(json, 'actualizar_salida_material');;
        }

    } else {
        alert('Debe seleccionar un tipo de madera primero.!');
    }

    return false;
}

function Fetch_PUT(objeto, opcion) {
    var url = '../../php/scripts/apis/bodega_taller/api_tapiceria.php';
    if (opcion == 'actualizar_salida_material') { // PUT
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
                if (datos.error == "false") {
                    Limpiar_Formulario();
                    LimpiarTablaReporte();
                    Cargar_Tabla_Reporte();
                } else {
                    alert('Hubo un problema con la base de datos.!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
}

function Mostrar_Tabla_Reportes(btn, activar) {
    if (btn.id == 'btn_mostrar_reporte') {
        var tabla = document.getElementById('tabla_reporte_material');
        var btn = document.getElementById('btn_mostrar_reporte');
        if (activar === false) {
            btn.innerHTML = "Ocultar Reportes";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla_Reportes(' + 'this' + ', true)');
            Cargar_Tabla_Reporte()
        } else {
            btn.innerHTML = "Mostrar Reportes";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla_Reportes(' + 'this' + ', false)');
            LimpiarTablaReporte()
        }
    }
}

function Cargar_Tabla_Reporte() {
    Fetch_GET('', 'consultar_reportes_materiales');
}

function DatosTablaReporte(datos, cantidad) {
    var json = {
        'ID': datos.ID_Madera,
        'Codigo': datos.Codigo,
        'Nombre_Material': datos.Nombre_Material,
        'Salida': datos.Cantidad,
        'Stock': datos.Stock,
        'Gasto': datos.Gasto_Entrada,
        'Fecha_Registro': datos.Fecha,
        'Hora_Registro': datos.Hora
    };
    var arreglo = [cantidad + 1, json.Codigo, json.Nombre_Material, json.Salida, json.Stock, json.Fecha_Registro, json.Hora_Registro];
    var tr = document.createElement('tr');
    for (let i = 0; i < arreglo.length; ++i) {
        var td = document.createElement('td');
        td.setAttribute('scope', 'col');
        td.innerHTML = arreglo[i];

        tr.appendChild(td);
        document.getElementById('tabla_reporte_material_body').appendChild(tr);
    }

}
function LimpiarTablaReporte() {
    var tabla = document.getElementById('tabla_reporte_material_body');
    var ultimo_tabla = tabla.lastElementChild;
    while (ultimo_tabla) {
        tabla.removeChild(ultimo_tabla);
        ultimo_tabla = tabla.lastElementChild;
    }
}

$(function () {
    $("#exporttable_mat1").click(function (e) {
        var table = $("#tabla_reporte_material");
        var tablebody = $("#tabla_reporte_material_body");
        $(table).toggleClass
        if (table && tablebody.children().length > 0) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "TallerC_Excel_Hilos" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: true
            });
        }else{
            alert('No se puede descargar una tabla vacia.!');
        }
    });

});

