<?php
require(dirname(dirname(__DIR__)) . '\config\conexion.php');
class Puestos
{
    private $id, $puesto, $json, $SQL, $conexion;
    public function __construct()
    {

    }

    public function Obtener_Puestos_Especificos($id)
    {
        self::Select(null, null, ' where ID_Departamento = :id', $id);
        return $this->json;
    }
    public function Obtener_Puestos()
    {
        self::Select(null, null, null, null);
        return $this->json;
    }

    private function Select($columnas = null, $inner = null, $where = null, $valor = null)
    {
        if ($inner == null) {
            $tabla = 'puestos';
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
            $tabla = 'puestos p';
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
        self::Execute($where, $valor);
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

   

    private function Execute($bindParam=null, $valor=null){
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            if($bindParam == ' where ID_Departamento = :id'){
                $query->bindParam(':id', $valor, PDO::PARAM_INT);
            }
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