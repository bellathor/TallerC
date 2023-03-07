<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TALLERC</title>
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
    <script src="../../js/categoria_maderas.js?0732023_11_10"></script>
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
                                    <li><a href="Categoria_Maderas.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Maderas</a></li>
                                    <li><a href="Categoria_Hilos.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Hilos</a></li>
                                    <li><a href="Categoria_Tapiceria.php" class="link-white rounded">Categoria
                                            Tapiceria</a></li>
                                    <li><a href="Categoria_Trupper.php" class="link-white rounded">Categoria
                                            Ferretaria</a>
                                    </li>
                                    <li><a href="Categoria_Pintura.php" class="link-white rounded">Categoria Pintura</a>
                                    </li>
                                    <li><a href="Categoria_Maquinas.php" class="link-white rounded">Categoria
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
                        <span class="cargo-txt" id='nombre_empleado'></span>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="container" id="maderas">
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <div class="container p-1" id="madera">
                                <h3 class="letra titulo text-center">Categoria Hilos</h3>
                                <!--<div class="grid letra m-2">
                                    <div class="grid-item color_tienda">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Tapiceria</h3>
                                        <ul class="entrada">
                                            <li>
                                                <p class="text-center">Total</p>
                                                <p class="text-center" id="conteo_materiales"> 0</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="grid-item jabin">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Proveedores</h3>
                                        <ul class="entrada">
                                            <li>
                                                <span>Total:</span>
                                                <spanp class="text-center"> 0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->
                                <ul class="nav nav-tabs p-1" id="myTab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="cat_hilos-tab" data-bs-toggle="tab"
                                            data-bs-target="#cat_hilos" type="button" role="tab"
                                            aria-controls="cat_hilos" aria-selected="true">Entradas/Salidas</button>
                                    </li>
                                </ul>

                                <div class="tab-pane fade show active" id="cat_hilos" role="tabpanel"
                                    aria-labelledby="cat_hilos-tab">
                                    <div class="form-hilos p-1 m-2 border border-1">
                                        <form method="POST" name="formulario_stocks"
                                            onsubmit="return  Validar_Formulario_Stocks();">
                                            <h3 class="letra titulo text-center">Salida Maderas</h3>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label mt-1" for="selec_material">Seleccione
                                                        Maderas:</label>
                                                    <div class="input-group h-50 mb-1">
                                                        <select class="form-select w-100 mb-1" id="sel_material"
                                                            name="selec_material"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity(''); Seleccion_Materiales(this);"
                                                            required>
                                                            <option>Seleccionar</option>
                                                        </select>

                                                        <div id="error_letra_selec_material"
                                                            class="d-none invalid-feedback">Solo se permiten letras
                                                            y sin espacios.</div>
                                                        <div id="error_maxletras_selec_material"
                                                            class="d-none invalid-feedback">Llegaste maximo de
                                                            letras.</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label mt-1" for="salidaMadera">Salida:</label>
                                                    <input class="form-control w-30" name="salida" type="number"
                                                        placeholder="0" disabled required step="0.01" min="0"
                                                        oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                        oninput="this.setCustomValidity('');filtrarCantidad(this);">
                                                    <div id="error_letra_salidaMadera" class="d-none invalid-feedback">
                                                        Solo se permiten numeros.
                                                    </div>
                                                    <div id="error_maxletras_salidaMadera"
                                                        class="d-none invalid-feedback">Llegaste maximo de letras.
                                                    </div>
                                                    <div id="error_cantidad_salidaMadera"
                                                        class="d-none invalid-feedback">No tienes esa cantidad en
                                                        stock.
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label mt-0" for="Precio">Precio
                                                        Unidad:</label>
                                                    <input class="form-control w-30" name="precio" type="number"
                                                        placeholder="0" disabled required
                                                        oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                        oninput="this.setCustomValidity('');">

                                                    <div id="error_letra_entradaMadera" class="d-none invalid-feedback">
                                                        Solo se permiten numeros.
                                                    </div>
                                                    <div id="error_maxletras_entradaMadera"
                                                        class="d-none invalid-feedback">Llegaste maximo de letras.
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label mt-1" for="stock_madera">Stock:</label>
                                                    <input class="form-control w-30" name="stockMadera" type="number"
                                                        placeholder="0" disabled required
                                                        oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                        oninput="this.setCustomValidity('');">
                                                    <div id="error_letra_stockMadera" class="d-none invalid-feedback">
                                                        Solo se permiten letras y
                                                        sin espacios.</div>
                                                    <div id="error_maxletras_stockMadera"
                                                        class="d-none invalid-feedback">Llegaste maximo de letras.
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success mt-2" type="submit">Guardar</button>
                                            <a class="btn btn-danger mt-2" onclick="Limpiar_Formulario();">Limpiar</a>
                                        </form>
                                    </div>

                                    <h3 class="letra text-center mt-3" style="position: sticky; top:0">Reporte
                                        Maderas</h3>
                                        <p class="text-danger">Aviso: Esta tabla solo muestra salidas.</p>
                                    <a class="btn btn-primary mb-1" style="position: sticky; top:0"
                                        id="btn_mostrar_reporte" onclick="Mostrar_Tabla_Reportes(this, false)">Mostrar
                                        Reportes</a>
                                    <a class="btn btn-secondary mb-1" style="position: sticky; top:0"
                                        id="exporttable_mat1">Exportar Excel</a>
                                    <div class="table-responsive table-custom">
                                        <table id="tabla_reporte_material"
                                            class="table table-striped table-bordered table-sm my-custom-scrollbar">
                                            <thead style="position: sticky; top:0">
                                                <tr class="color_tienda text-white">
                                                    <th scope="col">N°</th>
                                                    <th scope="col">Código</th>
                                                    <th scope="col">Madera</th>
                                                    <th scope="col">Salidas</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Fecha Registro</th>
                                                    <th scope="col">Hora Registro</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_reporte_material_body">

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
</body>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TALLERC</title>
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
    <script src="../../js/categoria_maderas.js?2122023_05_46"></script>
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
                                    <li><a href="Categoria_Maderas.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Maderas</a></li>
                                    <li><a href="Categoria_Hilos.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Hilos</a></li>
                                    <li><a href="Categoria_Tapiceria.php" class="link-white rounded">Categoria
                                            Tapiceria</a></li>
                                    <li><a href="Categoria_Trupper.php" class="link-white rounded">Categoria
                                            Ferretaria</a>
                                    </li>
                                    <li><a href="Categoria_Pintura.php" class="link-white rounded">Categoria Pintura</a>
                                    </li>
                                    <li><a href="Categoria_Maquinas.php" class="link-white rounded">Categoria
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
                        <span class="cargo-txt" id='nombre_empleado'></span>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="container" id="maderas">
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <div class="container p-1" id="madera">
                                <h3 class="letra titulo text-center">Categoria Hilos</h3>
                                <!--<div class="grid letra m-2">
                                    <div class="grid-item color_tienda">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Tapiceria</h3>
                                        <ul class="entrada">
                                            <li>
                                                <p class="text-center">Total</p>
                                                <p class="text-center" id="conteo_materiales"> 0</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="grid-item jabin">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Proveedores</h3>
                                        <ul class="entrada">
                                            <li>
                                                <span>Total:</span>
                                                <spanp class="text-center"> 0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>-->
                                <ul class="nav nav-tabs p-1" id="myTab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="cat_hilos-tab" data-bs-toggle="tab"
                                            data-bs-target="#cat_hilos" type="button" role="tab"
                                            aria-controls="cat_hilos" aria-selected="true">Entradas/Salidas</button>
                                    </li>
                                </ul>

                                <div class="tab-pane fade show active" id="cat_hilos" role="tabpanel"
                                    aria-labelledby="cat_hilos-tab">
                                    <div class="form-hilos p-1 m-2 border border-1">
                                        <form method="POST" name="formulario_stocks"
                                            onsubmit="return  Validar_Formulario_Stocks();">
                                            <h3 class="letra titulo text-center">Salida Maderas</h3>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label mt-1" for="selec_material">Seleccione
                                                        Maderas:</label>
                                                    <div class="input-group h-50 mb-1">
                                                        <select class="form-select w-100 mb-1" id="sel_material"
                                                            name="selec_material"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity(''); Seleccion_Materiales(this);"
                                                            required>
                                                            <option>Seleccionar</option>
                                                        </select>

                                                        <div id="error_letra_selec_material"
                                                            class="d-none invalid-feedback">Solo se permiten letras
                                                            y sin espacios.</div>
                                                        <div id="error_maxletras_selec_material"
                                                            class="d-none invalid-feedback">Llegaste maximo de
                                                            letras.</div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label mt-1" for="salidaMadera">Salida:</label>
                                                    <input class="form-control w-30" name="salida" type="number"
                                                        placeholder="0" disabled required step="0.01" min="0"
                                                        oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                        oninput="this.setCustomValidity('');filtrarCantidad(this);">
                                                    <div id="error_letra_salidaMadera" class="d-none invalid-feedback">
                                                        Solo se permiten numeros.
                                                    </div>
                                                    <div id="error_maxletras_salidaMadera"
                                                        class="d-none invalid-feedback">Llegaste maximo de letras.
                                                    </div>
                                                    <div id="error_cantidad_salidaMadera"
                                                        class="d-none invalid-feedback">No tienes esa cantidad en
                                                        stock.
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label mt-0" for="Precio">Precio
                                                        Unidad:</label>
                                                    <input class="form-control w-30" name="precio" type="number"
                                                        placeholder="0" disabled required
                                                        oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                        oninput="this.setCustomValidity('');">

                                                    <div id="error_letra_entradaMadera" class="d-none invalid-feedback">
                                                        Solo se permiten numeros.
                                                    </div>
                                                    <div id="error_maxletras_entradaMadera"
                                                        class="d-none invalid-feedback">Llegaste maximo de letras.
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label mt-1" for="stock_madera">Stock:</label>
                                                    <input class="form-control w-30" name="stockMadera" type="number"
                                                        placeholder="0" disabled required
                                                        oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                        oninput="this.setCustomValidity('');">
                                                    <div id="error_letra_stockMadera" class="d-none invalid-feedback">
                                                        Solo se permiten letras y
                                                        sin espacios.</div>
                                                    <div id="error_maxletras_stockMadera"
                                                        class="d-none invalid-feedback">Llegaste maximo de letras.
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success mt-2" type="submit">Guardar</button>
                                            <a class="btn btn-danger mt-2" onclick="Limpiar_Formulario();">Limpiar</a>
                                        </form>
                                    </div>

                                    <h3 class="letra text-center mt-3" style="position: sticky; top:0">Reporte
                                        Maderas</h3>
                                        <p class="text-danger">Aviso: Esta tabla solo muestra salidas.</p>
                                    <a class="btn btn-primary mb-1" style="position: sticky; top:0"
                                        id="btn_mostrar_reporte" onclick="Mostrar_Tabla_Reportes(this, false)">Mostrar
                                        Reportes</a>
                                    <a class="btn btn-secondary mb-1" style="position: sticky; top:0"
                                        id="exporttable_mat1">Exportar Excel</a>
                                    <div class="table-responsive table-custom">
                                        <table id="tabla_reporte_material"
                                            class="table table-striped table-bordered table-sm my-custom-scrollbar">
                                            <thead style="position: sticky; top:0">
                                                <tr class="color_tienda text-white">
                                                    <th scope="col">N°</th>
                                                    <th scope="col">Código</th>
                                                    <th scope="col">Madera</th>
                                                    <th scope="col">Salidas</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Fecha Registro</th>
                                                    <th scope="col">Hora Registro</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_reporte_material_body">

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
</body>
>>>>>>> a5b466631c84c5dd752487971263906d4ffaca99
</html>