function Verificar_Formulario() {
    const form = document.forms['login'];
    let user = form[0].value;
    let pass = form[1].value;
    let json = {
        "usuario": user,
        "password": pass
    };
    Comprobar_Usuario(json);
    return false;
}
function Comprobar_Usuario(json) {
    const url = "./php/scripts/apis/user/api_login.php/?ingreso_usuario";
    fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(json),
    }).then(response => response.json())
        .then(datos => {
            let error = datos.error;
            if (error == "no existe") {
                alert('Dato ingresado incorrecto.!');
            } else {
                Dirigir(datos.usuario);
            }
        })
        .catch(error => console.error("Error encontrado: ", error));
}

function Dirigir(datos) {
    sessionStorage.setItem('Sesion', JSON.stringify(datos));
    window.location.replace('./modulos/dashboard.php');
}

