<!DOCTYPE html>
<html lang="en">

<head>
    <title>TALLERC</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <link rel="shortcut icon" href="../img/logo_tallerc.ico">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>-->
    <script src="../bootstrap-/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script src="../js/dashboard.js?2122023_02_22"></script>
    <link href="../css/dashboard_estilo.css?v1.0.0.15" rel="stylesheet">
    <!--<link href="../css/admin.css?v1.0.0.1" rel="stylesheet">-->
</head>

<body>
    <div class="container-fluid" style="height: 100%;">
        <div class="row border" style="height: 100%;">
            <div class="col-3 p-0">
                <div class="box-modulos ">
                    <div class="vertical-menu letra titulo">
                        <div class="border-bottom border-1 border-white">
                            <div class="d-flex justify-content-center">
                                <img class="img-fluid d-block w-25 h-25" src="../img/logo_tallerc.png" alt="logo">
                            </div>
                            <p class="text-center letra titulo">SISTEMA INVENTARIO</p>
                        </div>
                        <ul class="list-unstyled ps-0 p-0">
                            <li class="p-1"><a href="dashboard.php" class="link-white rounded">Dashboard</a></li>
                            <li class="mb-1" id="empleados">
                                <button class="btn btn-toggle align-items-center rounded text-white botones_letras">
                                    <a href="./empleados.php" class="link-white rounded">Empleados</a>
                                </button>
                            </li>
                            <li class="mb-1" id="tiendas">
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
                            <li class="mb-1" id="produccion">
                                <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                    data-bs-toggle="collapse" data-bs-target="#produccion-collapse"
                                    aria-expanded="true">
                                    <a href="#" class="link-white rounded">Produccion</a>
                                </button>

                                <div class="collapse" id="produccion-collapse" data-parent="#group">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                        <li><a href="#" class="link-white rounded" id="btn-proyecto">Proyectos</a></li>
                                        <li><a href="#" class="link-white rounded">Biblia</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1" id="bodegas">
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
                            <li class="mb-1" id="compras">
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
                                        <li><a href="#" class="link-white rounded">Informacion contable de compras</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1" id="administracion">
                                <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                    data-bs-toggle="collapse" data-bs-target="#admin_nominas-collapse"
                                    aria-expanded="true">
                                    <a href="#" class="link-white rounded">Admin y Nominas</a>
                                </button>
                                <div class="collapse" id="admin_nominas-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                        <li><a href="./Admin_Nominas/Lista_Nominas.php" class="link-white rounded">Lista
                                                de nominas</a></li>
                                        <li><a href="./Admin_Nominas/Gastos_Generales.php"
                                                class="link-white rounded">Gastos generales</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li class="mb-1" id="inventarios">
                                <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                    data-bs-toggle="collapse" data-bs-target="#inventarios-collapse"
                                    aria-expanded="true">
                                    <a href="#" class="link-white rounded">Inventarios</a>
                                </button>
                                <div class="collapse" id="inventarios-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                        <li>
                                            <a href="./inventario/madera.php" class="link-white rounded">Maderas</a>
                                        </li>
                                        <li>
                                            <a href="./inventario/materiales.php"
                                                class="link-white rounded">Materiales</a>
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
                            <span class="cargo-txt" id="nombre_empleado"></span>
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="container" id="maderas">
                            <div class="tab-pane fade show active" id="admin" role="tabpanel"
                                aria-labelledby="admin-tab">
                                <div class="container p-1" id="madera">
                                    <h3 class="letra titulo text-center">Dashboard</h3>
                                    <div class="grid letra m-2">

                                        <div class="grid-item text-center p-3" id="dash_empleados">
                                            <h3 class="letra border-bottom border-1 border-white w-100">Empleados</h3>
                                            <span id="empleado_total" class="mt-5">0</span>
                                        </div>
                                        <div class="grid-item text-center p-3" id="dash_maderas">
                                            <h3 class="letra border-bottom border-1 border-white w-100">Maderas</h3>
                                            <span id="maderas_total" class="mt-5">0</span>
                                        </div>
                                        <div class="grid-item text-center p-3" id="dash_materiales">
                                            <h3 class="letra border-bottom border-1 border-white w-100">Materiales</h3>
                                            <span id="materiales_total" class="mt-5">0</span>
                                        </div>
                                        <div class="grid-item text-center p-3" id="dash_muebles">
                                            <h3 class="letra border-bottom border-1 border-white w-100">Muebles</h3>
                                            <span id="muebles_total" class="mt-5">0</span>
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