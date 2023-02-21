<?php
header('Access-Control-Allow-Origin: null');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: text/html; charset=UTF-8');
require(dirname(dirname(dirname(__DIR__))) . '/scripts/bd.php');

$opcion = new BaseDatos;


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': // solicitud
        if (isset($_GET['consultar_truppers'])) { // consulta todos los hilos
            //$inner = ' LEFT JOIN reportes r on hilos.ID_Material = r.ID_Material ';
            //$where = 'WHERE hilos.Categoria = ' . '"' . 'Hilos' . '"'; 
            $categoria = 'WHERE Categoria = '. '"' . 'Ferreteria' . '"';
            $hilos = $opcion->Select(null, 'materiales', null, null, $categoria);
            if($hilos != 0){
                //array_push($hilos[0], $hilos['error'] = 'false');
                echo json_encode(['hilos'=>$hilos]);
            }else{
                echo '{"error":"true"}';

            };
        } else if (isset($_GET['consultar_trupper'])) {  // consultar hilo en especifico
            $id = $_GET['id'];
            $column = 'Stock, Precio_Unitario';
            $materiales = $opcion->Select($column, 'materiales', null, $id, null);
            echo json_encode(['hilo' => $materiales]);
        }else if (isset($_GET['consultar_reportes_materiales'])) { //  consulta reportes madera
            $columnas = 'r.ID_Reporte, mat.ID_Material, mat.Codigo, mat.Nombre_Material, 
                         r.Stock, r.Fecha, r.Hora, r.Cantidad, r.Gasto_Entrada, r.Accion';
            $inner = ' LEFT JOIN materiales mat on r.ID_Material = mat.ID_Material WHERE mat.Categoria = "Ferreteria"';
            $reportes_materiales = $opcion->Select($columnas, 'reportes r', $inner, null);
            echo json_encode(['reportes' => $reportes_materiales]);
        } 
         else {
            echo '¡Error: opcion invalida!';
        }
        break;
    case 'POST': // ingreso
        
        break;
    case 'PUT': // actualizacion
       if (isset($_GET['actualizar_salida_material'])) { // actualizar salida
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
    case 'DELETE': // eliminacion
        
        break;
    default:
        echo "No se encuentra la solicitud.!";
        break;
}
?>