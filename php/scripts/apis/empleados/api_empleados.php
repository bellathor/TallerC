<?php
header('Access-Control-Allow-Origin: null');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: text/html; charset=UTF-8');
require(dirname(dirname(__DIR__)) . '/clases/class_empleados.php');
$funcion = new Empleados();
//$salario = new Admin_Nominas();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['consultar_empleados'])) {
            $empleados = $funcion->Obtener_Empleados(true);
            if ($empleados === 0) {
                echo '{"empleados":"null"}';
            } else {
                echo json_encode(['empleados' => $empleados]);
            }
        }
        if (isset($_GET['consultar_empleado'])) {
            $id = $_GET['id'];
            $empleado = $funcion->Obtener_Empleado_Especifico($id, 'id_empleado');

            if ($empleado === 0 || $empleado === null) {
                echo '{"empleado":null}';
            } else {
                echo json_encode(['empleado' => $empleado]);
            }
        }
        break;
    case 'POST':
        if (isset($_GET['insertar_empleados'])) {
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $NombreUsuario = $funcion->Obtener_Empleado_Especifico($jsonObj['NombreUsuario'], 'Usuario');
            if ($NombreUsuario === null) { 
                $pass = "";
                if ($jsonObj['Contraseña']=="") {//4521F85?/002023*
                    $pass = "4521F85?/002023*";
                } else {
                    $pass = $jsonObj['Contraseña'];
                }
                $hash = $funcion->guardarPass($pass);
                $jsonObj['Contraseña'] = $hash;
                $lastid = $funcion->Registrar_Empleado($jsonObj);
                if ($lastid !== 0 || $lastid !== null) {
                    $verificar_registro = $funcion->Registrar_Salario($lastid);
                    if ($verificar_registro !== 0) {
                        echo '{"empleados":"registrado"}';
                    } else {
                        echo '{"empleados":"Error registro salario"}';
                    }
                } else {
                    echo '{"empleados":"Error registro empleado"}';
                }

            } else {
                echo '{"empleados":"Existe"}';
            }
        }
        break;
    case 'PUT':
        if (isset($_GET['actualizar_empleados'])) { // actualizar empleados
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $pass = "";
            if ($jsonObj['Contraseña']=="") { //4521F85?/002023*
                $pass = "4521F85?/002023*";
            } else {
                $pass = $jsonObj['Contraseña'];
            }
            $hash = $funcion->guardarPass($pass);
            $jsonObj['Contraseña'] = $hash;
            $empleado = $funcion->Actualizar_Empleado($jsonObj);
            if ($empleado === 0 || $empleado === null) {
                echo '{"empleados":"Error actualizacion"}';
            } else {
                echo '{"empleados":"Actualizado"}';
            }
        }
        break;
    case 'DELETE':
        if (isset($_GET['eliminar_empleado'])) { // eliminar empleados
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $id = $jsonObj['IDEmpleado'];
            $funcion->Eliminar_Empleado($id);
        }
        break;
    default:
        echo '<script>alert(' . '"Solicitud no encontrada.!!"' . ')</script>';
}
?>