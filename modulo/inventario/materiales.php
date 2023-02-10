<!DOCTYPE html>
<html lang="en">

<head>
    <title>TALLERC</title>
    <meta charset="UTF-8">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>

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
                                    <li><a href="../Bodega_Taller/Categoria_Hilos.php" class="link-white rounded"
                                            id="btn-hilos">Categoria Hilos</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Tapiceria.php"
                                            class="link-white rounded">Categoria Tapiceria</a></li>
                                    <li><a href="../Bodega_Taller/Categoria_Trupper.php"
                                            class="link-white rounded">Categoria Trupper</a></li>
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
                                    <li><a href="../Admin_Nominas/Lista_Nominas.php" class="link-white rounded">Lista de nominas</a>
                                    </li>
                                    <li><a href="#" class="link-white rounded">Gastos generales</a></li>

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
                                        <a href="/muebles.php" class="link-white rounded">Muebles</a></button>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle align-items-center rounded text-white botones_letras">
                                <a class="link-white rounded" href="../index.php">Salir</a>
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
                        <span class="cargo-txt">Alberto - Administrador</span>
                        <span class="config-txt">Editar Perfil</span>
                    </div>
                </div>
                <div class="col-12 p-2">
                    <div class="container" id="maderas">
                        <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <div class="container p-1" id="madera">
                                <h3 class="letra titulo text-center">Inventario de Materiales</h3>
                                <div class="grid letra m-2">
                                    <div class="grid-item color_tienda">
                                        <h3 class="letra border-bottom border-1 border-white w-100">Materiales</h3>
                                        <ul class="entrada">
                                            <li>
                                                <p class="text-center">Total</p>
                                                <p class="text-center" id="conteo_materiales"> 0</p>
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
                                        <button class="nav-link active" id="inventario_materiales-tab"
                                            data-bs-toggle="tab" data-bs-target="#inventario_materiales" type="button"
                                            role="tab" aria-controls="inventario_materiales"
                                            aria-selected="true">Inventario
                                            Materiales</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="entrada_salida_materiales-tab" data-bs-toggle="tab"
                                            data-bs-target="#entrada_salida_materiales" type="button" role="tab"
                                            aria-controls="entrada_salida_materiales" aria-selected="false"
                                            onclick="Cargar_Stock()">Entradas/Salidas</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="inventario_materiales" role="tabpanel"
                                        aria-labelledby="inventario_materiales-tab">
                                        <div class="form-hilos p-1 m-2 border border-1">
                                            <form method="POST" name="formulario_material"
                                                onsubmit="return Validar_Formulario(false);">
                                                <h3 class="letra titulo text-center">Formulario de Materiales</h3>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label class="form-label mt-3" for="categ">Seleccion
                                                            Categoria:</label>
                                                        <div class="input-group h-50 mb-3">
                                                            <select class="form-select w-100 mb-3"
                                                                id="seleccion_categoria" name="categ"
                                                                oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                                oninput="this.setCustomValidity('');Seleccion_Categoria_Materiales(this);"
                                                                ; required>
                                                                <option selected value="">Seleccionar</option>
                                                                <option value="1">Hilos</option>
                                                                <option value="2">Tapiceria</option>
                                                                <option value="3">Ferreteria</option>
                                                                <option value="4">Pintura</option>
                                                                <option value="5">Maquinas</option>
                                                            </select>
                                                            <div id="error_letra_categoria"
                                                                class="d-none invalid-feedback">Solo se permiten letras
                                                                y sin espacios.</div>
                                                            <div id="error_maxletras_categoria"
                                                                class="d-none invalid-feedback">Llegaste maximo de
                                                                letras.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="cod">Código:</label>
                                                        <input class="form-control" name="cod" type="text"
                                                            placeholder="Ejem. PP1" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');Formato_Texto(this);">
                                                        <div id="error_letra_cod" class="d-none invalid-feedback">Solo
                                                            se permiten letras en mayusculas y numeros.</div>
                                                        <div id="error_maxletras_cod" class="d-none invalid-feedback">
                                                            Llegaste maximo de letras.</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="material">Material:</label>
                                                        <input class="form-control" name="material" type="text"
                                                            placeholder="Piola Plana" required disabled
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');Filtrar_Textos(this);">
                                                        <div id="error_letra_material" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_material"
                                                            class="d-none invalid-feedback">Llegaste maximo de letras.
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-2" for="precio">Precio
                                                            Unidad:</label>
                                                        <input class="form-control" name="precio" type="number"
                                                            step="0.001" required min='0' placeholder="0"
                                                            oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                            oninput="this.setCustomValidity('');filtrarCantidad(this);"
                                                            disabled>
                                                        <div id="error_letra_madera" class="d-none invalid-feedback">
                                                            Solo se permiten letras y sin espacios.</div>
                                                        <div id="error_maxletras_madera"
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
                                                </div>
                                                <button class="btn btn-success mt-2" type="submit"
                                                    id="btn_submit">Registrar</button>
                                                <button class="btn btn-danger mt-2" type="reset"
                                                    onclick="LimpiarFormulario()">Limpiar</button>
                                            </form>
                                        </div>

                                        <h3 class="letra text-center mt-3" style="position: sticky; top:0">Materiales
                                            Registradas</h3>
                                        <a class="btn btn-primary mb-1" style="position: sticky; top:0" id="btn_mostrar"
                                            onclick="Mostrar_Tabla(this, false)">Mostrar Tabla</a>
                                        <a class="btn btn-secondary m-3" style="position: sticky; top:0"
                                            id="exporttable_mat1">Exportar Excel</a>
                                        <div class="table-responsive table-custom">

                                            <table id="tabla_material_"
                                                class="table table-striped table-bordered table-sm my-custom-scrollbar d-none">
                                                <thead style="position: sticky; top:0">
                                                    <tr class="color_tienda text-white">
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Código</th>
                                                        <th scope="col">Material</th>
                                                        <th scope="col">Precio Unidad</th>
                                                        <th scope="col">Categoria</th>
                                                        <th scope="col">Opcion</th>
                                                        <th scope="col">Opcion</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla_material">

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                    <div class="tab-pane fade" id="entrada_salida_materiales" role="tabpanel"
                                        aria-labelledby="entrada_salida_materiales-tab">
                                        <div class="form-hilos p-1 m-2 border border-1">
                                            <form method="POST" name="formulario_materiales_stocks"
                                                onsubmit="return Validar_Formulario_Stocks();">
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
                                                                onchange="Seleccion_Opcion_stock(this)" required>
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
                                                        <label class="form-label mt-3" for="selec_materiales">Seleccion
                                                            Material:</label>
                                                        <div class="input-group h-50 mb-3">
                                                            <select class="form-select w-100 mb-3" id="sel_materiales"
                                                                name="selec_materiales" disabled
                                                                oninvalid="this.setCustomValidity('Debe llenar este campo.!')"
                                                                oninput="this.setCustomValidity(''); Seleccion_Materiales(this);"
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
                                                        <input class="form-control w-30" name="entrada" type="number"
                                                            placeholder="0" disabled required
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
                                                        <input class="form-control w-30" name="salida" type="number"
                                                            placeholder="0" disabled required step="0.01" min="0"
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
                                                        <input class="form-control w-30" name="precio" type="number"
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

                                        <h3 class="letra text-center mt-3" style="position: sticky; top:0">Reporte
                                            Materiales</h3>
                                        <a class="btn btn-primary mb-1" style="position: sticky; top:0"
                                            id="btn_mostrar_reporte"
                                            onclick="Mostrar_Tabla_Reportes(this, false)">Mostrar
                                            Reportes</a>
                                        <a class="btn btn-secondary mb-1" style="position: sticky; top:0"
                                            id="exporttable_mat2">Exportar Excel</a>

                                        <div class="table-responsive table-custom">
                                            <table id="tabla_reporte_material"
                                                class="table table-striped table-bordered table-sm my-custom-scrollbar d-none">
                                                <thead style="position: sticky; top:0">
                                                    <tr class="color_tienda text-white">
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Código</th>
                                                        <th scope="col">Madera</th>
                                                        <th scope="col">Empleado</th>
                                                        <th scope="col">Dep</th>
                                                        <th scope="col">Puesto</th>
                                                        <th scope="col">Entradas</th>
                                                        <th scope="col">Salidas</th>
                                                        <th scope="col">Stock</th>
                                                        <th scope="col">Gasto Entrada$</th>
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
    </div>
    </div>
    </div>
    </div>

</body>
<script src="../../js/materiales.js"></script>

</html>