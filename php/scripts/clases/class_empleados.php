<?php
require(dirname(__DIR__) . '\clases\class_adminnominas.php');
class Empleados extends Admin_Nominas
{
    const hash_ = PASSWORD_DEFAULT;
    const cost_ = 12;
    private $json, $SQL, $conexion, $hashPass;
    private $id, $usuario, $nombres, $apellidos, $direccion,
    $correo, $telefono, $password, $id_puesto, $id_asistencia,
    $id_estatus;
    public function __construct()
    {

    }

    public function Obtener_Empleado_Especifico($id, $op = null)
    {
        $columnas = 'ID_Empleado, Nombre_Usuario, Nombres, 
            Apellidos, Direccion, 
            Correo_Electronico, Telefono,
            Contraseña, e.ID_Puesto, 
            p.Nombre_Puesto, p.ID_Departamento, 
            d.Departamento';
        $inner = 'LEFT JOIN puestos p on e.ID_Puesto = p.ID_Puesto 
            LEFT JOIN departamentos d on p.ID_Departamento = d.ID_Departamento';
        if ($op === null) {
            self::Select(' Nombre_Usuario', null, ' where ID_Empleado = :id', $id);
        } else if ($op === 'id_empleado') {
            self::Select($columnas, $inner, ' where ID_Empleado = :id', $id);
        } else if ($op === 'Usuario') {
            self::Select(null, null, ' where Nombre_Usuario = :us', $id);
        }
        return $this->json;
    }
    public function Obtener_Empleados($inner = null)
    {
        if ($inner == null) {
            self::Select(null, null, null, null);
        } else {
            $columnas = 'ID_Empleado, Nombre_Usuario, Nombres, 
            Apellidos, Direccion, 
            Correo_Electronico, Telefono,
            Contraseña, e.ID_Puesto, 
            p.Nombre_Puesto, p.ID_Departamento, 
            d.Departamento';
            $inner = 'LEFT JOIN puestos p on e.ID_Puesto = p.ID_Puesto 
            LEFT JOIN departamentos d on p.ID_Departamento = d.ID_Departamento';
            self::Select($columnas, $inner, null, null);
        }
        return $this->json;
    }

    public function Registrar_Empleado($json)
    {
        $columnas = 'Nombre_Usuario, Nombres, Apellidos,
        Direccion, Correo_Electronico, Telefono,
        Contraseña, ID_Puesto, ID_Asistencia, ID_Estatus';
        $this->id = self::Insert($columnas, $json);
        return $this->id;
    }
    public function Actualizar_Empleado($json)
    {
        $columnas = 'Nombre_Usuario = :us, Nombres = :nombres, Apellidos = :apellidos,
                         Direccion = :direccion, Correo_Electronico = :correo, Telefono = :tel,
                         Contraseña = :pass, ID_Puesto = :idpuesto,
                         ID_Asistencia = :idasistencia, ID_Estatus = :idestatus';

        $verificar = self::Update($columnas, $json);
        return $verificar;
    }
    public function Eliminar_Empleado($id)
    {
        self::Delete($id);
    }

