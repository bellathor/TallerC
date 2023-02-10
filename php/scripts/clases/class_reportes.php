<?php
//require(dirname(dirname(__DIR__)) . '\config\conexion.php');
trait Reportes
{
    private $id, $puesto, $json, $SQL, $conexion, $respuesta;
    function Obtener_Reportes($tabla = null, $opcion = null)
    {
        if ($tabla == 'maderas') {
            $columnas = 'r.ID_Reporte, mad.ID_Madera, mad.Codigo, mad.Nombre_Madera, 
                         r.Stock, r.Fecha, r.Hora, r.Cantidad, r.Gasto_Entrada, r.Accion';
            $inner = ' r LEFT JOIN maderas mad on r.ID_Madera = mad.ID_Madera GROUP BY r.Accion;';
            if ($opcion == null) {

            } else if ($opcion == 'r') {
                $tabla = 'reportes';
                $where = null;
                if ($columnas != null and $inner == null and $where == null) {
                    $this->SQL = 'SELECT ' . $columnas . 'FROM ' . $tabla;
                } else if ($columnas == null and $inner != null and $where == null) {
                    $this->SQL = 'SELECT * FROM ' . $tabla . $inner;
                } else if ($columnas == null and $inner == null and $where != null) {
                    $this->SQL = 'SELECT * FROM ' . $tabla . $where;
                } else if ($columnas == null and $inner == null and $where == null) {
                    $this->SQL = 'SELECT * FROM ' . $tabla . $inner;
                } else if ($columnas != null and $inner != null and $where == null) {
                    $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . $inner;
                } else if ($columnas != null and $inner != null and $where != null) {
                    $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . $inner . $where;
                } else {
                    $this->SQL = 'SELECT * FROM ' . $tabla;
                }
            }
        } else if ($tabla == 'materiales') {
            if ($opcion == null) {

            } else if ($opcion == 'r') {

            }
        }
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
            $this->error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine());
        }

        return $this->json;
    }
}
?>