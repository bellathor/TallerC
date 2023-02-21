<!DOCTYPE html>
<html lang="en">

<head>
    <title>TALLERC</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="shortcut icon" href="../img/logo_tallerc.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../bootstrap-/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>-->
    <script src="../bootstrap-/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>
    <script src="../js/empleados.js?2122023_02_15"></script>
    <link href="../css/dashboard_estilo.css?v1.0.0.15" rel="stylesheet">
    <!--<link href="../css/admin.css?v1.0.0.1" rel="stylesheet">-->
</head>

<body>
    <div class="row" style="height: 100%;">
        <div class="col-3 p-0">
            <div class="box-modulos " id="grupo">
                <div class="vertical-menu letra titulo">
                    <div class="border-bottom border-1 border-white">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid d-block w-25 h-25" src="../img/logo_tallerc.png" alt="logo">
                        </div>
                        <p class="text-center letra titulo">SISTEMA INVENTARIO</p>
                    </div>
                    <ul class="list-unstyled ps-0 p-0">
                        <li class="p-1"><a href="dashboard.php" class="link-white rounded">Dashboard</a></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras">
                                <a href="#" class="link-white rounded">Empleados</a>
                            </button>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#tiendas-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded">Tiendas</a>
                            </button>
                            <div class="collapse" id="tiendas-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li><a href="#" class="link-white rounded">Aldea
                                            Zama</a></li>
                                    <li><a href="#" class="link-white rounded">La Veleta</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#produccion-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded">Produccion</a>
                            </button>

                            <div class="collapse" id="produccion-collapse" data-parent="#group">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li><a href="#" class="link-white rounded" id="btn-proyecto">Proyectos</a></li>
                                    <li><a href="#" class="link-white rounded">Biblia</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#bodega-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded" id="btn-bodega">Bodega Taller</a>
                            </button>

                            <div class="collapse" id="bodega-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li><a href="./Bodega_Taller/Categoria_Maderas.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Maderas</a></li>
                                    <li><a href="./Bodega_Taller/Categoria_Hilos.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Hilos</a></li>
                                    <li><a href="./Bodega_Taller/Categoria_Tapiceria.php"
                                            class="link-white rounded">Categoria Tapiceria</a></li>
                                    <li><a href="./Bodega_Taller/Categoria_Trupper.php"
                                            class="link-white rounded">Categoria Ferretaria</a></li>
                                    <li><a href="./Bodega_Taller/Categoria_Pintura.php"
                                            class="link-white rounded">Categoria Pintura</a></li>
                                    <li><a href="./Bodega_Taller/Categoria_Maquinas.php"
                                            class="link-white rounded">Categoria Maquinas</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#compras-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded">Compras</a>
                            </button>
                            <div class="collapse" id="compras-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li><a href="#" class="link-white rounded">Lista de proveedores</a></li>
                                    <li><a href="#" class="link-white rounded">Requerimiento de material</a></li>
                                    <li><a href="#" class="link-white rounded">Bodega taller</a></li>
                                    <li><a href="#" class="link-white rounded">Requerimiento de material</a></li>
                                    <li><a href="#" class="link-white rounded">Informacion contable de compras</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#admin_nominas-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded">Admin y Nominas</a>
                            </button>
                            <div class="collapse" id="admin_nominas-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li><a href="./Admin_Nominas/Lista_Nominas.php" class="link-white rounded">Lista de
                                            nominas</a>
                                    </li>
                                    <li><a href="./Admin_Nominas/Gastos_Generales.php" class="link-white rounded">Gastos
                                            generales</a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#inventarios-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded">Inventarios</a>
                            </button>
                            <div class="collapse" id="inventarios-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li>
                                        <a href="./inventario/madera.php" class="link-white rounded">Maderas</a>
                                    </li>
                                    <li>
                                        <a href="./inventario/materiales.php" class="link-white rounded">Materiales</a>
                                    </li>
                                    <li>
                                        <a href="./inventario/muebles.php" class="link-white rounded">Muebles ( En
                                            construccion )</a></button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras">
                                <a class="link-white rounded" onclick="Salir();">Salir</a>
                            </button>
                        </li>
                    </ul>
                </div>
                </li>
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="box-nav letra titulo">
                        <span class="cargo-txt" id="nombre_empleado">Alberto - Administrador</span>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="container" id="maderas">
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <div class="container p-1" id="madera">
                                <h3 class="letra titulo text-center">Control de Empleados</h3>
                                <div class="grid letra m-2">
                                    <div class="dashboard_empleados">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Empleados</h3>
                                        <span id="empleado_total">0</span>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs p-1" id="myTab" role="tablist">
                                    <li class="nav-item  color_tienda" role="presentation">
                                        <button class="nav-link active " id="registro_empleado-tab" data-bs-toggle="tab"
                                            data-bs-target="#registro_empleado" type="button" role="tab"
                                            aria-controls="registro_empleado" aria-selected="true">Registro
                                            Empleado</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="registro_empleado" role="tabpanel"
                                        aria-labelledby="registro_empleado-tab">
                                        <div class="form-hilos p-1 m-2 border border-1">
                                            <form method="POST" name="formulario_empleados"
                                                onsubmit="return Validar_Formulario();">
                                                <h3 class="letra titulo text-center">Formulario Empleados</h3>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label mt-1"
                                                            for="select_departamentos">Seleccione el
                                                            Departamento:</label>
                                                        <div class="input-group h-5 mb-1">
                                                            <select class="form-select w-100 mb-3"
                                                                name="select_departamentos" required
                                                                oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                                oninput="this.setCustomValidity('')"
                                                                onchange="Mostrar_Puestos_Por_Departamento()">
                                                                <option selected value="" id='Seleccion_Departamentos'>
                                                                    Seleccionar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1" for="select_puesto">Seleccione
                                                            Puesto:</label>
                                                        <div class="input-group h-5 mb-1">
                                                            <select class="form-select w-100 mb-3" name="select_puesto"
                                                                required
                                                                oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                                oninput="this.setCustomValidity('')"
                                                                id='Seleccion_Puestos'>
                                                                <option selected value="">
                                                                    Seleccionar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="nombreUsuario">Nombre de
                                                            usuario:</label>
                                                        <input class="form-control" name="nombreUsuario" type="text"
                                                            placeholder="Escriba nombre de usuario" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity(''); filtrarTextos(this);">
                                                        <div id="error_letra_nombreUsuario"
                                                            class="d-none invalid-feedback">Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_nombreUsuario"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="nombres">Nombres:</label>
                                                        <input class="form-control" name="nombres" type="text"
                                                            placeholder="Escriba los nombres" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');filtrarTextos(this);">
                                                        <div id="error_letra_nombres" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_nombres"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>


                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="apellidos">
                                                            Apellidos:</label>
                                                        <input class="form-control" name="apellidos" type="text"
                                                            placeholder="Escriba los apellidos" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');filtrarTextos(this);">
                                                        <div id="error_letra_apellidos" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_apellidos"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2"
                                                            for="direccion">Direccion:</label>
                                                        <input class="form-control" name="direccion" type="text"
                                                            placeholder="Domicilio" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');filtrarTextos(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="correo">Correo:</label>
                                                        <input class="form-control" name="correo" type="email"
                                                            autocomplete="email"
                                                            placeholder="Escriba el correo electronico" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo. ejemplo correo@outlook.com!')"
                                                            oninput="this.setCustomValidity('');">
                                                        <div id="error_letra_correo" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_correo"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="telefono">Telefono:</label>
                                                        <input class="form-control" name="telefono" type="text" required
                                                            autocomplete="telefono" placeholder="+52 1 551133664"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');">
                                                        <div id="error_letra_telefono" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_telefono"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2"
                                                            for="password">Contraseña:</label>
                                                        <input class="form-control" name="password" type="password"
                                                            autocomplete="new-password" placeholder="**********"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');">
                                                        <div id="error_letra_password" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_password"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="rpassword">Repetir
                                                            Contraseña:</label>
                                                        <input class="form-control" name="rpassword" type="password"
                                                            autocomplete="new-password" placeholder="***********"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');">
                                                        <div id="error_letra_rpassword" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_rpassword"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>

                                                </div>
                                                <button class="btn btn-success mt-2" type="submit">Guardar</button>
                                                <a class="btn btn-danger mt-2"
                                                    onclick=" Limpiar_Formulario()">Limpiar</a>
                                            </form>

                                        </div>
                                        <h3 class="letra text-center mt-3" style="position: sticky; top:0">Tabla
                                            Empleados</h3>
                                        <a class="btn btn-primary mb-1" style="position: sticky; top:0" id="btn_mostrar"
                                            onclick="Mostrar_Tabla(this, false)">Mostrar Tabla</a>
                                        <a class="btn btn-secondary m-3" id="exporttable"
                                            style="position: sticky; top:0">Exportar Excel</a>
                                        <div class="table-responsive table-custom">
                                            <table id="tabla_empleados_"
                                                class="table table-bordered table-wrapper-scroll-y my-custom-scrollbar">
                                                <thead style="position: sticky; top:0">
                                                    <tr class="color_tienda text-white">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Usuario</th>
                                                        <th scope="col">Nombres</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Direccion</th>
                                                        <th scope="col">Telefono</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Puesto</th>
                                                        <th scope="col">Departamento</th>
                                                        <th scope="col">Modificar</th>
                                                        <th scope="col">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla_empleados">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>