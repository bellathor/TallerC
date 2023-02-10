<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: text/html; charset=UTF-8');
require(dirname(dirname(__DIR__)). '\clases\class_departamentos.php');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $funcion= new Departamentos();
        if (isset($_GET['consultar_departamentos'])) {
            $dep = $funcion->Obtener_Departamentos();
            if($dep === 0){
                echo '{"departamentos":"null"}';
            }else{
                echo json_encode(["departamentos"=>$dep]);
            }
        } 
        break;
    case 'POST':
        
        break;
    case 'PUT':
        
        break;
    case 'DELETE':
        break;
    default:
        echo '<script>alert(' . '"Solicitud no encontrada.!!"' . ')</script>';
}
?>