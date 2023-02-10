<?php
class Admin_Nominas
{
    private $verificar;
    private $json, $SQL, $conexion;
    public function __construct()
    {

    }
    public function Registrar_Salario($id)
    {
        $columnas = 'Salario_Semanal, Prestamos, Horas_Laborales, 
        Horas_Trabajadas, Horas_No_Trabajadas, 
        Precio_Hora, Descuento, ID_Empleado';
        $this->verificar = self::Insert($columnas, $id);
        return $this->verificar;
    }
    public function Eliminar_Salario($id){
        self::Delete($id);   
    }
    private function Select()
    {

    }
    private function Insert($columns, $values)
    {
        $tabla = 'salarios';
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $null = null;
            $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':sal, :pres, :ho, :ht, :hnt, :ph, :d, :id' . ');';
            $query = $cx->prepare($SQL);
            $query->bindParam(':sal', $null, PDO::PARAM_NULL);
            $query->bindParam(':pres', $null, PDO::PARAM_NULL);
            $query->bindParam(':ho', $null, PDO::PARAM_NULL);
            $query->bindParam(':ht', $null, PDO::PARAM_NULL);
            $query->bindParam(':hnt', $null, PDO::PARAM_NULL);
            $query->bindParam(':ph', $null, PDO::PARAM_NULL);
            $query->bindParam(':d', $null, PDO::PARAM_NULL);
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
    private function Update()
    {

    }
    private function Delete($id)
    {
        $tabla = 'salarios';
        $this->SQL = 'DELETE FROM ' . $tabla . ' WHERE ID_Empleado = :id';
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
    public function error_($codigo, $mensaje, $ubicacion, $linea)
    {
        date_default_timezone_set('America/El_Salvador');
        error_log("|Fecha: " . date('d/m/y') . " || Hora: " . date('H:i:s a') . " || Codigo: " . $codigo . " || Mensaje: " . $mensaje . " || Archivo: " . $ubicacion . " || Linea: " . $linea . "|\n", 3, dirname(dirname(__DIR__)) . "\logs\\errores.log");
    }
}
?>