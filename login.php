<!DOCTYPE html>
<html lang="en">

<head>
    <title>TALLERC</title>
    <meta charset="UTF-8">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="shortcut icon" href="./img/logo_tallerc.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap-/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>-->
    <script src="./bootstrap-/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script src="./js/login.js?0732023_11_11">
    </script>
    <link href="./css/login_estilo.css?v1.0.0.11" rel="stylesheet">
</head>

<body>
    <div class="container p-5">

        <div class="d-flex justify-content-center mt-5">
            <img class="img-fluid d-block" src="./img/logo_tallerc.png" alt="logo">
        </div>
        <div class="d-flex justify-content-center mt-5">
            <div class="text-white">
                <span class="titulologin h1">TALLERC</span>
                <div class="h6 text-center">CARPINTERÍA · MOBILIARIA ·
                    INTERIORISMO</div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5 text-center">
            <form name="login" onsubmit="return Verificar_Formulario();" method="POST">
                <div class="letra mb-3 text-white h2 ">
                    <label for="username" class="form-label">Nombre de
                        usuario</label>
                    <input class="form-control h3" type="text" required name="username"
                        placeholder="Escriba su nombre de usuario"
                        oninvalid="this.setCustomValidity('Debe ingresar su nombre de usuario.!')"
                        oninput="this.setCustomValidity('');">
                    <label for="username" class="form-label">Contraseña</label>
                    <input class="form-control h3" required type="password" name="contraseña"
                        placeholder="Escriba su contraseña"
                        oninvalid="this.setCustomValidity('Debe ingresar su contraseña.!')"
                        oninput="this.setCustomValidity('');">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-secondary">ENTRAR</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <h4 class="text-center">V1.0.0.12<h4>
    </footer>
</body>

</html>