    private function Select($columnas = null, $inner = null, $where = null, $valor = null)
    {
        if ($inner == null) {
            $tabla = 'empleados';
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
            $tabla = 'empleados e';
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
    private function Execute($bindParam = null, $valor = null)
    {
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($this->SQL);
            if ($bindParam == ' where ID_Empleado = :id') {
                $query->bindParam(':id', $valor, PDO::PARAM_INT);
            } else if ($bindParam === ' where Nombre_Usuario = :us') {
                $query->bindParam(':us', $valor, PDO::PARAM_STR);
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
    private function Insert($columns, $values)
    {
        $tabla = 'empleados';
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $SQL = 'INSERT INTO ' . $tabla . ' (' . $columns . ') ' . ' VALUES ' . ' (' . ':us, :n, :ap, :d, :ce, :t, :pss, :idp, :idas, :ides' . ');';
            $query = $cx->prepare($SQL);
            $query->bindParam(':us', $values['NombreUsuario'], PDO::PARAM_STR, 16);
            $query->bindParam(':n', $values['Nombres'], PDO::PARAM_STR, 30);
            $query->bindParam(':ap', $values['Apellidos'], PDO::PARAM_STR, 30);
            $query->bindParam(':d', $values['Direccion'], PDO::PARAM_STR, 50);
            $query->bindParam(':ce', $values['Correo'], PDO::PARAM_STR, 40);
            $query->bindParam(':t', $values['Telefono'], PDO::PARAM_STR, 16);
            $query->bindParam(':pss', $values['Contraseña'], PDO::PARAM_STR, 20);
            $query->bindParam(':idp', $values['Puesto'], PDO::PARAM_INT);
            $query->bindParam(':idas', $values['Asistencia'], PDO::PARAM_NULL);
            $query->bindParam(':ides', $values['Estatus'], PDO::PARAM_INT);
            $query->execute();
            $lastid = $cx->lastInsertId();
            $cx = null;
            $this->conexion->desconectar();
            return $lastid;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }
    }

    private function Update($columns, $values)
    {
        $tabla = 'empleados';
        $SQL = 'UPDATE ' . $tabla . ' SET ' . $columns . ' WHERE ID_Empleado = :id;';
        try {
            $this->conexion = new Conexion();
            $cx = $this->conexion->conectar();
            $query = $cx->prepare($SQL);
            $query->bindParam(':id', $values['ID'], PDO::PARAM_INT);
            $query->bindParam(':us', $values['NombreUsuario'], PDO::PARAM_STR, 16);
            $query->bindParam(':nombres', $values['Nombres'], PDO::PARAM_STR, 30);
            $query->bindParam(':apellidos', $values['Apellidos'], PDO::PARAM_STR, 30);
            $query->bindParam(':direccion', $values['Direccion'], PDO::PARAM_STR, 50);
            $query->bindParam(':correo', $values['Correo'], PDO::PARAM_STR, 40);
            $query->bindParam(':tel', $values['Telefono'], PDO::PARAM_STR, 16);
            $query->bindParam(':pass', $values['Contraseña'], PDO::PARAM_STR, 20);
            $query->bindParam(':idpuesto', $values['Puesto'], PDO::PARAM_INT);
            $query->bindParam(':idasistencia', $values['Asistencia'], PDO::PARAM_NULL);
            $query->bindParam(':idestatus', $values['Estatus'], PDO::PARAM_INT);
            $verificar = $query->execute();
            $cx = null;
            $this->conexion->desconectar();
            return $verificar;
        } catch (PDOException $err) {
            echo "¡Ocurrió un error! - Código: " . $err->getCode() . " chequear log de errores.!";
            self::error_($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()); //$err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine()
        }

    }

    private function Delete($id)
    {
        $salario = new Admin_Nominas();
        $salario->Eliminar_Salario($id);
        $tabla = 'empleados';
        $this->SQL = 'DELETE  FROM ' . $tabla . ' WHERE ID_Empleado = :id';
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

    public function guardarPass($password)
    {
        $this->hashPass = password_hash($password, self::hash_, ['cost' => self::cost_]);
        return $this->hashPass;
    }

    public function VerificarPassword($password, $hashPassword)
    {
        $bool = false;
        if (password_verify($password, $hashPassword)) {
            $bool = true;
            return $bool;
        }
        return $bool;
    }

    public function error_($codigo, $mensaje, $ubicacion, $linea)
    {
        date_default_timezone_set('America/El_Salvador');
        error_log("|Fecha: " . date('d/m/y') . " || Hora: " . date('H:i:s a') . " || Codigo: " . $codigo . " || Mensaje: " . $mensaje . " || Archivo: " . $ubicacion . " || Linea: " . $linea . "|\n", 3, dirname(dirname(__DIR__)) . "\logs\\errores.log");
    }
}
?>