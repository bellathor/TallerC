<!DOCTYPE html>
<html lang="en">

<head>
    <title>TALLERC</title>
    <meta charset="UTF-8">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <link rel="shortcut icon" href="./img/logo_tallerc.ico">
    <meta http-equiv="Pragma" content="no-cache">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../bootstrap-/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>-->
    <script src="../../bootstrap-/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

    <link href="../../css/dashboard_estilo.css?v1.0.0.15" rel="stylesheet">
    <!--<link href="../css/admin.css?v1.0.0.1" rel="stylesheet">-->
</head>

<body>
    <div class="row" style="height: 100%;">
        <div class="col-3 p-0">
            <div class="box-modulos " id="grupo">
                <div class="vertical-menu letra titulo">
                    <div class="border-bottom border-1 border-white">
                        <div class="d-flex justify-content-center">
                            <img class="img-fluid d-block w-25 h-25" src="../../img/logo_tallerc.png" alt="logo">
                        </div>
                        <p class="text-center letra titulo">SISTEMA INVENTARIO</p>
                    </div>
                    <ul class="list-unstyled ps-0 p-0">
                        <li class="p-1"><a href="../dashboard.php" class="link-white rounded">Dashboard</a></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras">
                                <a href="../empleados.php" class="link-white rounded">Empleados</a>
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
                                    <li><a href="../Bodega_Taller/Categoria_Maderas.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Maderas</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Hilos.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Hilos</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Tapiceria.php"
                                            class="link-white rounded">Categoria Tapiceria</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Trupper.php"
                                            class="link-white rounded">Categoria Ferretaria</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Pintura.php"
                                            class="link-white rounded">Categoria Pintura</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Maquinas.php"
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
                                    <li><a href="../Admin y Nominas./Admin y Nominas/Lista_Nominas.php"
                                            class="link-white rounded">Lista de nominas</a></li>
                                    <li><a href="../Admin_Nominas/Gastos_Generales.php"
                                            class="link-white rounded">Gastos generales</a></li>

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
                                        <a href="madera.php" class="link-white rounded">Maderas</a>
                                    </li>
                                    <li>
                                        <a href="materiales.php" class="link-white rounded">Materiales</a>
                                    </li>
                                    <li>
                                        <a href="muebles.php" class="link-white rounded">Muebles ( En construccion
                                            )</a></button>
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
                    <div class="container" id="muebles">
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <div class="container p-1" id="muebles">
                                <h3 class="letra titulo text-center">Inventario de Muebles</h3>
                                <div class="grid letra m-2">
                                    <div class="grid-item color_tienda">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Muebles</h3>
                                        <ul class="entrada">
                                            <li>
                                                <p class="text-center">Total</p>
                                                <p class="text-center" id="muebles_total"> 0</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--<div class="grid-item jabin">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Proveedores</h3>
                                        <ul class="entrada">
                                            <li>
                                                <span>Total:</span>
                                                <spanp class="text-center"> 0</span>
                                            </li>
                                        </ul>
                                    </div>-->
                                </div>
                                <ul class="nav nav-tabs p-1" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="inventario_muebles-tab" data-bs-toggle="tab"
                                            data-bs-target="#inventario_muebles" type="button" role="tab"
                                            aria-controls="inventario_muebles" aria-selected="true">Inventario
                                            muebles</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="entrada_salida-tab" data-bs-toggle="tab"
                                            data-bs-target="#entrada_salida" type="button" role="tab"
                                            aria-controls="entrada_salida" aria-selected="false">Entrada/Salida</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="inventario_muebles" role="tabpanel"
                                        aria-labelledby="inventario_muebles-tab">
                                        <div class="form-hilos p-1 m-2 border border-1">
                                            <form method="POST" name="formulario_muebles"
                                                onsubmit="return Validar_Formulario();" enctype="multipart/form-data">
                                                <h3 class="letra titulo text-center">Formulario de Muebles</h3>
                                                <div class="row">

                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="cod">Código:</label>
                                                        <input class="form-control" name="cod" type="text"
                                                            placeholder="Ejem. MELIZ4" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');Filtrar_Textos(this);">
                                                        <div id="error_letra_cod" class="d-none invalid-feedback">Solo
                                                            se permiten letras en mayusculas y numeros.</div>
                                                        <div id="error_maxletras_cod" class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="mueble">Nombre
                                                            Mueble:</label>
                                                        <input class="form-control" name="mueble" type="text"
                                                            placeholder="Ejem. Mesa Liz" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');Filtrar_Textos(this);">
                                                        <div id="error_letra_mueble" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_mueble"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-6">
                                                        <label class="form-label mt-1" for="proveedor">Seleccione
                                                            Proveedor (opcional):</label>
                                                        <div class="input-group h-50 mb-1">
                                                            <select class="form-select w-100 mb-3" id="proveedor"
                                                                name="selec_proveedor" disabled>
                                                                <option selected>Seleccionar</option>
                                                            </select>
                                                            <div id="error_letra_sel_proveedor"
                                                                class="d-none invalid-feedback">Solo se permiten letras
                                                                y sin espacios.</div>
                                                            <div id="error_maxletras_sel_proveedor"
                                                                class="d-none invalid-feedback">Llegaste maximo de
                                                                letras.</div>
                                                        </div>
                                                    </div>-->
                                                    <div class="col-6">
                                                        <label class="form-label mt-2"
                                                            for="muebleDescripcion">Descripcion
                                                            Mueble:</label>
                                                        <input class="form-control" name="muebleDescripcion" type="text"
                                                            placeholder="Ejem. Mesa de comedor" required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');Filtrar_Textos(this);">
                                                        <div id="error_letra_muebleDescripcion"
                                                            class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_muebleDescripcion"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="muebleImagen">Subir Imagen
                                                            Mueble:</label>
                                                        <input class="form-control" name="muebleImagen" type="file"
                                                            id="imgMueble" placeholder="Subir foto del mueble"
                                                            value="Subir Imagen" accept="image/png, image/jpeg"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');">
                                                        <div id="error_letra_muebleImagen"
                                                            class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_muebleImagen"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1" for="ancho">Ancho:</label>
                                                        <input class="form-control w-30" name="ancho" type="number"
                                                            placeholder="0" required step="0.01"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity(''); Filtrar_Textos(this);">
                                                        <div id="error_letra_ancho" class="d-none invalid-feedback">Solo
                                                            se permiten numeros.
                                                        </div>
                                                        <div id="error_maxletras_ancho" class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1" for="alto">Alto:</label>
                                                        <input class="form-control w-30" name="alto" type="number"
                                                            placeholder="0" required step="0.01"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');Filtrar_Textos(this);">
                                                        <div id="error_letra_alto" class="d-none invalid-feedback">Solo
                                                            se permiten numeros.
                                                        </div>
                                                        <div id="error_maxletras_alto" class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.
                                                        </div>
                                                        <div id="error_cantidad_alto" class="d-none invalid-feedback">No
                                                            tienes esa cantidad en
                                                            stock.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1" for="largo">Fondo:</label>
                                                        <input class="form-control w-30" name="largo" type="number"
                                                            placeholder="0" required step="0.01"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');Filtrar_Textos(this);">
                                                        <div id="error_letra_largo" class="d-none invalid-feedback">Solo
                                                            se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_largo" class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.
                                                        </div>
                                                        <div id="error_cantidad_alto" class="d-none invalid-feedback">No
                                                            tienes esa cantidad en
                                                            stock.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1" for="largo">Imagen
                                                            Mueble:</label>
                                                        <div class="container">
                                                            <img src="" class="img-thumbnail d-none" alt="imagen_mueble"
                                                                id="imagen_mueble">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success mt-2" type="submit">Registrar</button>
                                                <button class="btn btn-danger mt-2">Limpiar</button>
                                            </form>
                                        </div>
                                        <div class="table-responsive">
                                            <h3 class="letra text-center mt-3">Tabla Muebles</h3>
                                            <a class="btn btn-secondary m-1">Exportar Excel</a>
                                            <table id="tabla_empleados_"
                                                class="table table-striped table-bordered table-sm my-custom-scrollbar">
                                                <thead style="position: sticky; top:0">
                                                    <tr class="color_tienda text-white">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Código</th>
                                                        <th scope="col">Concepto</th>
                                                        <th scope="col">Descripcion</th>
                                                        <th scope="col">Imagen</th>
                                                        <th scope="col">Ancho</th>
                                                        <th scope="col">Alto</th>
                                                        <th scope="col">Fondo</th>
                                                        <!--<th scope="col">Proveedor</th>
                                                        <th scope="col">Tel Proveedor</th>-->
                                                        <th scope="col">Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla_muebles">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="entrada_salida" role="tabpanel"
                                        aria-labelledby="entrada_salida-tab">
                                        <div class="form-hilos p-2 m-2 border border-1">

                                            <form method="POST" name="formulario_madera_stocks"
                                                onsubmit="return Validar_Formulario_Stock();">
                                                <h3 class="letra titulo text-center">Modificacion Stock</h3>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label mt-3" for="cod">Seleccion
                                                            opcion:</label>
                                                        <div class="input-group h-50 mb-3">
                                                            <select class="form-select w-100 mb-3" id="seleccion_opcion"
                                                                name="opcionMadera"
                                                                oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                                oninput="this.setCustomValidity('')"
                                                                onchange="Seleccion_Opcion(this)" required>
                                                                <option selected value="">Seleccionar</option>
                                                                <option value="1">Entradas</option>
                                                                <option value="2">Salidas</option>
                                                            </select>
                                                            <div id="error_letra_opcionMadera"
                                                                class="d-none invalid-feedback">Solo se permiten letras
                                                                y sin espacios.</div>
                                                            <div id="error_maxletras_opcionMadera"
                                                                class="d-none invalid-feedback">Llegaste maximo de
                                                                letras.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-3" for="maderas">Seleccion
                                                            Madera:</label>
                                                        <div class="input-group h-50 mb-3">
                                                            <select class="form-select w-100 mb-3" id="sel_maderas"
                                                                name="selec_madera" disabled
                                                                oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                                oninput="this.setCustomValidity(''); Seleccion_Madera(this);"
                                                                required disabled>
                                                                <option value="">Seleccionar</option>
                                                            </select>

                                                            <div id="error_letra_selec_madera"
                                                                class="d-none invalid-feedback">Solo se permiten letras
                                                                y sin espacios.</div>
                                                            <div id="error_maxletras_selec_madera"
                                                                class="d-none invalid-feedback">Llegaste maximo de
                                                                letras.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1"
                                                            for="entradaMadera">Entrada:</label>
                                                        <input class="form-control w-30" name="entradaMadera"
                                                            type="number" placeholder="0" disabled required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');filtrarCantidad(this);">

                                                        <div id="error_letra_entradaMadera"
                                                            class="d-none invalid-feedback">Solo se permiten numeros.
                                                        </div>
                                                        <div id="error_maxletras_entradaMadera"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1"
                                                            for="salidaMadera">Salida:</label>
                                                        <input class="form-control w-30" name="salidaMadera"
                                                            type="number" placeholder="0" disabled required step="1"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');filtrarCantidad(this);">
                                                        <div id="error_letra_salidaMadera"
                                                            class="d-none invalid-feedback">Solo se permiten numeros.
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
                                                        <label class="form-label mt-1" for="Precio">Precio
                                                            Unidad:</label>
                                                        <input class="form-control w-30" name="Precion" type="number"
                                                            placeholder="0" disabled required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');">

                                                        <div id="error_letra_entradaMadera"
                                                            class="d-none invalid-feedback">Solo se permiten numeros.
                                                        </div>
                                                        <div id="error_maxletras_entradaMadera"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1" for="stock_madera">Stock:</label>
                                                        <input class="form-control w-30" name="stockMadera"
                                                            type="number" placeholder="0" disabled required
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');">
                                                        <div id="error_letra_stockMadera"
                                                            class="d-none invalid-feedback">Solo se permiten letras y
                                                            sin espacios.</div>
                                                        <div id="error_maxletras_stockMadera"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-success mt-2" type="submit">Guardar</button>
                                                <button class="btn btn-danger mt-2"
                                                    onclick="LimpiarFormularioStock();">Limpiar</button>
                                            </form>
                                        </div>
                                        <a class="btn btn-secondary m-3 float-end">Exportar Excel</a>
                                        <table class="table table-bordered table-wrapper-scroll-y my-custom-scrollbar">
                                            <thead style="position: sticky; top:0">
                                                <tr class="color_tienda text-white">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre Empresa</th>
                                                    <th scope="col">Direccion</th>
                                                    <th scope="col">Telefono</th>
                                                    <th scope="col">Correo Electronico</th>
                                                    <th scope="col">Descripcion</th>
                                                    <th scope="col">Ciudad</th>
                                                    <th scope="col">Opcion</th>
                                                    <th scope="col">Opcion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_proveedores">

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
</html>