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