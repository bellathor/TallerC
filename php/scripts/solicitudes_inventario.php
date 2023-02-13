<?php
header('Access-Control-Allow-Origin: *');
require(dirname(__DIR__) . '/scripts/bd.php');
$opcion = new BaseDatos();





// ------------------------------- empleados mysql -----------------------//
$columns_innempleados = 'ID_Empleado, Nombre_Usuario, Nombres, 
                   Apellidos, Direccion, 
                   Correo_Electronico, Telefono,
                   Contraseña, e.ID_Puesto, 
                   p.Nombre_Puesto, p.ID_Departamento, 
                   d.Departamento ';

$inner_empleados = ' LEFT JOIN puestos p on e.ID_Puesto = p.ID_Puesto 
                     LEFT JOIN departamentos d on p.ID_Departamento = d.ID_Departamento';


// ------------------------------ maderas mysql --------------------------//
$columns_innmaderas = 'ID_Madera, Codigo,  Nombre_Madera, 
                       Stock, pr.ID_Proveedor, pr.Empresa, Precio_Unidad';

$inner_maderas = ' LEFT JOIN proveedores pr on m.ID_Proveedor = pr.ID_Proveedor';


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['consultar_empleados'])) {
            $empleados = $opcion->Select($columns_innempleados, 'empleados e', $inner_empleados, null);
            echo json_encode(['empleados' => $empleados]);
        } else if (isset($_GET['consultar_empleado'])) { // consultar de un empleado
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $empleado = $opcion->Select($columns_innempleados, 'empleados e', $inner_empleados, $id);
                echo json_encode(['empleado' => $empleado]);
            } else {
                echo "Error en la solicitud";
            }
        } else if (isset($_GET['consultar_departamentos'])) { // consultar departamentos
            $departamentos = $opcion->Select(null, 'departamentos', null, null);
            echo json_encode(['departamentos' => $departamentos]);
        } else if (isset($_GET['consultar_empleados_departamentos'])) { // consultar empleados por departamentos
            $id = $_GET['id'];
            $columnas = 'em.ID_Empleado, em.Nombres, em.Apellidos, s.Salario_Semanal,
                         s.Horas_Laborales, s.Precio_Hora,
                         p.ID_Puesto, p.Nombre_Puesto, d.ID_Departamento, 
                         d.Departamento ';
            $inner = '  LEFT JOIN puestos p on d.ID_Departamento = p.ID_Departamento 
                        LEFT JOIN empleados em on em.ID_Puesto = p.ID_Puesto
                        LEFT JOIN salarios s on s.ID_Empleado = em.ID_Empleado';
            $departamentos = $opcion->Select($columnas, 'departamentos d', $inner, $id);
            echo json_encode(['departamentos' => $departamentos]);
        } else if (isset($_GET['consultar_puestos'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $puestos = $opcion->Select(null, 'puestos', null, null, null);
                echo json_encode(['puestos' => $puestos]);
            } else {
                echo "Error en la solicitud";
            }
        } else if (isset($_GET['consultar_maderas'])) { // consulta maderas
            $maderas = $opcion->Select(null, 'maderas', null, null, null);
            echo json_encode(['maderas' => $maderas]);
         
        } else if (isset($_GET['consultar_madera'])) {
            $id = $_GET['id'];
            $column = 'Stock, Precio_Unidad ';
            $maderas = $opcion->Select($column, 'maderas', null, $id);
            echo json_encode(['stock' => $maderas]);
        } else if (isset($_GET['consultar_reportes_madera'])) { //  consulta reportes madera
            $columnas = 'r.ID_Reporte, mad.ID_Madera, mad.Codigo, mad.Nombre_Madera, 
                         r.Stock, r.Fecha, r.Hora, r.Cantidad, r.Gasto_Entrada, r.Accion,
                         em.Nombres, em.Apellidos, p.Nombre_Puesto, d.Departamento';
            $inner = ' LEFT JOIN maderas mad on r.ID_Madera = mad.ID_Madera LEFT JOIN empleados em on r.ID_Empleado = em.ID_Empleado 
            LEFT JOIN Puestos p on em.ID_Puesto = p.ID_Puesto LEFT JOIN Departamentos d on p.ID_Departamento = d.ID_Departamento';
            $reportes_maderas = $opcion->Select($columnas, 'reportes r', $inner, null);
            echo json_encode(['reportes' => $reportes_maderas]);
        } else if (isset($_GET['consultar_reportes_materiales'])) { //  consulta reportes madera
            $columnas = 'r.ID_Reporte, mat.ID_Material, mat.Codigo, mat.Nombre_Material, 
                         r.Stock, r.Fecha, r.Hora, r.Cantidad, r.Gasto_Entrada, r.Accion,
                         em.Nombres, em.Apellidos, p.Nombre_Puesto, d.Departamento ';
            $inner = ' LEFT JOIN materiales mat on r.ID_Material = mat.ID_Material LEFT JOIN empleados em on r.ID_Empleado = em.ID_Empleado 
                       LEFT JOIN Puestos p on em.ID_Puesto = p.ID_Puesto LEFT JOIN Departamentos d on p.ID_Departamento = d.ID_Departamento';
            $reportes_materiales = $opcion->Select($columnas, 'reportes r', $inner, null);
            echo json_encode(['reportes' => $reportes_materiales]);
        } else if (isset($_GET['consultar_materiales'])) { // consulta maderas
            $materiales = $opcion->Select(null, 'materiales', null, null, null);
            echo json_encode(['materiales' => $materiales]);
        } else if (isset($_GET['consultar_material'])) {
            $id = $_GET['id'];
            $column = 'Stock, Precio_Unitario';
            $materiales = $opcion->Select($column, 'materiales', null, $id);
            echo json_encode(['stock' => $materiales]);
        } else {
            echo '¡Error: opcion invalida!';
        }
        break;
    case 'POST':
       if (isset($_GET['insertar_material'])) {
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $materiales = $opcion->Select(null, 'materiales', null, $jsonObj['Codigo']);
            if ($materiales == 0) {
                $columnas = 'Codigo, Nombre_Material, Descripcion, Stock, Precio_Unitario, Total, ID_Proveedor, Categoria';
                $opcion->Insert('materiales', $columnas, $jsonObj);
                echo '{"error":"false"}';
            } else {
                echo '{"error":"true"}';
            }
        } else if (isset($_GET['insertar_mueble'])) {
            echo 'hola';
        }
        break;
    case 'PUT':
         if (isset($_GET['actualizar_materiales'])) { // actualizar madera
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $buscarmateriales = $opcion->Select(null, 'materiales', null, $jsonObj['ID']);
            if ($buscarmateriales != 0) {
                $columnas = 'Codigo = :cod, Nombre_Material = :mad, Precio_Unitario = :prec, Categoria = :cat';
                $opcion->Actualizar('materiales', $columnas, $jsonObj);
                echo '{"error":"false"}';
            } else {
                echo '{"error":"false"}';
            }
        } else if (isset($_GET['actualizar_entrada'])) { // actualizar entrada
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $tabla = 'maderas';
            $columnas = ' Stock = :st';
            $opcion->Actualizar($tabla, $columnas, $jsonObj, 'actualizar_entrada');
            $columns = 'ID_Madera, ID_Material, ID_Mueble, ID_Empleado, Fecha, Hora, Accion, Cantidad, Stock, Gasto_Entrada';
            $tabla = 'reportes';
            $opcion->Insert($tabla, $columns, $jsonObj, 'maderas');
            echo '{"error":"false"}';
        } else if (isset($_GET['actualizar_salida'])) { // actualizar salida
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $tabla = 'maderas';
            $columnas = ' Stock = :st';
            $opcion->Actualizar($tabla, $columnas, $jsonObj, 'actualizar_salida');
            $columns = 'ID_Madera, ID_Material, ID_Mueble, ID_Empleado, Fecha, Hora, Accion, Cantidad, Stock, Gasto_Entrada';
            $tabla = 'reportes';
            $opcion->Insert($tabla, $columns, $jsonObj, 'maderas');
            echo '{"error":"false"}';
        } else if (isset($_GET['actualizar_entrada_material'])) { // actualizar salida


            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $tabla = 'materiales';
            $columnas = ' Stock = :st';
            $opcion->Actualizar($tabla, $columnas, $jsonObj, 'actualizar_entrada_material');
            $columns = 'ID_Madera, ID_Material, ID_Mueble, ID_Empleado, Fecha, Hora, Accion, Cantidad, Stock, Gasto_Entrada';
            $tabla = 'reportes';
            $opcion->Insert($tabla, $columns, $jsonObj, 'materiales');
            echo '{"error":"false"}';

        } else if (isset($_GET['actualizar_salida_material'])) { // actualizar salida
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $tabla = 'materiales';
            $columnas = ' Stock = :st';
            $opcion->Actualizar($tabla, $columnas, $jsonObj, 'actualizar_salida_material');
            $columns = 'ID_Madera, ID_Material, ID_Mueble, ID_Empleado, Fecha, Hora, Accion, Cantidad, Stock, Gasto_Entrada';
            $tabla = 'reportes';
            $opcion->Insert($tabla, $columns, $jsonObj, 'materiales');
            echo '{"error":"false"}';
        }
        break;
    case 'DELETE':
        if (isset($_GET['eliminar_empleado'])) { // eliminar empleados
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $id = $jsonObj['IDEmpleado'];
            $opcion->Delete('empleados', $id);
        } else if (isset($_GET['eliminar_madera'])) { // eliminar madera
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $id = $jsonObj['ID'];
            $opcion->Delete('maderas', $id);
            echo '{"error":"false"}';
        } else if (isset($_GET['eliminar_material'])) { // eliminar madera
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $id = $jsonObj['ID'];
            $opcion->Delete('materiales', $id);
            echo '{"error":"false"}';
        }
        break;
    default:
        echo "error pagina.!";
        break;
}
?>