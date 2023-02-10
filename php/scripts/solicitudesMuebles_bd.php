<?php
header('Access-Control-Allow-Origin: *');
require(dirname(__DIR__) . '/scripts/funciones_bdMuebles.php');
error_reporting(E_ALL ^ E_NOTICE);
$opcion = new Bd_Muebles();

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['consultarMuebles'])){
        $muebles = $opcion->consulta_muebles();
        echo json_encode(['muebles' => $muebles]);
    }
    else if(isset($_GET['consultarMueble'])){
        $id = $_GET['consultarMueble'];
        $mueble = $opcion->consulta_mueble($id);
        echo json_encode(['mueble' => $mueble]);
    }
    else{
        echo '¡Error: opcion invalida!';
    }
}else if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_GET['insertMueble'])){
       /* $json = file_get_contents('php://input');
        $jsonObj = json_decode($json, true);
        print_r($jsonObj);*/
        echo 'ho';
    }
    else if(isset($_GET['modificarMueble'])){
        $json = file_get_contents('php://input');
        $jsonObj = json_decode($json, true);
        $id =  $jsonObj['ID_Mueble'];
        $cod = $jsonObj['Codigo'];
        $mueble = $jsonObj['Mueble'];
        $descripcion = $jsonObj['MuebleDescrip'];
        $img = $jsonObj['muebleImg'];
        $alto = $jsonObj['Alto'];
        $ancho = $jsonObj['Ancho'];
        $largo = $jsonObj['Largo'];
        $opcion->actualizar_mueble($id, $cod, $mueble, $descripcion, $img, $alto, $ancho, $largo, null, null, null, null, null);
    }
    else if(isset($_GET['EliminarMueble'])){
        $json = file_get_contents('php://input');
        $jsonObj = json_decode($json, true);
        $id = $jsonObj['ID_Mueble'];
        $opcion->eliminar_mueble($id);
    }
    else{
        echo '¡Error: opcion invalida!';
    }
}else{
    echo '¡Error: opcion invalida!';
}

?>