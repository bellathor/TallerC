<?php
require(dirname(dirname(__DIR__)) . '\config\conexion.php');
class Admin_Nominas
{
    private $verificar;
    private $json, $SQL, $conexion;
    public function __construct()
    {

    }
    public function Obtener_Empleados_Salarios($opcion = null, $id = null)
    {
        if ($opcion == 'inner' and $id != null) {
            $columnas_inner = 'em.ID_Empleado, Nombres, Apellidos, d.Departamento, p.Nombre_Puesto,
            s.Salario_Semanal, s.Horas_Laborales, s.Prestamos, s.Horas_No_Trabajadas, s.Horas_Trabajadas, s.Precio_Hora, s.Descuento, s.Total, s.Comentarios';
            $inner = ' em LEFT JOIN salarios s on s.ID_Empleado = em.ID_Empleado 
                     LEFT JOIN Puestos p on em.ID_Puesto = p.ID_Puesto
                     LEFT JOIN Departamentos d on d.ID_Departamento = p.ID_Departamento';
            $where = ' where d.ID_Departamento = :id_departamento';
            self::Select($columnas_inner, $inner, $where, $id);
        } else if ($opcion == 'inner' and $id == null) {
            $columnas_inner = 'em.ID_Empleado, Nombres, Apellidos, d.Departamento, p.Nombre_Puesto,
            s.Salario_Semanal, s.Horas_Laborales, s.Prestamos, s.Horas_No_Trabajadas, s.Horas_Trabajadas, s.Precio_Hora,s.Descuento, s.Total, s.Comentarios';
            $inner = ' em LEFT JOIN salarios s on s.ID_Empleado = em.ID_Empleado 
                     LEFT JOIN Puestos p on em.ID_Puesto = p.ID_Puesto
                     LEFT JOIN Departamentos d on d.ID_Departamento = p.ID_Departamento';
            self::Select($columnas_inner, $inner, null, null);
        }
        return $this->json;
    }
    public function Obtener_Gastos($opcion = null, $id = null)
    {
        $columnas = "Fecha, Descripcion, Monto, Comentario";
        $this->json = self::Select($columnas);
        return $this->json;
    }
    public function Registrar_Salario($id)
    {
        $columnas = 'Salario_Semanal, Prestamos, Horas_Laborales, 
        Horas_Trabajadas, Horas_No_Trabajadas, 
        Precio_Hora, Descuento, Total, Comentarios, ID_Empleado';
        $this->verificar = self::Insert($columnas, $id);
        return $this->verificar;
    }
    public function Registrar_Gastos($values)
    {
        $columnas = 'Fecha, Descripcion, Monto, Comentario';
        $this->verificar = self::Insert_Gastos($columnas, $values);
        return $this->verificar;
    }
    public function Actualizar_Salario($values, $opcion = null)
    {
        if ($opcion == "gestion") {
            $columnas = 'Prestamos = :pre, Horas_Trabajadas = :ht, Horas_No_Trabajadas = :hnt, Descuento = :d, Total = :t, Comentarios = :c';
            $where = ' where ID_Empleado = :id';
            self::Update($columnas, $where, $values);
        } else if ($opcion == "gestion_cierre") {
            $columnas = 'Prestamos = :pre, Horas_Trabajadas = :ht, Horas_No_Trabajadas = :hnt, Descuento = :d, Total = :t, Comentarios = :c';
            self::Update($columnas, null, $values);
        } else {
            $columnas = 'Salario_Semanal = :sal_se, Horas_Laborales = :h, Precio_Hora = :pr_ho';
            $where = ' where ID_Empleado = :id';
            self::Update($columnas, $where, $values);
        }
        return $this->json;
    }
    public function Eliminar_Salario($id)
    {
        self::Delete($id);
    }
    public function Eliminar_Gastos_Generales()
    {
        $gastos = "gastos_generales";
        self::Delete($gastos);
    }
    private function Select($columnas = null, $inner = null, $where = null, $values = null)
    {
        $tabla = 'empleados';
        if ($inner == null) {
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
            if ($columnas == null and $where == null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . $inner . ';';
            } else if ($columnas != null and $where == null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . $inner . ';';
            } else if ($columnas == null and $where != null) {
                $this->SQL = 'SELECT * FROM ' . $tabla . $where;
            } else if ($columnas != null and $where != null) {
                $this->SQL = 'SELECT ' . $columnas . ' FROM ' . $tabla . $inner . $where;
            }
        }

        if ($columnas == "Fecha, Descripcion, Monto, Comentario") {
            $tabla = "gastos_generales";
            $this->SQL = "SELECT " . $columnas . " FROM " . $tabla;
        }
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            if ($where == ' where d.ID_Departamento = :id_departamento') {
                $query->bindParam(':id_departamento', $values, PDO::PARAM_INT);
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
    private function Insert_Gastos($columns, $values)
    {
        $tabla = 'gastos_generales';
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $this->SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':fec, :desc, :mont, :coment' . ');';
            $query = $cx->prepare($this->SQL);
            $query->bindParam(':fec', $values['fecha'], PDO::PARAM_STR);
            $query->bindParam(':desc', $values['descrip'], PDO::PARAM_STR);
            $query->bindParam(':mont', $values['monto'], PDO::PARAM_STR);
            $query->bindParam(':coment', $values['comentario'], PDO::PARAM_STR);
            $this->verificar = $query->execute();
            $cx = null;
            $this->conexion->desconectar();
            return $this->verificar;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }
    private function Insert($columns, $values)
    {
        $tabla = 'salarios';
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $null = null;
            $pr = 0;
            $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':sal, :pres, :ho, :ht, :hnt, :ph, :d, :t, :c, :id' . ');';
            $query = $cx->prepare($SQL);
            $query->bindParam(':sal', $pr, PDO::PARAM_STR);
            $query->bindParam(':pres', $pr, PDO::PARAM_STR);
            $query->bindParam(':ho', $pr, PDO::PARAM_INT);
            $query->bindParam(':ht', $pr, PDO::PARAM_INT);
            $query->bindParam(':hnt', $pr, PDO::PARAM_INT);
            $query->bindParam(':ph', $pr, PDO::PARAM_STR);
            $query->bindParam(':d', $pr, PDO::PARAM_STR);
            $query->bindParam(':t', $pr, PDO::PARAM_STR);
            $query->bindParam(':c', $prl, PDO::PARAM_STR);
            $query->bindParam(':id', $values, PDO::PARAM_INT);
            $verificar = $query->execute();
            $cx = null;
            $this->conexion->desconectar();
            return $verificar;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }
    private function Update($columnas, $where = null, $values)
    {
        $tabla = 'salarios';
        $this->SQL = 'UPDATE ' . $tabla . ' set ' . $columnas . $where;
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            if ($columnas == "Prestamos = :pre, Horas_Trabajadas = :ht, Horas_No_Trabajadas = :hnt, Descuento = :d, Total = :t, Comentarios = :c" and $where !== null) {
                $query->bindParam(':id', $values['ID'], PDO::PARAM_STR);
                $query->bindParam(':pre', $values['Prestamo'], PDO::PARAM_STR);
                $query->bindParam(':ht', $values['Horas_Tr'], PDO::PARAM_INT);
                $query->bindParam(':hnt', $values['Horas_No'], PDO::PARAM_INT);
                $query->bindParam(':d', $values['Descuento'], PDO::PARAM_STR);
                $query->bindParam(':t', $values['Total'], PDO::PARAM_STR);
                $query->bindParam(':c', $values['Comentario'], PDO::PARAM_STR);
            } else if ($columnas == 'Salario_Semanal = :sal_se, Horas_Laborales = :h, Precio_Hora = :pr_ho' and $where !== null) {
                $query->bindParam(':sal_se', $values['Salario'], PDO::PARAM_INT);
                $query->bindParam(':h', $values['Horas'], PDO::PARAM_INT);
                $query->bindParam(':pr_ho', $values['Pagos'], PDO::PARAM_INT);
                $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
            } else if ($where == null) {
                $query->bindParam(':pre', $values['Prestamo'], PDO::PARAM_STR);
                $query->bindParam(':ht', $values['Horas_Tr'], PDO::PARAM_INT);
                $query->bindParam(':hnt', $values['Horas_No'], PDO::PARAM_INT);
                $query->bindParam(':d', $values['Descuento'], PDO::PARAM_STR);
                $query->bindParam(':t', $values['Total'], PDO::PARAM_STR);
                $query->bindParam(':c', $values['Comentario'], PDO::PARAM_STR);
            }
            $this->json = $query->execute();
            $cx = null;
            $this->conexion->desconectar();
            return $this->json;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }

    }
    private function Delete($id)
    {
        $tabla = 'salarios';
        $this->SQL = 'DELETE FROM ' . $tabla . ' WHERE ID_Empleado = :id';

        if ($id == "gastos_generales") {
            $tabla = 'gastos_generales';
            $this->SQL = 'DELETE FROM ' . $tabla;
        }
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            if($id != "gastos_generales"){
                $query->bindParam(':id', $id, PDO::PARAM_INT);
            }
            $query->execute();
            $cx = null;
            $this->conexion->desconectar();
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }
    public function error_($codigo, $mensaje, $ubicacion, $linea)
    {
        date_default_timezone_set('America/El_Salvador');
        error_log("|Fecha: " . date('d/m/y') . " || Hora: " . date('H:i:s a') . " || Codigo: " . $codigo . " || Mensaje: " . $mensaje . " || Archivo: " . $ubicacion . " || Linea: " . $linea . "|\n", 3, dirname(dirname(__DIR__)) . "\logs\\errores.log");
    }
}
?>