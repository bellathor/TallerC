<?php
//require(dirname(dirname(__DIR__)) . '\config\conexion.php');
trait Reportes
{
    private $id, $puesto, $json, $SQL, $conexion, $respuesta;
    function Obtener_Reportes($tabla = null, $opcion = null)
    {
        if ($tabla == 'maderas') {
            $columnas = 'r.ID_Reporte, mad.ID_Madera, mad.Codigo, mad.Nombre_Madera, 
                         r.Stock, r.Fecha, r.Hora, r.Cantidad, r.Gasto_Entrada, r.Accion,
                         em.Nombres, em.Apellidos, p.Nombre_Puesto, d.Departamento ';
            $inner = ' r LEFT JOIN maderas mad on r.ID_Madera = mad.ID_Madera LEFT JOIN empleados em on r.ID_Empleado = em.ID_Empleado 
            LEFT JOIN puestos p on em.ID_Puesto = p.ID_Puesto LEFT JOIN departamentos d on p.ID_Departamento = d.ID_Departamento';
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

    function Insertar_Reporte($tabla, $columna, $values, $opcion)
    {
        if ($tabla == 'maderas') {
            
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            if ($opcion == 'entradas') {
                try {
                    $null = null;
                    $tabla = 'reportes';
                    $this->SQL = 'INSERT INTO ' . $tabla . ' (' . $columna . ') ' . ' VALUES ' . ' (' . ':id_mad, :id_mat, :id_mueb, :id_emp, :fech, :hor, :acc, :cant, :stoc, :gasto' . ');';
                    $query = $cx->prepare($this->SQL);
                    $query->bindParam(':id_mad', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':id_mat', $null, PDO::PARAM_NULL);
                    $query->bindParam(':id_mueb', $null, PDO::PARAM_NULL);
                    $query->bindParam(':id_emp', $values['ID_Empleado'], PDO::PARAM_INT);
                    $query->bindParam(':fech', $values['Fecha_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':hor', $values['Hora_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':hor', $values['Hora_Registro'], PDO::PARAM_STR);
                    $query->bindParam(':acc', $values['Accion'], PDO::PARAM_STR);
                    $query->bindParam(':cant', $values['Cantidad'], PDO::PARAM_INT);
                    $query->bindParam(':stoc', $values['Stock'], PDO::PARAM_INT);
                    $query->bindParam(':gasto', $values['Gasto_Entrada'], PDO::PARAM_STR);
                    $query->execute();
                    $lastid = $cx->lastInsertId();
                    $cx = null;
                    $this->conexion->desconectar();
                    return $lastid;
                } catch (PDOException $err) {
                    echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                    self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
                }
            } else if ($opcion == 'salidas') {

            }
        }
    }
}
?>