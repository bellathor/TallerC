<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: text/html; charset=UTF-8');
require(dirname(dirname(__DIR__)) . '/clases/class_empleados.php');
$funcion = new Empleados();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        break;
    case 'POST':
        if(isset($_GET['ingreso_usuario'])){
            $json = file_get_contents('php://input');
            $jsonObj = json_decode($json, true);
            $usuario = filter_var($jsonObj['usuario'], FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_var($jsonObj['password'], FILTER_SANITIZE_SPECIAL_CHARS);
            $usuarios = $funcion->Obtener_Empleado_Especifico($usuario, 'Usuario');
            if(is_null($usuarios)){
                echo'{"error":"no existe"}';
            }else{
                $hash = $usuarios[0]['Contraseña'];
                $verificar = $funcion->VerificarPassword($password, $hash);
                if($verificar == true){
                    $usuarios[0]['Contraseña'] = "";
                    echo json_encode(["usuario"=>$usuarios]);
                }else{
                    echo'{"error":"no existe"}';
                }
            }
        }
        break;
    case 'PUT':

        break;
    case 'DELETE':
        break;
    default:
        echo '<script>alert(' . '"Solicitud no encontrada.!!"' . ')</script>';
}
?>