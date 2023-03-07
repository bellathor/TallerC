function Filtrar_Textos(input) {
    var formatoCodigo = /^[A-z0-9]+$/;
    var formatoTxt = /^[A-z\u00f1\u00d1 ]+$/;
    var formatoNumero = /^[0-9.]+$/;
    if (input.name == 'cod') {
        if (input.value.match(formatoCodigo) || input.value == "") {

        } else {
            input.value = input.value.substring(0, input.value.length - 1);
            alert('Solo letras para el nombre del mueble');
        }
    } else if (input.name == 'mueble') {
        if (input.value.match(formatoTxt) || input.value == "") {

        } else {
            input.value = input.value.substring(0, input.value.length - 1);
            alert('Solo letras para el nombre del mueble');
        }
    } else if (input.name == 'muebleDescripcion') {

        if (input.value.match(formatoTxt) || input.value == "") {

        } else {
            input.value = input.value.substring(0, input.value.length - 1);
            alert('Solo letras para la descripcion');
        }
    } else if (input.name == 'muebleImagen') {


    } else if (input.name == 'ancho') {

        if (input.value.match(formatoNumero) || input.value == "") {

        } else {
            input.value = input.value.substring(0, input.value.length - 1);
            alert('Solo numeros para esta dimension');
        }
    } else if (input.name == 'alto') {

        if (input.value.match(formatoNumero) || input.value == "") {

        } else {
            input.value = input.value.substring(0, input.value.length - 1);
            alert('Solo numeros para esta dimension');
        }
    } else if (input.name == 'largo') {
        if (input.value.match(formatoNumero) || input.value == "") {

        } else {
            input.value = input.value.substring(0, input.value.length - 1);
            alert('Solo numeros para esta dimension');
        }
    }
}

function Validar_Formulario() {
    var form = document.forms['formulario_muebles'];
    var codigo = form[0].value;
    var nombre = form[1].value;
    var descripcion = form[2].value;
    var imagen = document.getElementById('imgMueble').files[0];
    var ancho = form[4].value;
    var alto = form[5].value;
    var fondo = form[6].value;
    var json = {
        'Codigo': codigo,
        'nombre': nombre,
        'Descripcion': descripcion,
        //'Imagen': imagen,
        'Ancho': ancho,
        'Alto': alto,
        'Fondo': fondo
    };

    Fetch_Post(json);
    return false;
}

function Fetch_Post(objeto) {
    var url = '../php/scripts/solicitudes_inventario.php';
    if (opcion == 'insertar_mueble') { // POST
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
                console.log(datos);

            })
            .catch(error => console.error("Error encontrado: ", error));
    }
}
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
        }else {
            sessionStorage.clear();
            window.location.replace('../..login.php');
        }
    }
    else {
        sessionStorage.clear();
        window.location.replace('../..login.php');
    }
};
function Salir() {
    sessionStorage.clear();
    window.location.replace('../..login.php');
}