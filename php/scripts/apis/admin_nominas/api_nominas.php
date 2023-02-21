<?php
header('Access-Control-Allow-Origin: null');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: text/html; charset=UTF-8');
require(dirname(dirname(__DIR__)) . '/clases/class_adminnominas.php');
$funcion = new Admin_Nominas();


switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': // solicitud
        if (isset($_GET['consultar_empleados_departamentos'])) { // consulta todos los hilos
            if (isset($_GET['id'])) {
                $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
                $empleados = $funcion->Obtener_Empleados_Salarios('inner', $id);
                if (is_null($empleados)) {
                    echo '{"empleados":"no existe"}';
                } else {
                    echo json_encode(["empleados" => $empleados]);
                }
            }
        } else if (isset($_GET['consultar_empleados_departamentos_todos'])) { // consulta todos los hilos
            $empleados = $funcion->Obtener_Empleados_Salarios('inner', null);
            if (is_null($empleados)) {
                echo '{"empleados":"no existe"}';
            } else {
                echo json_encode(["empleados" => $empleados]);
            }

        } else if (isset($_GET['consultar_gastos'])) { // consulta todos los hilos
            $gastos = $funcion->Obtener_Gastos(null, null);
            if (is_null($gastos)) {
                echo '{"gastos":"no existe"}';
            } else {
                echo json_encode(["gastos" => $gastos]);
            }

        } else {
            echo '¡Error: opcion invalida!';
        }
        break;
    case 'POST': // ingreso
        if (isset($_GET['registrar_gastos'])) { // registrar gasto generales
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $validar = $funcion->Registrar_Gastos($jsonObj);
            if ($validar == 1) {
                echo '{"error":"false"}';
            } else {
                echo '{"error":"true"}';
            }
        }
        break;
    case 'PUT': // actualizacion
        if (isset($_GET['actualizar_salario'])) { // actualizar salida
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $validar = $funcion->Actualizar_Salario($jsonObj);
            if ($validar == 1) {
                echo '{"error":"false"}';
            } else {
                echo '{"error":"true"}';
            }
        } else if (isset($_GET['actualizar_salario_gest'])) { // actualizar salida
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $validar = $funcion->Actualizar_Salario($jsonObj, "gestion");
            if ($validar == 1) {
                echo '{"error":"false"}';
            } else {
                echo '{"error":"true"}';
            }
        } else if (isset($_GET['actualizar_salario_gest_cierre'])) { // actualizar salida
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $validar = $funcion->Actualizar_Salario($jsonObj, "gestion_cierre");
            if ($validar == 1) {
                echo '{"error":"false"}';
            } else {
                echo '{"error":"true"}';
            }
        }
        break;
    case 'DELETE': // eliminacion
        if (isset($_GET['eliminar_gastos_generales'])) { // actualizar salida
            $funcion->Eliminar_Gastos_Generales();
            echo '{"gastos":"eliminados"}';
            break;
        }
    default:
        echo "No se encuentra la solicitud.!";
        break;
}
?>