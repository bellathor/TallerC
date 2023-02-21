<?php
require(dirname(dirname(__DIR__)) . '/config/conexion.php');
require(dirname(__DIR__) . '/clases/class_reportes.php');
class Maderas
{
    use Reportes;
    private $id, $madera, $json, $SQL, $conexion;
    public function __construct()
    {

    }

    public function Registrar_Madera($json)
    {
        $columnas = 'Codigo, Nombre_Madera, Precio_Unidad';
        $validar = self::Insert($columnas, $json);
        return $validar;
    }
    public function Obtener_Madera_Especifico($id, $opcion)
    {
        if ($opcion == "id") {
            self::Select(null, null, ' WHERE ID_Madera = :id', $id);
        } else if ($opcion == "cod") {
            self::Select(null, null, ' WHERE Codigo = :cod', $id);
        }else if($opcion == "stock"){
            $column = 'Stock, Precio_Unidad ';
            self::Select($column, null, ' WHERE ID_Madera = :id', $id);
        }
        return $this->json;
    }
    public function Obtener_Maderas()
    {
        self::Select(null, null, null, null);
        return $this->json;
    }

    public function Actualizar_Madera($json, $opcion = null)
    {
        if ($opcion == "entradas_salidas") {
            $columnas = ' Stock = :st';
            $columnas_reporte = 'ID_Madera, ID_Material, ID_Mueble, ID_Empleado, Fecha, Hora, Accion, Cantidad, Stock, Gasto_Entrada';
            self::Insertar_Reporte('maderas', $columnas_reporte, $json, 'entradas');
        }
         else {
            $columnas = 'Codigo = :cod, Nombre_Madera = :mad, Precio_Unidad = :prec';
        }
        self::Update($columnas, $json, $opcion);
    }

    public function Eliminar_Madera($json)
    {
        $columnas = 'Codigo = :cod, Nombre_Madera = :mad, Precio_Unidad = :prec';
        self::Delete($json);
    }

    private function Select($columnas = null, $inner = null, $where = null, $valor = null)
    {
        $tabla = 'maderas';
        if ($where == ' WHERE ID_Madera = :id') {
            if ($columnas == null and $inner == null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . $where;
            } else if ($columnas != null and $inner == null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . $where;
            } else if ($columnas != null and $inner != null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . ' ' . $inner . $where;
            }
        } else if ($where === ' WHERE Codigo = :cod') {
            if ($columnas == null and $inner == null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . $where;
            } else if ($columnas != null and $inner == null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . $where;
            } else if ($columnas != null and $inner != null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . ' ' . $inner . $where;
            }
        } else {
            $this->SQL = 'SELECT * FROM ' . $tabla . ';';
        }
        self::Execute($where, $valor);
    }
    private function Insert($columns, $values)
    {
        $tabla = 'maderas';
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $this->SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':codig, :nombremadera, :prec' . ');';
            $query = $cx->prepare($this->SQL);
            $query->bindParam(':codig', $values['Codigo'], PDO::PARAM_STR, 25);
            $query->bindParam(':nombremadera', $values['Madera'], PDO::PARAM_STR, 128);
            $query->bindParam(':prec', $values['Precio'], PDO::PARAM_STR);
            $resultado = $query->execute();
            $cx = null;
            $this->conexion->desconectar();
            return $resultado;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }

    private function Update($columns, $values, $opcion = null)
    {
        $tabla = "maderas";
        if ($opcion == 'entradas_salidas') {
            $this->SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Madera = :id;';
            try {
                $this->conexion = new Conexion();
                $cx = $this->conexion->conectar();
                $query = $cx->prepare($this->SQL);
                $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                $query->bindParam(':st', $values['Stock'], PDO::PARAM_INT);
                $query->execute();
                $cx = null;
                $this->conexion->desconectar();
            } catch (PDOException $err) {
                echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
            }
        } else {
            $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Madera = :id;';
            try {
                $this->conexion = new Conexion();
                $cx = $this->conexion->conectar();
                $query = $cx->prepare($SQL);
                if ($columns == ' Stock = :st') {
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':st', $values['Stock'], PDO::PARAM_INT);
                } else {
                    $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
                    $query->bindParam(':cod', $values['Codigo'], PDO::PARAM_STR, 25);
                    $query->bindParam(':mad', $values['Madera'], PDO::PARAM_STR, 128);
                    $query->bindParam(':prec', $values['Precio'], PDO::PARAM_STR);
                }
                $query->execute();
                $cx = null;
                $this->conexion->desconectar();
            } catch (PDOException $err) {
                echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
                self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
            }
        }

    }

    private function Delete($id)
    {
        
        $tabla = "maderas";
        self::Eliminar_Reporte_Madera('reportes', $id);
        $this->SQL = 'DELETE FROM ' . $tabla . ' WHERE ID_Madera = :id';
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $cx = null;
            $this->conexion->desconectar();
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }

    private function Execute($bindParam = null, $valor = null)
    {
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            if ($bindParam == ' WHERE ID_Madera = :id') {
                $query->bindParam(':id', $valor, PDO::PARAM_INT);
            } else if ($bindParam == ' WHERE Codigo = :cod') {
                $query->bindParam(':cod', $valor, PDO::PARAM_STR);
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