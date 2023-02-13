function Validar_Formulario(id) {
    //var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

    let form = document.forms.namedItem('formulario_empleados');
    let seld = form[0];
    let selp = form[1];
    let usnombre = form[2];
    let nombres = form[3];
    let apellidos = form[4];
    let direccion = form[5];
    let correo = form[6];
    let telefono = form[7];
    let pass = form[8];
    let rpass = form[9];

    if (pass.value == rpass.value) {
        if (confirm('¿Deseá registrar a ' + nombres.value + " " + apellidos.value + "?")) {
            /*if(pass.value.length >= 7){
                Registrar_Empleados(id, usnombre.value, nombres.value, apellidos.value, direccion.value, correo.value, telefono.value, pass.value, selp.value);
            }else{
                alert('La contraseña debe ser mayor a 7 letras, que incluya numeros y signos');
            }*/
            Registrar_Empleados(id, usnombre.value, nombres.value, apellidos.value, direccion.value, correo.value, telefono.value, pass.value, selp.value);
        }
        else {
            return false;
        }
    } else {
        alert('Las contraseñas no coinciden.!');
    }
    return false;
}

function Registrar_Empleados(id, us, nombres, apellidos, dir, corr, tel, pass, puest) {

    const url = '../php/scripts/apis/empleados/api_empleados.php?insertar_empleados';
    const json = {
        'ID': id,
        'NombreUsuario': us,
        'Nombres': nombres,
        'Apellidos': apellidos,
        'Direccion': dir,
        'Correo': corr,
        'Telefono': tel,
        'Contraseña': pass,
        'Puesto': puest,
        'Prestamo': null,
        'Asistencia': null,
        'Estatus': 1,
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    })
        .then(response => response.json())
        .then(data => {
            var empleados = data.empleados;
            if (empleados === "Existe") {
                alert('Error: Empleado con ese nombre de usuario ya existe, Cambielo.!');
            } else if (empleados === "registrado") {
                Eliminar_Tabla();
                Limpiar_Formulario();
                Consultar_Empleados();
                alert('Empleado registrado correctamente.!');
            } else {
                alert('Error: ocurrio algo no se pudo realizar el registro.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Verificar_Textos(input) {
    const letrasformat = /^[A-Z-a-z ]+$/;
    const letrasformatNombres = /^[A-Za-z ]+$/;
    const usuarioformat = /^[]+$/;
    const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const telformat = /^[0-9]+$/;
    var pass = "";
    var divErrorLetra = document.getElementById('error_letra_' + input.name);
    var divErrorMaxLetra = document.getElementById('error_maxletras_' + input.name);

    /*if (input.name == 'nombres' || input.name == 'apellidos') { // caracteres permitidos
        if (input.value.match(letrasformatNombres)) {
            if (input.value.charAt(0).toLowerCase()) {
                input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1);
                if (input.value.length > 14) {
                    input.classList.remove('is-valid');
                    input.classList.add("is-invalid");
                    divErrorMaxLetra.classList.replace('d-none', 'd-block');
                    input.value = input.value.substring(0, input.value.length - 1);
                }
            }
        }
        else {
            if (input.value.length > 0) {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
                divErrorLetra.classList.replace('d-none', 'd-block');
                input.value = input.value.substring(0, input.value.length - 1);
            } else {
                input.classList.remove('is-valid');
                input.classList.remove('is-invalid');
                divErrorLetra.classList.replace('d-block', 'd-none');
                divErrorMaxLetra.classList.replace('d-block', 'd-none');

            }
        }
    } else if (input.name == 'nombreUsuario') {
        if (input.value.match(usuarioformat)) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            divErrorMaxLetra.classList.replace('d-block', 'd-none');
            divErrorLetra.classList.replace('d-block', 'd-none');
        }
        else {
            if (input.value.length > 0) {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
                divErrorLetra.classList.replace('d-none', 'd-block');
                input.value = input.value.substring(0, input.value.length - 1);
            } else {
                input.classList.remove('is-valid');
                input.classList.remove('is-invalid');
                divErrorLetra.classList.replace('d-block', 'd-none');
                divErrorMaxLetra.classList.replace('d-block', 'd-none');

            }
        }
    }
    else if (input.value.match(letrasformat) && input.name != 'telefono') {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        divErrorMaxLetra.classList.replace('d-block', 'd-none');
        divErrorLetra.classList.replace('d-block', 'd-none');
        if (input.name == 'direccion') {
            if (input.value.length > 50) {
                input.classList.remove('is-valid');
                input.classList.add("is-invalid");
                divErrorMaxLetra.classList.replace('d-none', 'd-block');
                input.value = input.value.substring(0, input.value.length - 1);
            }
            else if (input.value.length < 1) {
                input.classList.remove('is-invalid');
                input.classList.remove("is-valid");
                divErrorLetra.classList.replace('d-block', 'd-none');
                divErrorMaxLetra.classList.replace('d-block', 'd-none');
            }
            else {
                input.classList.remove('is-invalid');
                input.classList.add("is-valid");
                divErrorLetra.classList.replace('d-block', 'd-none');
                divErrorMaxLetra.classList.replace('d-block', 'd-none');

            }
        }
        else if (input.name == 'telefono') {
            if (input.value.match(telformat)) {
                if (input.value.length > 10) {
                    input.classList.remove('is-valid');
                    input.classList.add("is-invalid");
                    input.value = input.value.substring(0, input.value.length - 1);
                    divErrorMaxLetra.classList.replace('d-none', 'd-block');
                } else {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                    divErrorMaxLetra.classList.replace('d-block', 'd-none');
                    divErrorLetra.classList.replace('d-block', 'd-none');
                }
            } else {
                input.classList.remove('is-valid');
                input.classList.add("is-invalid");
                divErrorLetra.classList.replace('d-none', 'd-block');
                input.value = input.value.substring(0, input.value.length - 1);
            }
        }
        else {
            if (input.value.length > 0) {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
                divErrorLetra.classList.replace('d-none', 'd-block');
                input.value = input.value.substring(0, input.value.length - 1);
            } else {
                input.classList.remove('is-valid');
                input.classList.remove('is-invalid');
                divErrorLetra.classList.replace('d-block', 'd-none');
                divErrorMaxLetra.classList.replace('d-block', 'd-none');

            }
        }
    }*/
}


function Eliminar_Tabla() {
    let element = document.getElementById("tabla_empleados");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
}

function Consultar_Empleados() { // todos los empleados
    const url = '../php/scripts/apis/empleados/api_empleados.php?consultar_empleados';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var empleados = data.empleados;
            if (empleados !== "null") {
                for (let i = 0; i < empleados.length; i++) {
                    Eliminar_Tabla();
                    setTimeout(Crear_Tabla_Empleados, 100 * i, empleados[i], i);
                }
                document.getElementById('empleado_total').innerHTML = empleados.length;
            } else {
                alert('No hay empleados registrados.!');
            }

        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Crear_Tabla_Empleados(em, cantidad) {
    const empleado = {
        'ID': cantidad,
        'IDEmpleado': em.ID_Empleado,
        'Usuario': em.Nombre_Usuario,
        'Nombres': em.Nombres,
        'Apellidos': em.Apellidos,
        'Direccion': em.Direccion,
        'Telefono': em.Telefono,
        'Email': em.Correo_Electronico,
        'Puesto': em.Nombre_Puesto,
        'Departamento': em.Departamento
    };

    let arregloempleados = [];
    arregloempleados = [empleado.ID + 1, empleado.Usuario, empleado.Nombres, empleado.Apellidos, empleado.Direccion, empleado.Telefono, empleado.Email, empleado.Puesto, empleado.Departamento, "<a class='btn btn-primary' onclick=Consultar_Empleado(" + empleado.IDEmpleado + ")>Modificar</a>", "<a class='btn btn-danger' onclick=Eliminar_Empleado(" + empleado.IDEmpleado + ")>Eliminar</a>"];
    var tr = document.createElement('tr');
    for (let x = 0; x < arregloempleados.length; x++) {
        var td = document.createElement('td');
        td.setAttribute('scope', 'col');
        td.innerHTML = arregloempleados[x];
        tr.appendChild(td);
        document.getElementById('tabla_empleados').appendChild(tr);
    }

}
function Consultar_Empleado(id) { // empleado unico
    const url = '../php/scripts/apis/empleados/api_empleados.php?consultar_empleado&id=' + id;
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            if (data != null) {
                var empleado = data.empleado;

                if (empleado !== null) {
                    for (let i = 0; i < empleado.length; i++) {
                        setTimeout(Modificar_Empleado, 100 * i, empleado[i]);
                    }
                    console.log(empleado);
                } else {
                    alert('Error: Ocurrió un error al encotrar el empleado.!')
                }
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Consultar_Departamentos() {
    const url = '../php/scripts/apis/departamentos/api_departamentos.php?consultar_departamentos';
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var departamentos = data.departamentos;
            if (departamentos !== "null") {
                for (let i = 0; i < departamentos.length; i++) {
                    setTimeout(Crear_Select_Departamentos, 100 * i, departamentos[i]);
                }
            } else {
                alert('No hay departamentos registrados.!');
            }

        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Crear_Select_Departamentos(d) {
    const departamento = {
        'ID': d.ID_Departamento,
        'Departamento': d.Departamento
    };

    let arreglopuestos = [];
    arreglopuestos = [departamento.ID, departamento.Departamento];
    let option = document.createElement('option');
    for (let i = 0; i < arreglopuestos.length; ++i) {
        if (i == 0) {
            option.setAttribute('value', arreglopuestos[i]);
        } else {
            option.innerHTML = arreglopuestos[i];
        }
    }
    document.getElementById('Seleccion_Departamentos').before(option);
}

function Mostrar_Puestos_Por_Departamento() {
    const form = document.forms.namedItem('formulario_empleados');
    var sel_dep = form[0];
    if (sel_dep.value != "") {
        Consultar_Puesto(sel_dep.value)
        Eliminar_Select();
    }
}

function Consultar_Puesto(dep) {
    const url = '../php/scripts/apis/puestos/api_puestos.php?consultar_puestos&id=' + dep;
    fetch(url, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            var puesto = data.puestos;
            if (puesto !== "null") {
                for (let i = 0; i < puesto.length; i++) {
                    setTimeout(Crear_Select_Puestos, 100 * i, puesto[i],);
                }
            } else {
                alert('No hay puestos registrados.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Crear_Select_Puestos(p) {
    const puesto = {
        'ID': p.ID_Puesto,
        'Puesto': p.Nombre_Puesto
    };

    let arreglopuestos = [];
    arreglopuestos = [puesto.ID, puesto.Puesto];
    let option = document.createElement('option');
    for (let i = 0; i < arreglopuestos.length; ++i) {
        if (i == 0) {
            option.setAttribute('value', arreglopuestos[i]);
        } else {
            option.innerHTML = arreglopuestos[i];
        }
    }
    document.getElementById('Seleccion_Puestos').append(option);
}



function Modificar_Empleado(em) {
    Limpiar_Formulario();
    let form = document.forms.namedItem('formulario_empleados');
    form.setAttribute('onsubmit', 'return Validar_Formulario_Modificacion(' + em.ID_Empleado + ');');
    let sel_dep = form[0];
    let sel_puesto = form[1];
    let usnombre = form[2];
    let nombres = form[3];
    let apellidos = form[4];
    let direccion = form[5];
    let correo = form[6];
    let telefono = form[7];

    sel_dep.value = em.ID_Departamento;
    Mostrar_Puestos_Por_Departamento();
    setTimeout(() => {
        sel_puesto.value = em.ID_Puesto;
    }, 500);
    usnombre.value = em.Nombre_Usuario;
    usnombre.setAttribute('disabled', true);
    nombres.value = em.Nombres;
    apellidos.value = em.Apellidos;
    direccion.value = em.Direccion;
    correo.value = em.Correo_Electronico;
    telefono.value = em.Telefono;

    document.documentElement.scrollTop = 0;
    /* document.getElementById('btn_evento').classList.replace('btn-success', 'btn-primary');
     document.getElementById('btn_evento').innerHTML = 'Actualizar';*/

    //sel_puesto.value = 1;
}

function Validar_Formulario_Modificacion(id) {
    //var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

    let form = document.forms.namedItem('formulario_empleados');
    let seld = form[0];
    let selp = form[1];
    let usnombre = form[2];
    let nombres = form[3];
    let apellidos = form[4];
    let direccion = form[5];
    let correo = form[6];
    let telefono = form[7];
    let pass = form[8];
    let rpass = form[9];

    if (pass.value == rpass.value) {
        if (confirm('¿Deseá modificar este empleado?')) {
            Actualizar_Empleado(id, usnombre.value, nombres.value, apellidos.value, direccion.value, correo.value, telefono.value, pass.value, selp.value);
        }
        else {
            return false;
        }
    } else {
        alert('Las contraseñas no coinciden.!');
    }
    return false;
}

function Actualizar_Empleado(id, us, nombres, apellidos, dir, corr, tel, pass, puest) {

    const url = '../php/scripts/apis/empleados/api_empleados.php?actualizar_empleados';
    const json = {
        'ID': id,
        'NombreUsuario': us,
        'Nombres': nombres,
        'Apellidos': apellidos,
        'Direccion': dir,
        'Correo': corr,
        'Telefono': tel,
        'Contraseña': pass,
        'Puesto': puest,
        'Prestamo': null,
        'Asistencia': null,
        'Estatus': 1,
    };

    fetch(url, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(json)
    })
        .then(response => response.json())
        .then(data => {
            var empleados = data.empleados;
            if (empleados === 'Error actualizacion') {
                alert('Error: Ocurrió un error al actualizar el empleado.!');
            } else if (empleados === 'Actualizado') {
                Eliminar_Tabla();
                Limpiar_Formulario();
                Consultar_Empleados();
                alert('Empleado actualizado correctamente.!');
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Eliminar_Empleado(idEmpleado) {
    if (confirm('¿Deseá modificar este empleado?')) {
        const url = '../php/scripts/apis/empleados/api_empleados.php?eliminar_empleado';
        const json = {
            'IDEmpleado': idEmpleado
        };

        fetch(url, {
            method: 'DELETE',
            body: JSON.stringify(json),
            headers: {
                'Content-Type': 'application/json',
            }
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                if (data == "") {
                    Eliminar_Tabla();
                    Consultar_Empleados();
                    alert('Empleado eliminado.!');
                } else {
                    alert('Hubo un error..!');
                }
            })
            .catch(error => console.error("Error encontrado: ", error));
    }
    else {
        return false;
    }
}
function Limpiar_Formulario() {
    let form = document.forms.namedItem('formulario_empleados');

    for (let j = 0; j < form.length; j++) {
        form[j].value = "";
        form[j].classList.remove('is-invalid');
        form[j].classList.remove('is-valid');
    }

    form[2].removeAttribute('disabled');

    document.getElementById('error_letra_nombreUsuario').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_nombreUsuario').classList.replace('d-block', 'd-none');

    document.getElementById('error_letra_nombres').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_nombres').classList.replace('d-block', 'd-none');

    document.getElementById('error_letra_apellidos').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_apellidos').classList.replace('d-block', 'd-none');

    document.getElementById('error_letra_direccion').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_direccion').classList.replace('d-block', 'd-none');

    document.getElementById('error_letra_correo').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_correo').classList.replace('d-block', 'd-none');

    document.getElementById('error_letra_telefono').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_telefono').classList.replace('d-block', 'd-none');

    document.getElementById('error_letra_password').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_password').classList.replace('d-block', 'd-none');

    document.getElementById('error_letra_rpassword').classList.replace('d-block', 'd-none');
    document.getElementById('error_maxletras_rpassword').classList.replace('d-block', 'd-none');

    /* document.getElementById('btn_evento').classList.replace('btn-primary', 'btn-success');
     document.getElementById('btn_evento').innerHTML = 'Registrar';*/

    Eliminar_Select();

    form.setAttribute('onsubmit', 'return Validar_Formulario();');

}

function Eliminar_Select() {
    let element = document.getElementById("Seleccion_Puestos");
    while (element.firstChild) {
        element.removeChild(element.firstChild);
    }
    let option = document.createElement('option');
    let txt = document.createTextNode('Seleccionar');
    option.setAttribute('value', "");
    option.append(txt);
    document.getElementById('Seleccion_Puestos').append(option);
}

function Descargar_Excel() {
    var t = new table2Excel();
}

$(function () {
    $("#exporttable").click(function (e) {
        var table = $("#tabla_empleados_");
        var tablebody = $("#tabla_empleados");
        $(table).toggleClass
        if (table && tablebody.children().length > 0) {
            $(table).addClass('text-dark');
            $(table).table2excel({
                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "excel_empleados" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
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
        var tabla = document.getElementById('tabla_empleados');
        var btn = document.getElementById('btn_mostrar');
        if (activar === false) {
            tabla.classList.remove('d-none');
            btn.innerHTML = "Ocultar Tabla";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla(' + 'this' + ', true)');
            Consultar_Empleados();
        } else {
            tabla.classList.add('d-none')
            btn.innerHTML = "Mostrar Tabla";
            btn.removeAttribute('onclick');
            btn.setAttribute('onclick', 'Mostrar_Tabla(' + 'this' + ', false)');
            Eliminar_Tabla();
        }
    }
}

//+ ".xlsx"

window.onload = () => {
    Consultar_Departamentos();
   /* let em = document.getElementById('empleados');
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
        }else {
            window.location.replace('../login.php');
        }
    }
    else {
        window.location.replace('../login.php');
    }*/
};
function Salir() {
    sessionStorage.clear();
    window.location.replace('../login.php');
}