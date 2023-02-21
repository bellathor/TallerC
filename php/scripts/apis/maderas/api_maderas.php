<?php
header('Access-Control-Allow-Origin: null');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: text/html; charset=UTF-8');
require(dirname(dirname(__DIR__)) . '/clases/class_maderas.php');
$funcion = new Maderas();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['consultar_maderas'])) {
            $maderas = $funcion->Obtener_Maderas();
            if ($maderas !== 0 || $maderas !== null) {
                echo json_encode(['maderas' => $maderas]);
            } else {
                echo '{"maderas": "Sin registro"}';
            }
        } else if (isset($_GET['consultar_madera_stock'])) {
            $id = $_GET['id'];
            $maderas = $funcion->Obtener_Madera_Especifico($id, 'stock');
            echo json_encode(['stock' => $maderas]);
        } else if (isset($_GET['consultar_reportes_madera'])) { //  consulta reportes madera
            $reportes_maderas = $funcion->Obtener_Reportes('maderas', 'r');
            if ($reportes_maderas !== null) {
                echo json_encode(['reportes' => $reportes_maderas]);
            } else {
                echo '{"reportes": "Sin registros"}';
            }
        }
        break;
    case 'POST':
        if (isset($_GET['insertar_maderas'])) { // insertar maderas
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $madera = $funcion->Obtener_Madera_Especifico($jsonObj['Codigo'], 'cod');
            if ($madera === 0 || $madera === null) {
                $verificar = $funcion->Registrar_Madera($jsonObj);
                if ($verificar == 1) {
                    echo '{"maderas":"Registro exitoso.!"}';
                } else {
                    echo '{"maderas":"Error Registro"}';
                }
            } else {
                echo '{"maderas":"Existe"}';
            }
        }
        break;
    case 'PUT':
        if (isset($_GET['actualizar_madera'])) { // actualizar madera
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $buscarmadera = $funcion->Obtener_Madera_Especifico($jsonObj['ID'], 'id');
            if ($buscarmadera != 0 || $buscarmadera != null) {
                $funcion->Actualizar_Madera($jsonObj);
                echo '{"error":"false"}';
            } else {
                echo '{"error":"true"}';
            }
        } else if (isset($_GET['actualizar_entrada_salida'])) {
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $funcion->Actualizar_Madera($jsonObj, 'entradas_salidas');
            echo '{"maderas":"exitoso"}';
        }
        break;
    case 'DELETE':
        if (isset($_GET['eliminar_madera'])) {
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $id = $jsonObj['ID'];
            $funcion->Eliminar_Madera($id);
            echo '{"error":"false"}';
            break;
        }

    default:
        echo '<script>alert(' . '"Solicitud no encontrada.!!"' . ')</script>';
}
?>