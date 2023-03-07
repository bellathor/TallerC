function Seleccion_Categoria_Materiales(seleccion) {
    var form = document.forms['formulario_material'];
    if (seleccion.value != "") {
        form[1].removeAttribute('disabled');
        form[2].removeAttribute('disabled');
        form[3].removeAttribute('disabled');
    } else {
        form[1].setAttribute('disabled', '');
        form[2].setAttribute('disabled', '');
        form[3].setAttribute('disabled', '');
        form[1].value = "";
        form[2].value = "";
        form[3].value = "";
    }
}
function Formato_Texto(input) {
    var formato = /^[A-z0-9]+$/;
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

function Contador() {
    url = "../../php/scripts/solicitudes_inventario.php?consultar_materiales";
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(datos => {
            var materiales = datos.materiales;
            document.getElementById('conteo_materiales').innerText = materiales.length;
        })
        .catch(error => console.error("Error encontrado: ", error));
}
function Validar_Formulario(opcion, id, entrada_salida, cantidad) { // formulario madera
    const form = document.forms['formulario_material'];
    var select = document.getElementById('seleccion_categoria');
    var categoria = form[0].value;
    var codigo = form[1].value;
    var material = form[2].value;
    var precio = form[3].value;

    var json = {
        'ID': id,
        'Categoria': select.children[categoria].innerHTML,
        'Codigo': codigo,
        'Material': material,
        'Precio': precio,
        'Stock': 0
    };
    if (opcion == false) {
        if (confirm('¿Desea registrar este material?') == true) {
            EnviarDatos(json, 'insertar_material');
        }
    } else if (opcion == 'modificar') {
        if (confirm('¿Desea actualizar este material?') == true) {
            EnviarDatos(json, 'actualizar_materiales');
        }
    }
    return false;
}
function Eliminar(id) {
    if (confirm('¿Seguro quiere eliminar este material?') == true) {
        let json = {
            'ID': id
        };
        EnviarDatos(json, 'eliminar_material');
    }
}
function EnviarDatos(objeto, opcion, stock_opcion) {
    var url = '../../php/scripts/solicitudes_inventario.php';
    if (opcion == 'insertar_material') { // POST
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
                if (datos.error == 'false') {
                    alert('Material registrada exitosamente.!');
                    LimpiarFormulario();
                    LimpiarTabla();
                    EnviarDatos('', 'consultar_materiales');
                } else {
                    alert('Ya existe un material registrada con este codigo.!');
                }

            })
            .catch(error => console.error("Error encontrado: ", error));
    } else if (opcion == 'consultar_materiales') { // GET
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {
                if (datos != null) {
                    var materiales = datos.materiales;
                    for (let i = 0; i < materiales.length; i++) {
                        document.getElementById('conteo_materiales').innerText = materiales.length;
                        setTimeout(DatosTabla, 100 * i, materiales[i], false, i);
                    }
                } else {
                    alert('Ocurrio un error.!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'consultar_material') { // GET
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
    else if (opcion == 'consultar_reportes_materiales') { // GET
        var urlEnvio = url + '/?' + opcion;
        fetch(urlEnvio, {
            method: 'GET'
        })
            .then(response => response.json())
            .then(datos => {
                if (datos != null) {
                    var reportes = datos.reportes;
                    for (let i = 0; i < reportes.length; i++) {
                        setTimeout(DatosTablaReporte, 100 * i, reportes[i], i);
                    }
                } else {
                    alert('Ocurrio un error.!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'actualizar_materiales') { // PUT
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
                    LimpiarFormulario();
                    LimpiarTabla();
                    EnviarDatos('', 'consultar_materiales');
                    document.forms['formulario_material'].setAttribute('onsubmit', 'return Validar_Formulario(false)');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'actualizar_entrada_material') { // PUT
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
                    LimpiarFormularioStock();
                    LimpiarTablaReporte();
                    EnviarDatos('', 'consultar_reportes_materiales');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else if (opcion == 'actualizar_salida_material') { // PUT
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
                    LimpiarFormularioStock();
                    LimpiarTablaReporte();
                    EnviarDatos('', 'consultar_reportes_materiales');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }

    else if (opcion == 'eliminar_material') { // DELETE
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
                    LimpiarTabla();
                    EnviarDatos('', 'consultar_materiales');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
}

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
function filtrarCantidad(opcion) {
    var form = document.forms['formulario_materiales_stocks'];
    var stock = form[5];
    if (form[1].value !== "Seleccionar") {
        if (opcion.name === 'entrada') {
            if (form[1].value == "Seleccionar") {
                alert('Debe seleccionar un material para agregar entrada o salida.!');
                opcion.value = opcion.value.substring(0, opcion.value.length - 1);
            }
            else {
                if (opcion.value < 0) {
                    opcion.value = opcion.value.substring(0, opcion.value.length - 1);
                    opcion.value = "";
                    alert('Solo numeros positivos');
                }
            }
        } else if (opcion.name === 'salida') {
            if (form[1].value == "Seleccionar") {
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
    } else if (opcion.name === 'precio') {
        if (opcion.value < 0) {
            opcion.value = opcion.value.substring(0, opcion.value.length - 1);
            opcion.value = "";
            alert('Solo numeros positivos');
        }
    }
    else {
        alert('Debe seleccionar una tipo de madera o registrar si no sale alguna.!');
        opcion.value = opcion.value.substring(0, opcion.value.length - 1);
    }
}
function Mostrar_Tabla(btn, activar) {
    if (btn.id == 'btn_mostrar') {
        var tabla = document.getElementById('tabla_material');
        var btn = document.getElementById('btn_mostrar');
        LimpiarTabla();
        if (activar === false) {
            tabla.classList.remove('d-none');
            btn.innerHTML = "Ocultar Tabla";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla(' + 'this' + ', true)');
            EnviarDatos('', 'consultar_materiales');
        } else {
            tabla.classList.add('d-none');
            btn.innerHTML = "Mostrar Tabla";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla(' + 'this' + ', false)');
            LimpiarTabla();
        }
    }
}
function LimpiarTabla() {
    var tabla = document.getElementById('tabla_material');
    var ultimo_tabla = tabla.lastElementChild;
    while (ultimo_tabla) {
        tabla.removeChild(ultimo_tabla);
        ultimo_tabla = tabla.lastElementChild;
    }
}

function DatosTabla(datos, stock, cantidad) {
    var form = document.forms['formulario_materiales_stocks'];
    if (stock == false) {
        var json = {
            'ID': datos.ID_Material,
            'Codigo': datos.Codigo,
            'Material': datos.Nombre_Material,
            'Precio': datos.Precio_Unitario,
            'Categoria': datos.Categoria

        };
        var arreglojson = [cantidad + 1, json.Codigo, json.Material, json.Precio, json.Categoria];
        var arreglo = [arreglojson[0], arreglojson[1], arreglojson[2], arreglojson[3], arreglojson[4], "<a class='btn btn-primary' onclick='Modificar(" + JSON.stringify(json) + ")'>Modificar</a>", "<a class='btn btn-danger' onclick='Eliminar(" + json.ID + ")'>Eliminar</a>"];
        var tr = document.createElement('tr');
        var select = document.getElementById('sel_materiales');
        var opcion = document.createElement('option');
        for (let i = 0; i < arreglo.length; ++i) {
            var td = document.createElement('td');
            if (i == 0) {
                td.innerHtml = i;
                opcion.value = json.ID;
            } else if (i == 1) {
                opcion.innerHTML = json.Material;
                select.appendChild(opcion);
            }
            td.setAttribute('scope', 'col');
            td.innerHTML = arreglo[i];
            tr.appendChild(td);
        }
        document.getElementById('tabla_material').appendChild(tr);
    }
    else {
        form[4].value = datos.stock[0].Precio_Unitario;
        form[5].value = datos.stock[0].Stock;
    }
}
function Modificar(datos) {
    LimpiarFormulario();
    var form = document.forms['formulario_material'];
    var select = document.getElementById('seleccion_categoria');
    form[1].value = datos.Codigo;
    form[2].value = datos.Material;
    form[3].value = datos.Precio;

    form[1].removeAttribute('disabled');
    form[2].removeAttribute('disabled');
    form[3].removeAttribute('disabled');
    form[4].removeAttribute('disabled');

    for (let x = 1; x < select.childElementCount; x++) {
        if (select.children[x].innerText == datos.Categoria) {
            form[0].value = select.children[x].value;
        }
    }

    form.setAttribute('onsubmit', "return Validar_Formulario(" + '"modificar"' + ',' + datos.ID + ");");
    document.getElementById('btn_submit').innerHTML = 'Actualizar';
    document.getElementById('btn_submit').classList.replace('btn-success', 'btn-primary');
    document.documentElement.scrollTop = 0;
}
function LimpiarFormulario() {
    var form = document.forms['formulario_material'];
    document.getElementById('btn_submit').innerHTML = 'Registrar';
    document.getElementById('btn_submit').classList.replace('btn-primary', 'btn-success');
    form[1].setAttribute('disabled', '');
    form[3].setAttribute('disabled', '');
    form[2].setAttribute('disabled', '');
    form.setAttribute('onsubmit', "return Validar_Formulario(false);");
    for (let x = 0; x < form.length; x++) {
        form[x].value = "";
    }
}
function Seleccion_Opcion(opcion) {
    var form = document.forms['formulario_materiales_stocks'];
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
    }
    else {
        document.getElementById('sel_materiales').value = "";
        document.getElementById('sel_materiales').setAttribute('disabled', true);
        form[0].removeAttribute('disabled');
        form[1].setAttribute('disabled', '');
        form[2].setAttribute('disabled', '');
        form[3].setAttribute('disabled', '');
        form[2].value = "";
        form[3].value = "";
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks()');
    }
}
// registro
function Cargar_Datos() {
    LimpiarFormulario();
    LimpiarTabla();
}

// stock
function Cargar_Stock() {
    LimpiarSelectMaterial();
    LimpiarFormularioStock();
    LimpiarTablaReporte();
    EnviarDatos('', 'consultar_materiales');
}

function LimpiarSelectMaterial() {
    var select = document.getElementById('sel_materiales');
    var ultima_opcion = select.lastElementChild;
    while (ultima_opcion) {
        select.removeChild(ultima_opcion);
        ultima_opcion = select.lastElementChild;
    }
    var select = document.getElementById('sel_materiales');
    var opcion = document.createElement('option');
    opcion.innerHTML = "Seleccionar";
    select.appendChild(opcion);
}
function Seleccion_Opcion_stock(opcion) {
    var form = document.forms['formulario_materiales_stocks'];

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
        document.getElementById('sel_materiales').setAttribute('disabled', true);
        form[0].removeAttribute('disabled');
        form[1].setAttribute('disabled', '');
        form[2].setAttribute('disabled', '');
        form[3].setAttribute('disabled', '');
        form[2].value = "";
        form[3].value = "";
        form.setAttribute('onsubmit', 'return Validar_Formulario_Stocks()');
        LimpiarSelectMaterial();
        EnviarDatos('', 'consultar_materiales');
    }
}
function Seleccion_Materiales(seleccion) {
    EnviarDatos(seleccion.value, 'consultar_material', true);
}
function Validar_Formulario_Stocks(opcion) { // formulario stock
    var form = document.forms['formulario_materiales_stocks'];
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
            EnviarDatos(json, 'actualizar_entrada_material');
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
            EnviarDatos(json, 'actualizar_salida_material');;
        }
    }
    return false;
}
function LimpiarFormularioStock() {
    var form = document.forms['formulario_materiales_stocks'];
    document.getElementById('btn_submit').innerHTML = 'Registrar';
    document.getElementById('btn_submit').classList.replace('btn-primary', 'btn-success');
    form.setAttribute('onsubmit', "return Validar_Formulario_Stocks();");
    for (let x = 0; x < form.length; x++) {
        form[x].value = "";
    }
    form[2].setAttribute('disabled', '');
    form[3].setAttribute('disabled', '');
    form[4].setAttribute('disabled', '');
    document.getElementById('sel_materiales').setAttribute('disabled', '');
    LimpiarSelectMaterial();
}

function Mostrar_Tabla_Reportes(btn, activar) {
    if (btn.id == 'btn_mostrar_reporte') {
        var btn = document.getElementById('btn_mostrar_reporte');
        var tabla = document.getElementById('tabla_reporte_material_body');
        LimpiarTablaReporte();
        if (activar === false) {
            tabla.classList.remove('d-none');
            btn.innerHTML = "Ocultar Reportes";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla_Reportes(' + 'this' + ', true)');
            EnviarDatos('', 'consultar_reportes_materiales');
        } else {
            tabla.classList.add('d-none');
            btn.innerHTML = "Mostrar Reportes";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla_Reportes(' + 'this' + ', false)');
            LimpiarTablaReporte();
        }
    }
}
function DatosTablaReporte(datos, cantidad) {
    console.log(datos);
    if (datos.Accion == 'Entrada') {
        if (datos.ID_Material != null && datos.Fecha_Registro !== "null") {
            var json = {
                'ID': datos.ID_Material,
                'Codigo': datos.Codigo,
                'Nombre_Material': datos.Nombre_Material,
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
    }
    else {
        if (datos.ID_Material != null && datos.Fecha_Registro !== "null") {
            var json = {
                'ID': datos.ID_Material,
                'Codigo': datos.Codigo,
                'Nombre_Material': datos.Nombre_Material,
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
    var arreglo = [cantidad + 1, json.Codigo, json.Nombre_Material, json.Empleado, json.Dep, json.Puesto, json.Entrada, json.Salida, json.Stock, '$' + json.Gasto, json.Fecha_Registro, json.Hora_Registro];
    var tr = document.createElement('tr');
    for (let i = 0; i < arreglo.length; ++i) {
        var td = document.createElement('td');
        td.setAttribute('scope', 'col');
        td.innerHTML = arreglo[i];
        tr.appendChild(td);
    }
    document.getElementById('tabla_reporte_material_body').appendChild(tr);
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
        var table = $("#tabla_material_");
        var tabody = $("#tabla_material")
        $(table).toggleClass
        if (table && tabody.children().length > 0) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "excel_materiales" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
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
    $("#exporttable_mat2").click(function (e) {
        var table = $("#tabla_reporte_material");
        var tabody = $("#tabla_reporte_material_body");
        $(table).toggleClass
        if (table && tabody.children().length > 0) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "excel_materiales" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
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

window.onload = () => {
    let em = document.getElementById('empleados');
            let ti = document.getElementById('tiendas');
            let pr = document.getElementById('produccion');
            //let bo = document.getElementById('bodegas');
            let co = document.getElementById('compras');
            let ad = document.getElementById('administracion');
            //let inv = document.getElementById('inventarios');
    let usuario = JSON.parse(sessionStorage.getItem('Sesion'));
    if (usuario !== null) {
        document.getElementById('nombre_empleado').innerText = usuario[0].Nombres + " " + usuario[0].Apellidos;
        if (usuario[0].ID_Puesto == 1 || usuario[0].ID_Puesto == 9) {
            Contador();
        }
        else if (usuario[0].ID_Puesto == 11) {
            em.remove();
            ti.remove();
            pr.remove();
            ad.remove();
            co.remove();
        }
        else {
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