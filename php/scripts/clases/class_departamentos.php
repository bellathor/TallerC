<?php
require(dirname(dirname(__DIR__)) . '/config/conexion.php');
class Departamentos
{
    private $id, $dept, $json, $SQL, $conexion;
    public function __construct()
    {

    }

    public function Obtener_Departamentos()
    {
        
        self::Select(null, null, null, null);
        return $this->json;
    }

    private function Select($columnas = null, $inner = null, $where = null, $valor = null)
    {
        if ($inner == null) {
            $tabla = 'departamentos';
            if ($columnas == null and $where == null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . ';';
            } else if ($columnas != null and $where == null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla;
            } else if ($columnas == null and $where != null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . $where;
            } else if ($columnas != null and $where != null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . $where;
            }
        } else {
            $tabla = 'departamentos d';
            if ($columnas == null and $where == null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . ' ' . $inner;
            } else if ($columnas != null and $where == null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . ' ' . $inner;
            } else if ($columnas == null and $where != null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . ' ' . $inner . $where;
            } else if ($columnas != null and $where != null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . ' ' . $inner . $where;
            }
        }
        self::Execute();
    }
    private function Insert()
    {

    }

    private function Update()
    {

    }

    private function Delete()
    {

    }

    

    private function Execute(){
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($query->rowCount() > 0) {
                foreach ($resultado as $filas) {
                    $this->json[] = $filas;
                }
            } else {
                 $this->json = null;
            }
            $cx = null;
            $this->conexion->desconectar();
            return $this->json;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine());
        }
    }
    public function error_($codigo, $mensaje, $ubicacion, $linea)
    {
        date_default_timezone_set('America/El_Salvador');
        error_log("|Fecha: " . date('d/m/y') . " || Hora: " . date('H:i:s a') . " || Codigo: " . $codigo . " || Mensaje: " . $mensaje . " || Archivo: " . $ubicacion . " || Linea: " . $linea . "|\n", 3, dirname(dirname(__DIR__)) . "\logs\\errores.log");
    }
}
?>