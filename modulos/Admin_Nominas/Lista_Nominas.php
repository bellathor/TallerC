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
    <link rel="shortcut icon" href="../../img/logo_tallerc.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../../bootstrap-/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>-->
    <script src="../../bootstrap-/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>
    <script src="../../js/admin_nominas.js?2122023_02_24"></script>
    <link href="../../css/dashboard_estilo.css?v1.0.0.15" rel="stylesheet">
    <!--<link href="../css/admin.css?v1.0.0.1" rel="stylesheet">-->
</head>

<body>
    <div class="row" style="height: 100%;">
        <div class="col-3 p-0">
            <div class="box-modulos ">
                <div class="vertical-menu letra titulo">
                    <div class="border-bottom border-1 border-white">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid d-block w-25 h-25" src="../../img/logo_tallerc.png" alt="logo">
                        </div>
                        <p class="text-center letra titulo">SISTEMA INVENTARIO</p>
                    </div>
                    <ul class="list-unstyled ps-0 p-0">
                        <li class="p-1"><a href="../dashboard.php" class="link-white rounded">Dashboard</a></li>
                        <li class="mb-1" id="empleados">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras">
                                <a href="../empleados.php" class="link-white rounded">Empleados</a>
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
                        <li class="mb-1" id="bodegas">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#bodega-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded" id="btn-bodega">Bodega Taller</a>
                            </button>

                            <div class="collapse" id="bodega-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li><a href="../Bodega_Taller/Categoria_Maderas.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Maderas</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Hilos.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Hilos</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Tapiceria.php"
                                            class="link-white rounded">Categoria
                                            Tapiceria</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Trupper.php"
                                            class="link-white rounded">Categoria
                                            Ferretaria</a>
                                    </li>
                                    <li><a href="../Bodega_Taller/Categoria_Pintura.php"
                                            class="link-white rounded">Categoria Pintura</a>
                                    </li>
                                    <li><a href="../Bodega_Taller/Categoria_Maquinas.php"
                                            class="link-white rounded">Categoria
                                            Maquinas</a></li>
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
                                    <li><a href="#" class="link-white rounded">Informacion contable de compras</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1" id="administracion">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#admin_nominas-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded">Admin y Nominas</a>
                            </button>
                            <div class="collapse" id="admin_nominas-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li><a href="../Admin_Nominas/Lista_Nominas.php" class="link-white rounded">Lista de
                                            nominas</a></li>
                                    <li><a href="../Admin_Nominas/Gastos_Generales.php"
                                            class="link-white rounded">Gastos generales</a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="mb-1" id="inventarios">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras"
                                data-bs-toggle="collapse" data-bs-target="#inventarios-collapse" aria-expanded="true">
                                <a href="#" class="link-white rounded">Inventarios</a>
                            </button>
                            <div class="collapse" id="inventarios-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 p-4 small">
                                    <li>
                                        <a href="../inventario/madera.php" class="link-white rounded">Maderas</a>
                                    </li>
                                    <li>
                                        <a href="../inventario/materiales.php" class="link-white rounded">Materiales</a>
                                    </li>
                                    <li>
                                        <a href="../inventario/muebles.php" class="link-white rounded">Muebles ( En
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
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <div class="container p-1">
                                <h3 class="letra titulo text-center">Control de Empleados</h3>
                                <!--<div class="grid letra m-2">
                                    <div class="grid-item text-center p-3">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Empleados</h3>
                                        <span id="empleados_total" class="mt-5">0</span>
                                    </div>
                                    <div class="grid-item text-center p-3">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Empleados sin
                                            Nominas</h3>
                                        <span id="empleados_sin_nomina" class="mt-5">0</span>
                                    </div>
                                    <div class="grid-item text-center p-3">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Empledos con Nominas
                                        </h3>
                                        <span id="empleados_nominas" class="mt-5">0</span>
                                    </div>
                                </div>-->
                                <ul class="nav nav-tabs p-1" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="registro_nominas-tab" data-bs-toggle="tab"
                                            data-bs-target="#registro_nominas" type="button" role="tab"
                                            aria-controls="registro_nominas" aria-selected="true"
                                            onclick="Cargar_Nominas();">Formulario
                                            Nominas</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link " id="gestion_nominas-tab" data-bs-toggle="tab"
                                            data-bs-target="#gestion_nominas" type="button" role="tab"
                                            aria-controls="gestion_nominas" aria-selected="false"
                                            onclick="Cargar_Gestion();">Gestion
                                            Nominas</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="registro_nominas" role="tabpanel"
                                        aria-labelledby="registro_nominas-tab">
                                        <div class="form-hilos p-1 m-2 border border-1">
                                            <form method="POST" name="formulario_nominas_registro"
                                                onsubmit="return Validar_Formulario();">
                                                <h3 class="letra titulo text-center">Registro de Nominas</h3>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="nombre">Nombre
                                                            Completo:</label>
                                                        <input class="form-control" name="nombre" type="text"
                                                            placeholder="Nombre empleado" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity(''); filtrarTextos(this);">
                                                        <div id="error_letra_nombre" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_nombre"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="cargo">Cargo:</label>
                                                        <input class="form-control" name="cargo" type="text"
                                                            placeholder="Escriba los nombres" required disabled
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
                                                        <label class="form-label mt-2" for="salario">
                                                            Salario Semanal Actual:</label>
                                                        <input class="form-control" name="salario" type="number" min="0"
                                                            placeholder="$0.00" required step="0.01" disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick='filtrarTextos(this);'>
                                                        <div id="error_letra_apellidos" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_apellidos"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="horas_laborales">Horas
                                                            Laborales:</label>
                                                        <input class="form-control" name="horas_laborales" type="number"
                                                            min="0" placeholder="0" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextos(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="pago_hora">Pago por
                                                            Hora:</label>
                                                        <input class="form-control" name="pago_hora" type="number"
                                                            min="0" placeholder="$0.00" required step=0.01 disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextos(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success mt-2" type="submit">Guardar</button>
                                                <a class="btn btn-danger mt-2"
                                                    onclick="Limpiar_Formulario()">Limpiar</a>
                                            </form>

                                        </div>
                                        <h3 class="letra text-center mt-3">Nominas de Empleados</h3>
                                        <a class="btn btn-secondary m-3 float-end" id='exporttable' disabled>Exportar
                                            Excel</a>
                                        <span class="text-start mt-3">Mostrar por departamento:</span>
                                        <select class="form-select w-25 mb-3" name="select_dep" required
                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                            oninput="this.setCustomValidity(''); Mostrar_Empleados_Dep(this);"
                                            id='Seleccion_Departamento'>
                                            <option selected value="100">
                                                Seleccionar</option>
                                            <option value="0">
                                                Todos</option>
                                        </select>
                                        <div class="table-responsive">
                                            <table id="tabla_empleados_"
                                                class="table table-bordered table-wrapper-scroll-y my-custom-scrollbar">
                                                <thead style="position: sticky; top:0">
                                                    <tr class="color_tienda text-white">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombres</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Departamento</th>
                                                        <th scope="col">Puesto</th>
                                                        <th scope="col">Salario Semanal</th>
                                                        <th scope="col">Horas Laborales</th>
                                                        <th scope="col">Pago por Hora</th>
                                                        <th scope="col">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla_empleados">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="gestion_nominas" role="tabpanel"
                                        aria-labelledby="gestion_nominas-tab">
                                        <div class="form-hilos p-1 m-2 border border-1">
                                            <form method="POST" name="formulario_gestion_nominas"
                                                onsubmit="return Validar_Formulario_Gest();">
                                                <h3 class="letra titulo text-center">Gestion de Nominas</h3>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="cod">Seleccion
                                                            accion:</label>
                                                        <div class="input-group h-50 mb-3">
                                                            <select class="form-select w-100 mb-3" id="seleccion_opcion"
                                                                disabled name="opcion_nominas"
                                                                oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                                oninput="this.setCustomValidity('')"
                                                                onchange="Seleccion_Opcion_Gest(this)" required>
                                                                <option selected value="100">Seleccionar</option>
                                                                <option value="2">Prestamos</option>
                                                                <option value="4">Horas No Trabajadas</option>
                                                            </select>
                                                            <div id="error_letra_opcion_nominas"
                                                                class="d-none invalid-feedback">Solo se permiten letras
                                                                y sin espacios.</div>
                                                            <div id="error_maxletras_opcion_nominas"
                                                                class="d-none invalid-feedback">Llegaste maximo de
                                                                letras.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="nombre">Nombre
                                                            Completo:</label>
                                                        <input class="form-control" name="nombre" type="text"
                                                            placeholder="Nombre empleado" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity(''); filtrarTextos(this);">
                                                        <div id="error_letra_nombre" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_nombre"
                                                            class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="cargo">Cargo:</label>
                                                        <input class="form-control" name="cargo" type="text"
                                                            placeholder="Cargo Empleado" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');filtrarTextos(this);">
                                                        <div id="error_letra_nombres" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_nombres"
                                                            class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="prestamo">
                                                            Prestamo:</label>
                                                        <input class="form-control" name="prestamo" type="number"
                                                            placeholder="0.00" required step="0.01" disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextosGest(this);">
                                                        <div id="error_letra_apellidos" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_apellidos"
                                                            class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="horas_no_trabajadas">Horas
                                                            no
                                                            Trabajadas:</label>
                                                        <input class="form-control" name="horas_no_trabajadas"
                                                            type="number" placeholder="0.00" required step=0.01 disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextosGest(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="salario">
                                                            Salario Semanal Actual:</label>
                                                        <input class="form-control" name="salario" type="number"
                                                            placeholder="$0.00" required step="0.01" disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick='filtrarTextos(this);'>
                                                        <div id="error_letra_apellidos" class="d-none invalid-feedback">
                                                            Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_apellidos"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="horas_laborales">Horas
                                                            Laborales:</label>
                                                        <input class="form-control" name="horas_laborales" type="number"
                                                            placeholder="0" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextos(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="pago_hora">Pago por
                                                            Hora:</label>
                                                        <input class="form-control" name="pago_hora" type="number"
                                                            placeholder="$0.00" required step=0.01 disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextos(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="descuento">
                                                            Descuento:</label>
                                                        <input class="form-control" name="descuento" type="number"
                                                            placeholder="$0.00" required disabled step=0.01
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextos(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="total">Total:</label>
                                                        <input class="form-control" name="total" type="number"
                                                            placeholder="$0.00" required step=0.01 disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextos(this);">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="coment">Comentarios:</label>
                                                        <input class="form-control" name="coment" type="text"
                                                            placeholder="Ingrese comentario" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo no acepta numeros negativos.!')"
                                                            oninput="this.setCustomValidity('');"
                                                            onclick="filtrarTextosGest(this)">
                                                        <div id="error_letra_direccion" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_direccion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success mt-2" type="submit">Guardar</button>
                                                <a class="btn btn-danger mt-2"
                                                    onclick="Limpiar_Formulario_Gest();">Limpiar</a>
                                            </form>

                                        </div>
                                        <h3 class="letra text-center mt-3 mb-4">Nominas de Empleados</h3>
                                        <a class="btn btn-primary m-1 mt-4 float-end"
                                            onclick='Realizar_Cierre();'>Realizar Cierre</a>
                                        <span class="text-start mt-3">Mostrar por departamento:</span>
                                        <select class="form-select w-25 mb-3" name="select_dep" required
                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                            oninput="this.setCustomValidity(''); Mostrar_Empleados_Dep_Ges(this);"
                                            id='Seleccion_Departamento2'>
                                            <option selected value="100">
                                                Seleccionar</option>
                                            <option value="0">
                                                Todos</option>
                                        </select>
                                        <div class="table-responsive">
                                            <table id="tabla_empleados_gestion_"
                                                class="table table-bordered table-wrapper-scroll-y my-custom-scrollbar">
                                                <thead style="position: sticky; top:0">
                                                    <tr class="color_tienda text-white">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombres</th>
                                                        <th scope="col">Apellidos</th>
                                                        <th scope="col">Departamento</th>
                                                        <th scope="col">Puesto</th>
                                                        <th scope="col">Salario Semanal</th>
                                                        <th scope="col">Prestamos</th>
                                                        <th scope="col">Horas Laborales</th>
                                                        <th scope="col">Horas Trabajadas</th>
                                                        <th scope="col">Horas No Trabajadas</th>
                                                        <th scope="col">Precio por Hora</th>
                                                        <th scope="col">Descuento</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Comentarios</th>
                                                        <th scope="col">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla_empleados_gestion">

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